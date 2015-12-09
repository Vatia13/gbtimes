<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    protected $perms = [], $auth;

    public function __construct(){

        /**
         * getting role permissions
         */

        $this->auth = Auth::user();
        if (Auth::check())
        {
            $this->perms = get_role_permissions($this->auth,'settings');
            $this->perms = ['except' => $this->perms];

        }else{
            $this->perms = guest_role_permissions('settings');
            $this->perms = ['except' => $this->perms];
        }
        //print_r(bcrypt($this->auth->password));
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::select('name','value')->where('load',3)->get();
        return view('admin.settings.index',compact('settings'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $load
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Setting $setting)
    {
        Cache::forget('settings');
        $setting->updateSettings($request,['site_title','site_tags','site_description','allow_registration','pagination_num']);
        flash()->success(trans('all.entry_updated'));
        return redirect(action('Admin\SettingsController@index'));
    }


}
