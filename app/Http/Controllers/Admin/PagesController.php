<?php

namespace App\Http\Controllers\Admin;


use App\Article;
use App\Field;
use App\Http\Requests\PageRequest;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Html;
use Illuminate\Support\Facades\Cache;


class PagesController extends Controller
{

    protected $perms = [], $auth, $post, $translate_slug;

    public function __construct(){

        /**
         * getting role permissions
         */

        $this->auth = Auth::user();
        if (Auth::check())
        {
            $this->perms = get_role_permissions($this->auth,'pages');
            $this->perms = array_add($this->perms,count($this->perms),'clonePage');
            $this->perms = ['except' => $this->perms];
        }else{
            $this->perms = guest_role_permissions('pages');
            $this->perms = ['except' => $this->perms];
        }
        /**
         * Middlewares
         */
        $this->middleware('auth',['except'=>['show']]);
        $this->middleware('RedirectUser',['except'=>['show']]);
        $this->middleware('role',$this->perms);
        $this->middleware('language');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $pages =  Article::select('id','title')->latest()->maincat([1])->language(true)->paginate(get_setting('pagination_num'));

        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create',compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @param Page $page
     * @return Response
     */
    public function store(PageRequest $request,Article $page)
    {
        $this->post = $this->auth->articles()->create($request->all());
        $page->addCat(['cat'=>[1,$request->input('cat')],'id'=>$this->post->id]);
        Cache::flush();
        flash()->success(trans('pages.added'));

        return redirect(action('Admin\PagesController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Article::findOrFail($id);
        $this->translate_slug = $page->translate_slug;
        $tr= Article::select('lang')->where('lang','!=',$page->lang)->where(function($query){
            return $query->where('slug','=',$this->translate_slug)->orWhere('translate_slug','=',$this->translate_slug);
        })->groupBy('id')->get()->toArray();

        $translates = array_pluck($tr,'lang');
        return view('admin.pages.edit',compact('page','translates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,PageRequest $request)
    {
        $page = Article::findOrFail($id);
        $page->update($request->all());
        $page->updateCat(['cat'=>[1,$request->input('cat')],'id'=>$id]);
        Cache::flush();
        flash()->success(trans('pages.updated'));
        return redirect(action('Admin\PagesController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();

        return trans('pages.removed');
    }


    public function clonePage($id){
        $item = Article::findOrFail($id);
        $clone = $item->replicate();
        unset($clone['created_at'],$clone['updated_at'],$clone['finished_at'],$clone['published_at'],$clone['lang']);

        $new = Article::create($clone->toArray());
        $new->categories()->attach(1);
        return redirect(action('Admin\PagesController@edit',$new->id));


    }
}
