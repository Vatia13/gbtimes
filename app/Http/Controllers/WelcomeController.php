<?php namespace App\Http\Controllers;

use App\Article;
use App\Cat;
use App\Image;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Cache;



use Response;
use Torann\GeoIP\GeoIP;


class WelcomeController extends Controller {

    protected $articles,$slug,$cat,$sid,$num;
	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Article $articles)
	{
        $this->articles = $articles;
        $this->middleware('language');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Article $article)
	{
        $slider = $this->getSlider();
		$lastRecords = $this->lastRecords();
		return view('pages.front.index',compact('slider','lastRecords','article'));
	}

	/**
	 * @param Request $request
	 * @return bool|string
     */
	public function language(Request $request){
        if($request->input('trans'))
            return trans($request->input('trans'));
        else
            return false;
    }

	/**
	 * @param $cat
	 * @param $sid
	 * @return \Illuminate\View\View
     */
	public function showArticle($cat,$sid){
		$article = new Article();
		$this->cat = $cat;
		$this->sid = $sid;
		$item = Article::select('*')->published()->language()->where(function($query){
			$query->where('slug',$this->cat.'/'.$this->sid)->orWhere('slug',$this->sid)->orWhere('translate_slug',$this->sid)->orWhere('id','=',$this->sid);
		})->first();

		//DB::table('articles')->where('id',$sid)->orWhere('slug',$sid)->increment('view',1);
	     return view('theme.pages.view.show',compact('item','article'));
	}

	/**
	 * @param $slug
	 * @return \Illuminate\View\View
     */
	public function showPage($slug){
		$article = new Article();
		$this->slug = $slug;
		$item = Article::select('*')->language()->where(function($query){
			$query->where('slug',$this->slug)->orWhere('translate_slug',$this->slug);
		})->first();
		if(!$item){
			return view('theme.pages.view.cats',compact('slug','article'));
		}

		//DB::table('articles')->where('id',$sid)->orWhere('slug',$sid)->increment('view',1);
		return view('theme.pages.view.show',compact('item','article'));
	}




	/**
	 * @return mixed
     */
	public function getSlider(){
		$slider = Cache::rememberForever('slider_'.App::getLocale(), function() {
			return Article::select('id','frontpage_title','title','slug','img','translate_slug')->published()->getcat(55)->language()->latest()->where('extra_fields','LIKE','%s:13:"add_to_slider";s:1:"1"%')->take(10)->get();
		});
		return $slider;
	}

	/**
	 * @return mixed
     */
	public function lastRecords(){
		$records = Cache::rememberForever('lastRecords_'.App::getLocale(), function() {
			return Article::select('id','frontpage_title','head','title','published_at','meta_desc','slug','img','author','translate_slug')->published()->getcat(55)->language()->where('type','<>','page')->latest()->take(10)->get();
		});
		return $records;
	}


	/**
	 * @return mixed
     */
	public function rss(){
		$this->num = $this->switchRssNum(Input::get('num'));
		if(Input::get('cat') > 0):
			$this->cat = Input::get('cat');
			$entry = Cache::rememberForever('rss_'.$this->num.'_'.$this->cat.'_'.App::getLocale(), function() {
				return Article::select('id','body','title','head','published_at','slug','img','lang')->published()->getone($this->cat)->language()->where('type','<>','page')->latest()->take($this->num)->get();
			});
		else:
			$entry = Cache::rememberForever('rss_'.$this->num.'_'.App::getLocale(), function() {
				return Article::select('id','body','title','head','published_at','slug','img','lang')->published()->getcat(55)->language()->where('type','<>','page')->latest()->take($this->num)->get();
			});
		endif;
		return Response::view('theme.com.rss',compact('entry'))->header('Content-Type', 'text/xml');
	}


	/**
	 * @param $request
	 * @return int
     */
	public function switchRssNum($request){
		$num = 10;
		switch($request):
			case 5:
				$num = 5;
				break;
			case 10:
				$num = 10;
				break;
			case 15:
				$num = 15;
				break;
			case 20:
				$num = 20;
				break;
			case 25:
				$num = 25;
				break;
			case 30:
				$num = 30;
				break;
		endswitch;
		return $num;
	}



   function loadArticles(Request $request,Article $articles){
	   return $articles->loadArticles($request->input('cat'),$request->input('type'),$request->input('tag'),$request->input('start'),$request->input('num'));
   }

	function loadPartnerArticles(Request $request,Article $articles){
		return $articles->loadPartnerArticles($request->input('cat'),$request->input('type'),$request->input('tag'),$request->input('start'),$request->input('num'));
	}


	function search(Request $request){
		$article = new Article();
		$items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang')->published()->getcat(55)->language()->where('title','LIKE','%'.$request->input('s').'%')->orWhere('body','LIKE','%'.$request->input('s').'%')->latest()->take(get_setting('pagination_num'))->get();
		$count = Article::where('title','LIKE','%'.$request->input('s').'%')->orWhere('body','LIKE','%'.$request->input('s').'%')->published()->getcat(55)->language()->count();
		return view('theme.pages.view.search',compact('items','article','count'));
	}

	public function newsDate($date){
		$article = new Article();
		$items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang')->whereBetween('published_at',[$date.' 00:00:00',$date.' 23:59:00'])->published()->getcat(55)->language()->latest()->take(get_setting('pagination_num'))->get();
		$count = Article::whereBetween('published_at',[$date.' 00:00:00',$date.' 23:59:00'])->published()->getcat(55)->language()->count();
		$cat = '';
		return view('theme.pages.view.date',compact('items','article','count','date','cat'));
	}

	public function catDate($cat,$date){
		$article = new Article();
		$items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang')->whereBetween('published_at',[$date.' 00:00:00',$date.' 23:59:00'])->published()->bycatslug($cat)->language()->latest()->take(get_setting('pagination_num'))->get();
		$count = Article::whereBetween('published_at',[$date.' 00:00:00',$date.' 23:59:00'])->published()->bycatslug($cat)->language()->count();
		return view('theme.pages.view.date',compact('items','article','count','date','cat'));
	}

	public function SimilarNews($cats){
		$article = new Article();
		if(!empty($cats)){
          $cats_array = explode(',',$cats);
		}
		$items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang')->published()->orderall($cats_array)->language()->latest()->take(get_setting('pagination_num'))->get();
		$count = Article::published()->orderall($cats_array)->language()->count();
		return view('theme.pages.view.similar',compact('items','article','count','cats'));
	}

	public function newsAuthor($author){
		$article = new Article();
		$items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang')->where('author',$author)->published()->getcat(55)->language()->latest()->take(get_setting('pagination_num'))->get();
		$count = Article::where('author',$author)->published()->getcat(55)->language()->count();
		return view('theme.pages.view.author',compact('items','article','count','author'));
	}

	function loadSimilarNews(Request $request,Article $articles){
		return $articles->loadSimilarNews($request->input('tag'),$request->input('start'),$request->input('num'));
	}

	function loadNewsAuthor(Request $request,Article $articles){
		return $articles->loadNewsAuthor($request->input('tag'),$request->input('start'),$request->input('num'));
	}

	function loadNewsDate(Request $request,Article $articles){
		return $articles->loadNewsDate($request->input('tag'),$request->input('start'),$request->input('num'));
	}

	function loadSearchArticles(Request $request,Article $articles){
		return $articles->loadSearchArticles($request->input('tag'),$request->input('start'),$request->input('num'));
	}

	function showTags($slug){
		$article = new Article();
		return view('theme.pages.view.tags',compact('slug','article'));
	}


	function ajaxIndex(Article $article){
		return $this->index($article);
	}

	function ajaxPage(Request $request){
		return $this->showPage($request->input('slug'));
	}

	function ajaxArticle(Request $request){
		return $this->showArticle($request->input('slug'));
	}
}


