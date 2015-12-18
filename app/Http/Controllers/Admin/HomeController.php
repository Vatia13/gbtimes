<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
        $this->middleware('language');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(User $users)
	{
        $users = $users = $users->getUsers(['Author','DJs']);
		return view('admin.home',compact('users'));
	}

}
