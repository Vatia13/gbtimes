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

Route::get('/test',function(){
    return App\Dev\Facades\Foo::bar();
});




/*
 * Admin Home
 */

Route::get('is-admin/home', ['middleware'=>'RedirectUser','uses'=>'Admin\HomeController@index']);

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
Route::get('is-admin/auth',['middleware'=>['ManagerLoggedIn','language'],'uses'=>'Auth\AuthController@getLogin']);
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

//Route::get('search/news','WelcomeController@search');
Route::get('/','WelcomeController@index');
Route::post('/','WelcomeController@index');
Route::get('language/get','WelcomeController@language');

/*
 * AJAX
 */
Route::post('ajax/loadArticles','WelcomeController@loadArticles');
Route::post('ajax/loadPartnerArticles','WelcomeController@loadPartnerArticles');
/*
 * Articles
 */
Route::get('rss/feed','WelcomeController@rss');
Route::get('brightcove/videos','Admin\ArticlesController@brightCove');
Route::post('brightcove/videos','Admin\ArticlesController@brightCove');
Route::resource('is-admin/articles','Admin\ArticlesController');
Route::post('is-admin/articles/filter','Admin\ArticlesController@filter');
Route::get('{cat}/{sid}','WelcomeController@showArticle');
Route::get('{slug}','WelcomeController@showPage');
Route::get('{cat}','WelcomeController@showCat');

Route::put('is-admin/articles/active/{id}','Admin\ArticlesController@active');
Route::post('is-admin/articles/event','Admin\ArticlesController@event');
Route::post('is-admin/articles/getEvents','Admin\ArticlesController@getEvents');
Route::post('is-admin/articles/getCats','Admin\ArticlesController@getCats');
Route::post('is-admin/articles/getFields','Admin\ArticlesController@getFields');

Route::post('ajax/tags','Admin\ArticlesController@getAjaxTags');


