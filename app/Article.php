<?php namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Article extends Model {

	protected $fillable = [
        'user_id',
        'type',
        'title',
        'frontpage_title',
        'social_media_title',
        'head',
        'body',
        'slug',
        'translate_slug',
        'meta_key',
        'meta_desc',
        'img',
        'author',
        'status',
        'lang',
        'extra_fields',
        'published_at',
        'finished_at'
    ];

    protected  $dates = ['published_at'];


    protected $request,$from,$to,$data,$slug,$prefix,$cat,$type,$num,$tag,$start;
    /**
     * @param $query
     */
    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now())->where('status',1);
    }


    /**
     * @param $query
     * @param $id
     */
    public function scopeNoThis($query,$id){
        $query->where('id','<>',$id);
    }

    /**
     * @param $query
     * @param bool|false $data
     */
    public function scopeLanguage($query,$data = false){
        if($data === true){
            $query->where('lang',App::getLocale())->orWhere('lang','');
        }else{
            $query->where('lang','=',App::getLocale());
        }
    }

    /**
     * @param $query
     * @param array $data
     */
    public function scopeOrderCat($query,array $data){
        $this->data = $data;
        $query->with(['categories' => function ($q) {
            $q->whereIn('parent',$this->data)->get(['categories.name','categories.slug']);
        }]);
        $query->whereHas('categories',function($q){
            $q->whereIn('parent',$this->data);
        });
    }

    /**
     * @param $query
     * @param $data
     */
    public function scopeGetCat($query,$data){
        $this->data = $data;
        $query->with(['categories' => function ($q) {
            $q->where('categories.parent',$this->data)->get(['categories.name','categories.slug']);
        }]);
        $query->whereHas('categories',function($q){
            $q->where('categories.parent',$this->data);
        });
    }

    /**
     * @param $query
     * @param array $data
     */
    public function scopeOrderAll($query,array $data){
        $this->data = $data;
        $query->with(['categories' => function ($q) {
            $q->whereIn('categories.id',$this->data)->select('categories.id','categories.name','categories.slug');
        }]);
        $query->whereHas('categories',function($q){
            $q->whereIn('categories.id',$this->data);
        });
    }

    /**
     * @param $query
     * @param $data
     */
    public function scopeGetOne($query,$data){
        $this->data = $data;
        $query->with(['categories' => function ($q) {
            $q->where('categories.id',$this->data)->select(['categories.id','categories.name','categories.slug']);
        }]);
        $query->whereHas('categories',function($q){
            $q->where('categories.id',$this->data);
        });
    }

    /**
     * @param $query
     * @param $data
     */
    public function scopeByCatSlug($query,$data){
        $this->data = $data;
        if($this->data == true):
            $query->with(['categories' => function ($q) {
                $q->where('categories.slug',$this->data)->select(['categories.id','categories.name','categories.slug']);
            }]);
            $query->whereHas('categories',function($q){
                $q->where('categories.slug',$this->data);
            });
        endif;
    }


    public function scopeArticleType($query,$data){
        $this->data = $data;
        if($this->data == true):
            $query->where('type',$this->data);
        endif;
    }


    public function scopeArticleTag($query,$data){
        $this->data = $data;
        if($this->data == true):
            $query->where('meta_key','LIKE','%'.str_replace('-',' ',$this->data).'%');
        endif;
    }

    /**
     * @param $query
     */
    public function scopeIsEmpty($query){
       return $query;
    }

    /**
     * @param $query
     */
    public function scopeGetArticleCat($query){
        $query->with(['categories'=>function($q){
            $q->select('categories.id');
        }]);
        $query->whereHas('categories',function($q){

        });
    }

    /**
     * @param $query
     * @param $data
     */
    public function scopeGetOneFirst($query,$data){
        $this->data = $data;
        $query->with(['categories' => function ($q) {
            $q->where('categories.id',$this->data)->get(['categories.id','categories.name','categories.slug'])->first();
        }]);

    }



    /**
     * @param $query
     * @param array $data
     */
    public function scopeMainCat($query,array $data){
        $this->data = $data;
        $query->with(['categories' => function ($q) {
            $q->whereIn('cat_id',$this->data)->get(['categories.id','categories.name','categories.slug']);
        }]);
        $query->whereHas('categories',function($q){
            $q->whereIn('cat_id',$this->data);
        });
    }



    /**
     * @param $query
     * @param $request
     */
    public function scopeFilter($query,$request,$prefix){
        $this->request = $request;
        $this->prefix = $prefix;

        //filter by category
        if(filter_request($this->request,$this->prefix.'cat') <> 0){
            if(filter_request($this->request,$this->prefix.'cat') > 2){
                $query->whereHas('categories',function($q){
                    $q->where('cat_id',filter_request($this->request,$this->prefix.'cat'));
                });
            }
            if(filter_request($this->request,$this->prefix.'cat') == 2){
                $query->whereHas('categories',function($q){
                    $q->where('parent',filter_request($this->request,$this->prefix.'cat'));
                });
            }

        }

        //filter by type
        if(!empty(filter_request($this->request,$this->prefix.'type'))){
            $query->where('type','=',filter_request($this->request,$this->prefix.'type'));
        }

        //filter by status
        if(!empty(filter_request($this->request,$this->prefix.'status'))){
            $query->where('status','=',filter_request($this->request,$this->prefix.'status'));
        }


        //filter by author
        if(filter_request($this->request,$this->prefix.'author') <> null){
            $query->where('author','like',filter_request($this->request,$this->prefix.'author').'%');
        }

        //filter by date
        if(filter_request($this->request,$this->prefix.'from') <> null or filter_request($this->request,$this->prefix.'to') <> null){
            if(filter_request($this->request,$this->prefix.'from') <> null){
                $this->to = (!filter_request($this->request,$this->prefix.'to')) ? Carbon::now() : Carbon::createFromFormat('d/m/Y H:i',filter_request($this->request,$this->prefix.'to'));
                $this->from = Carbon::createFromFormat('d/m/Y H:i',filter_request($this->request,$this->prefix.'from'));
                $query->whereBetween('published_at',[$this->from,$this->to]);
            }
        }

    }



    /**
     * Articles is owned by user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany('App\Cat');
    }


    /**
     * @return article Images
     */
    public function images(){
        return $this->belongsToMany('App\Image');
    }

    /**
     * @param array $data
     */
    public function addCat(array $data){
        $cat = $this->find($data['id']);
        if(count($data['cat']) > 0){
            foreach($data['cat'] as $id):
                $cat->categories()->attach($id);
            endforeach;
        }
    }

    /**
     * @param array $data
     */
    public function updateCat(array $data){
        $cat = $this->find($data['id']);
        $cat->categories()->detach();
        if(count($data['cat']) > 0){
            foreach($data['cat'] as $id):
                $cat->categories()->attach($id);
            endforeach;
        }
    }

    /**
     * update images
     */
    public function updateImages(array $data){
        //dump($data['image']);
        $image = $this->find($data['id']);

        if(count($data['image']) > 0){
            for($i=0;$i<count($data['image']);$i++):
                $image->images()->attach('',['article_id'=>$data['id'],'image_id'=>$data['image_id']]);
            endfor;
        }
    }

    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i',$date);
    }

    /**
     * @param $date
     */
    public function setFinishedAtAttribute($date){
        $this->attributes['finished_at'] = Carbon::createFromFormat('d/m/Y H:i',$date);
    }

    /**
     * @param $query
     */
    public function setExtraFieldsAttribute($query){
        $this->attributes['extra_fields'] = serialize($query);
    }


    /**
     * @param $slug
     */
    public function setSlugAttribute($slug)
    {

        if (empty($slug)) {
            $this->slug = Str::slug_utf8($this->attributes['title']);
            $slug = Article::where('slug', $this->slug)->pluck('slug');
            $this->attributes['slug'] = (empty($slug)) ? $this->slug : $this->slug . '-' . str_random(5);
        } else {
            if (isset($_REQUEST['_method']) == 'PATCH') {
                $this->slug = Str::slug_utf8($slug);
                $slug = Article::where('slug', $this->slug)->count();
                $this->attributes['slug'] = ($slug <= 1) ? $this->slug : $this->slug . '-' . str_random(5);
            } else {
                $this->slug = Str::slug_utf8($slug);
                $slug = Article::where('slug', $this->slug)->pluck('slug');
                $this->attributes['slug'] = (empty($slug)) ? $this->slug : $this->slug . '-' . str_random(5);
            }

        }
    }

    /**
     * @param $cat
     */
    public function setCatAttribute($cat){
        if(is_array($cat)){
            $this->attributes['cat'] = serialize($cat);
        }else{
            $this->attributes['cat'] = $cat;
        }

    }


    /**
     * @param $article
     * @return string
     */
    public function articleStatus($article){
        if($article->status > 0)
        {
            $article->update(['status'=>'0']);
            return 'unpublished';
        }else{
            //Article::where('status','=','1')->update(['status'=>'0']);
            $article->update(['status'=>'1']);
            return 'published';
        }
    }


    /**
     * @param bool|false $cat
     * @param bool|false $type
     * @param int $num
     * @param bool|false $tag
     * @return mixed
     */
    public function getArticles($cat=false, $type=false, $num=6, $tag = false){
        $this->cat = $cat; $this->type = $type; $this->num = $num; $this->tag = $tag;
        return \Cache::rememberForever(App::getLocale().'_article_'.$cat.'_'.$type.'_'.$num.'_'.$tag,function(){
            return Article::select('id','frontpage_title','head','title','published_at','author','meta_desc','slug','translate_slug','img','extra_fields')->published()->where('extra_fields','NOT LIKE','%s:22:"news_from_our_partners";a:1:{s:3:"Yes";s:1:"1";}%')->getcat(55)->language()->articletype($this->type)->articletag($this->tag)->bycatslug($this->cat)->latest()->take($this->num)->get();
        });
    }


    /**
     * @param bool|false $cat
     * @param bool|false $type
     * @param bool|false $tag
     * @param int $start
     * @param int $num
     * @return mixed
     */
    public function loadArticles($cat=false, $type=false, $tag = false, $start=0, $num=6){
        $this->cat = $cat; $this->type = $type; $this->num = $num; $this->tag = $tag; $this->start=$start;
        $items = Article::select('id','frontpage_title','head','title','published_at','author','meta_desc','slug','translate_slug','img','extra_fields')->published()->where('extra_fields','NOT LIKE','%s:22:"news_from_our_partners";a:1:{s:3:"Yes";s:1:"1";}%')->getcat(55)->language()->articletype($this->type)->articletag($this->tag)->bycatslug($this->cat)->latest()->skip($this->start)->take($this->num)->get();
        return (count($items) > 0) ? view('theme.pages.ajax.cat',compact('items')) : 0;
    }


    /**
     * @param int $num
     * @return mixed
     */
    public function getParents($num=6){
        $this->num = $num;

        return \Cache::rememberForever(App::getLocale().'_partners',function(){
            return Article::select('id','frontpage_title','head','title','published_at','meta_desc','slug','translate_slug','img')->published()->getone(83)->where('lang','en')->latest()->take($this->num)->get();
        });
    }


    /**
     * @param bool|false $type
     * @param int $num
     * @return mixed
     */
    public function getPickOfDay($cat=false, $type=false, $num=1, $tag = false){
        $this->cat = $cat; $this->type = $type; $this->num = $num; $this->tag = $tag;
        return \Cache::rememberForever(App::getLocale().'_article_'.$cat.'_'.$type.'_'.$num.'_'.$tag,function(){
            return Article::select('id','frontpage_title','head','title','body','published_at','author','meta_desc','slug','translate_slug','img')->published()->where('extra_fields','LIKE','%s:15:"pick_of_the_day";s:1:"1"%')->language()->articletype($this->type)->articletag($this->tag)->bycatslug($this->cat)->latest()->first();
        });
    }

    /**
     * @param bool|false $type
     * @param int $num
     * @return mixed
     */
    public function getNewsFromPartners($cat=false, $type=false, $num=1, $tag = false){
        $this->cat = $cat; $this->type = $type; $this->num = $num; $this->tag = $tag;
        return \Cache::rememberForever(App::getLocale().'_article_'.$cat.'_'.$type.'_'.$num.'_'.$tag,function(){
            return Article::select('id','frontpage_title','head','title','body','published_at','author','meta_desc','slug','translate_slug','img')->published()->where('extra_fields','LIKE','%s:22:"news_from_our_partners";a:1:{s:3:"Yes";s:1:"1";}%')->language()->articletype($this->type)->articletag($this->tag)->bycatslug($this->cat)->latest()->take($this->num)->get();
        });
    }

    /**
     * @param bool|false $cat
     * @param bool|false $type
     * @param bool|false $tag
     * @param int $start
     * @param int $num
     * @return mixed
     */
    public function loadPartnerArticles($cat=false, $type=false, $tag = false, $start=0, $num=6){
        $this->cat = $cat; $this->type = $type; $this->num = $num; $this->tag = $tag; $this->start=$start;
        $items = Article::select('id','frontpage_title','head','title','body','published_at','author','meta_desc','slug','translate_slug','img')->published()->where('extra_fields','LIKE','%s:22:"news_from_our_partners";a:1:{s:3:"Yes";s:1:"1";}%')->language()->articletype($this->type)->articletag($this->tag)->bycatslug($this->cat)->latest()->skip($this->start)->take($this->num)->get();
        return (count($items) > 0) ? view('theme.pages.ajax.cat',compact('items')) : 0;
    }

    public function loadSearchArticles($tag = false, $start=0, $num=6){
        $this->num = $num; $this->tag = $tag; $this->start=$start;
        $items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang','frontpage_title')->published()->getcat(55)->language()->where('title','LIKE','%'.$this->tag.'%')->orWhere('body','LIKE','%'.$this->tag.'%')->latest()->skip($this->start)->take($this->num)->get();
        return (count($items) > 0) ? view('theme.pages.ajax.cat',compact('items')) : 0;
    }

    public function loadNewsDate($date = false, $start=0, $num=6){
        $items = Article::select('id','body','title','head','published_at','slug','author','translate_slug','img','lang')->whereBetween('published_at',[$date.' 00:00:00',$date.' 23:59:00'])->published()->getcat(55)->language()->latest()->skip($start)->take($num)->get();
        return view('theme.pages.ajax.cat',compact('items','article','count'));
    }

    public function getAuthorArticles($author,$num){
        return Article::select('title','slug','translate_slug','head','body','published_at','author','frontpage_title','lang')->published()->language()->where('author',$author)->take($num)->get();
    }

    public function getSimilarArticles($cat,$num,$author=''){
        return Article::select('title','slug','translate_slug','head','body','published_at','author','frontpage_title','lang')->published()->language()->orderall($cat)->where('author','<>',$author)->take($num)->get();
    }

}
