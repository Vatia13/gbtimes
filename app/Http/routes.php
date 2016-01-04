<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


///**
// * TEST
// */
//Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
//{
//	// Send an array of permissions to request
//	$login_url = $fb->getLoginUrl(['email']);
//
//	// Obviously you'd do this in blade :)
//	echo '<a href="' . $login_url . '">Login with Facebook</a>';
//});
//
//Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
////// Obtain an access token.
////	try {
////		$token = $fb->getAccessTokenFromRedirect();
////	} catch (Facebook\Exceptions\FacebookSDKException $e) {
////		dd($e->getMessage());
////	}
////
////	// Access token will be null if the user denied the request
////	// or if someone just hit this URL outside of the OAuth flow.
////	if (! $token) {
////		// Get the redirect helper
////		$helper = $fb->getRedirectLoginHelper();
////
////		if (! $helper->getError()) {
////			abort(403, 'Unauthorized action.');
////		}
////
////		// User denied the request
////		dd(
////			$helper->getError(),
////			$helper->getErrorCode(),
////			$helper->getErrorReason(),
////			$helper->getErrorDescription()
////		);
////	}
////
////	if (! $token->isLongLived()) {
////		// OAuth 2.0 client handler
////		$oauth_client = $fb->getOAuth2Client();
////
////		// Extend the access token.
////		try {
////			$token = $oauth_client->getLongLivedAccessToken($token);
////		} catch (Facebook\Exceptions\FacebookSDKException $e) {
////			dd($e->getMessage());
////		}
////	}
////
////	$fb->setDefaultAccessToken($token);
////
////	// Save for later
////	Session::put('fb_user_access_token', (string) $token);
////
////	// Get basic info on the user from Facebook.
////	try {
////		$response = $fb->get('/me?fields=id,name,email');
////	} catch (Facebook\Exceptions\FacebookSDKException $e) {
////		dd($e->getMessage());
////	}
//$token = 'CAAXKcvtAVVgBAPDEKDNPU0zDzIdRwYwJAoiUF25ubYmezwHxdJZC4FDBQJGCjSUfaX1tA5IY1PIlfPJvcAmCFXxlypnlssVrfuobNxeaLtlILJJwB9SjuJbNuMDFYAytMndKOd7O5Ju4xu4dduhiW1BKr5Avact5tKtuZAHxpqwPXzZA8jzVgTopoWhBBUZD';
//	// Convert the response to a `Facebook/GraphNodes/GraphUser` collection
//	//$facebook_user = $response->getGraphUser();
//	$fb->setDefaultAccessToken($token);
//	$params = array(
//		"message" => "Auto #php #facebook",
//		"link" => "http://www.www.codeniters.com",
//		"picture" => "http://www.codeniters.com/assets/images/register.jpg",
//		"name" => "How to Auto Post on Facebook with PHP",
//		"caption" => "www.codeniters.com",
//		"description" => "Automatically post on Facebook with PHP using Facebook PHP SDK."
//	);
//		try {
//		$response = $fb->post('/dgissimgera/feed',$params);
//	} catch (Facebook\Exceptions\FacebookSDKException $e) {
//		dd($e->getMessage());
//	}
//	// Create the user if it does not exist or update the existing entry.
//	// This will only work if you've added the SyncableGraphNodeTrait to your User model.
////	$user = App\User::createOrUpdateGraphNode($facebook_user);
////
////	// Log the user into Laravel
////	Auth::login($user);
//
//	return $token;//redirect('/')->with('message', 'Successfully logged in with Facebook');
//});

use App\Article;
use Illuminate\Support\Facades\DB;

Route::get('/test/xml/parse',function(){
    $url = 'https://news.google.com/news?cf=all&hl=en&pz=1&ned=us&csid=c68abdab5e4f18cf&output=rss';
    parseSimpleContentData($url);
});


Route::get('import/main/images',function(Article $article){
    $main_images = DB::table('images')->select('img','article_id')->where('status',0)->get();
    foreach($main_images as $item):
        $art = $article->findOrFail($item->article_id);
        $art->update(['img'=>$item->img]);
    echo $art->article_id.'<br>';
    endforeach;
});


Route::get('update/extra/base64',function(Article $article){
    $main_images = DB::table('articles')->select('extra_fields','id')->where('status',0)->get();
    foreach($main_images as $item):
        $extra_fields = base64_decode($item->extra_fields);
        #$art = $article->findOrFail($item->id);
        #$art->update(['extra_fields'=>$extra_fields]);
        echo $extra_fields.'<br>';
    endforeach;
});

/*
 * Admin Home
 */

Route::get('is-admin/home', ['middleware'=>'RedirectUser','uses'=>'Admin\HomeController@index']);
Route::resource('is-admin/articles','Admin\ArticlesController');
Route::post('is-admin/articles/filter','Admin\ArticlesController@filter');
Route::put('is-admin/articles/active/{id}','Admin\ArticlesController@active');
Route::post('is-admin/articles/event','Admin\ArticlesController@event');
Route::post('is-admin/articles/getEvents','Admin\ArticlesController@getEvents');
Route::post('is-admin/articles/getCats','Admin\ArticlesController@getCats');
Route::post('is-admin/articles/getFields','Admin\ArticlesController@getFields');
/*
 * Settings
 */
Route::get('is-admin/settings','Admin\SettingsController@index');
Route::patch('is-admin/settings/update','Admin\SettingsController@update');
/*
 * Modules
 */
Route::resource('is-admin/modules','Admin\ModulesController');
Route::put('is-admin/modules/active/{id}','Admin\ModulesController@active');
Route::put('is-admin/modules/sort/{id}','Admin\ModulesController@sort');
/*
 * Fields
 */
Route::get('is-admin/fields/{id}','Admin\FieldsController@show');
Route::put('is-admin/fields/store/{id}','Admin\FieldsController@store');
Route::put('is-admin/fields/update/{id}','Admin\FieldsController@update');
Route::put('is-admin/fields/drop/{id}','Admin\FieldsController@drop');
/*
 * Billing
 */
Route::resource('is-admin/billings','Admin\BillingsController');
Route::put('is-admin/billings/active/{id}','Admin\BillingsController@active');


Route::get('payment/check/{bank_id?}',['middleware'=>'BankAuth','uses'=>'Admin\BillingsController@check']);
Route::get('payment/register/{bank_id?}',['middleware'=>'BankAuth','uses'=>'Admin\BillingsController@pay']);
/*
 * Roles
 */


Route::resource('is-admin/roles','Admin\RolesController');



/*
 * Pages
 */
Route::resource('is-admin/pages','Admin\PagesController');
Route::post('/is-admin/pages/create','Admin\PagesController@create');
Route::post('/is-admin/pages/clone/{id}','Admin\PagesController@clonePage');
/*
 * Movies
 */
Route::resource('is-admin/movies','Admin\MoviesController');
Route::post('is-admin/movies/filter','Admin\MoviesController@filter');
Route::put('is-admin/movies/active/{id}','Admin\MoviesController@active');
/*
 * Poll
 */
Route::resource('is-admin/polls','Admin\PollsController');
Route::put('is-admin/categories/active/{id}','Admin\PollsController@active');
Route::put('vote','Admin\PollsController@vote');

/*
 * Categories
 */

Route::resource('is-admin/categories','Admin\CategoriesController');
Route::put('is-admin/categories/sort/{id}','Admin\CategoriesController@sort');

/*
 * Authorisation
 */
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
Route::get('is-admin/auth',['middleware'=>['ManagerLoggedIn','language'],'uses'=>'Auth\AuthController@newLogin']);
Route::post('user/login','Auth\AuthController@postLogin');
Route::get('user/logout','Auth\AuthController@getLogout');
Route::post('user/check','Auth\AuthController@checkLogin');
Route::post('user/registration','Auth\AuthController@registration');
/*
 * Users
 */

Route::resource('is-admin/users','Admin\UsersController');
Route::get('user/{id}','Admin\UsersController@frontEdit');
Route::post('ajax/user','Admin\UsersController@getAjaxUserName');

/*
 * Banners
 */
Route::resource('is-admin/banners','Admin\BannersController');
/*
 * Language
 */
Route::post('/language',['before'=>'csrf','as'=>'language-choser','uses'=>'LanguageController@choser']);
Route::post('/language_cookie',['before'=>'csrf','as'=>'language-cookie','uses'=>'LanguageController@cookie']);
/*
 * Images Gallery
 */
Route::resource('is-admin/gallery','Admin\ImagesController');
Route::post('is-admin/gallery/filter','Admin\ImagesController@filter');
Route::put('is-admin/gallery/active/{id}','Admin\ImagesController@active');
Route::post('field/get','Admin\ImagesController@imgField');
/*
 * Errors
 */

Route::get('/error/{id}','ErrorsController@show');

/*
 * Redirects
 */



/*
 * FRONT INDEX
 */



//Route::get('cat/{slug}','WelcomeController@articleList');
//Route::get('gallery/{id}','WelcomeController@imageShow');
//Route::get('image/gallery','WelcomeController@images');
//Route::get('rss/feed','WelcomeController@rss');
//Route::get('currency/generator','WelcomeController@currency');

Route::get('brightcove/videos','Admin\ArticlesController@brightCove');
Route::post('brightcove/videos','Admin\ArticlesController@brightCove');
Route::get('rss/feed','WelcomeController@rss');
Route::get('search/news','WelcomeController@search');
Route::get('/','WelcomeController@index');
Route::post('/','WelcomeController@index');
Route::get('language/get','WelcomeController@language');
Route::get('tags/{slug}','WelcomeController@showTags');
Route::get('{cat}/{sid}','WelcomeController@showArticle');
Route::get('{slug}','WelcomeController@showPage');
Route::get('news/date/{date}','WelcomeController@newsDate');
Route::get('{cat}/date/{date}','WelcomeController@catDate');
Route::get('show/{author}/news','WelcomeController@newsAuthor');
Route::get('similar/news/{cats}','WelcomeController@SimilarNews');
/*
 * AJAX
 */
Route::post('ajax/loadArticles','WelcomeController@loadArticles');
Route::post('ajax/loadPartnerArticles','WelcomeController@loadPartnerArticles');
Route::post('ajax/loadSearchArticles','WelcomeController@loadSearchArticles');
Route::post('ajax/loadNewsDate','WelcomeController@loadNewsDate');
Route::post('ajax/loadNewsAuthor','WelcomeController@loadNewsAuthor');
Route::post('ajax/loadSimilarNews','WelcomeController@loadSimilarNews');
Route::get('ajax/load/index','WelcomeController@ajaxIndex');
Route::get('ajax/load/page/','WelcomeController@ajaxPage');
Route::get('ajax/load/article/','WelcomeController@ajaxArticle');


/*
 * Articles
 */



Route::post('ajax/tags','Admin\ArticlesController@getAjaxTags');


