<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Post;
use App\Charts\UserChart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'localization'], function() {
    Route::get('change-language/{language}', 'AdminController@changeLanguage')->name('user.change-language');

	Route::get('/', function ()
	 { 
		return view('dashboard'); 
        
})->middleware('auth');
Auth::routes(['verify' => true]);
Route::prefix('admin')->group(function () {
Route::get('/', 'AdminController@dashboard')->name('admin.manager.dashboard')->middleware('rolecheck:admin');
Route::get('/user', 'AdminController@index')->name('admin.manager.manager')->middleware('rolecheck:admin');
Route::get('/category', 'AdminController@category')->name('admin.manager.category')->middleware('rolecheck:admin');
Route::get('/article', 'AdminController@articlemanager')->name('admin.manager.article')->middleware('rolecheck:admin');
Route::get('/role', 'AdminController@role')->name('admin.manager.role')->middleware('rolecheck:admin');
});
Auth::routes();
//home route
Route::get('/home', 'HomeController@index')->name('home');
//profile route
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.profile');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}','ProfileController@update');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
//post route
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');
Route::get('/p/{post}', 'PostController@show');
Route::get('/d/{post}', 'PostController@delete');
Route::get('/profile/po/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/profile/po/{post}', 'PostController@update');
Route::get('/post/{post}', 'PostController@index')->name('post.show');
//category route
Route::get('/kid', 'CategoryController@kidshow')->name('category.kid');
Route::get('/adult', 'CategoryController@adultshow')->name('category.adult');
Route::get('/millennials', 'CategoryController@millennialsshow')->name('category.millennials');
//comment route
Route::post('/c/{post}', 'CommentController@store');
Route::post('/cc/{comment}', 'CommentController@replystore');
Route::post('/cu/{user}', 'CommentController@storeuser');
Route::get('/cd/{comment}', 'CommentController@delete');
Route::get('/ec/{comment}', 'CommentController@edit')->name('comment.edit');
Route::patch('/ep/{comment}', 'CommentController@update');
//reation rout
Route::get('/nl/{reaction}', 'ReactionController@delete');
Route::get('/l/{post}', 'ReactionController@like');
//follower rout
Route::get('/f/{follower}','FollowUserController@follower');
Route::get('/uf/{follower}','FollowUserController@unfollower');
//csv
Route::get('export', 'PostController@export')->name('export');
Route::get('importExportView', 'PostController@importExportView');
Route::post('import', 'PostController@import')->name('import');

//muilty langugue
Route::get('admin/mail', function () {
    return view('mail.form');
});
Route::post('/message/send', ['uses' => 'MailController@addFeedback', 'as' => 'front.fb']);




//will be remove just for all goods


Route::post('/test/me', ['uses' => 'MailController@testme', 'as' => 'test.me']);



Route::get('/test/me', function () {
    return view('will.willremove');
     });

Route::get('/test/me/testauth', function () {
    return view('will.testauth.testauth');
     })->name('testauth');


Route::get('/test/me/after', ['uses' => 'MailController@testafter', 'as' => 'test.after']);


Route::post('/test/me/checkre/dd', ['uses' => 'MailController@testcheckre', 'as' => 'test.check.request']);

Route::get('/test/me/error', ['uses' => 'MailController@testloerror', 'as' => 'test.check.error']);
Route::get('/test/me/logging', ['uses' => 'MailController@logging', 'as' => 'test.check.logging']);

Route::get('/test/me/db', ['uses' => 'MailController@querytest', 'as' => 'test.check.db']);
Route::get('/test/me/collectelo', ['uses' => 'MailController@collectelo', 'as' => 'test.check.collectelo']);
Route::get('/test/me/serializeelo', ['uses' => 'MailController@serializeelo', 'as' => 'test.check.serializeelo']);



Route::get('/test/me/checkre', function () {
    return view('will.khiemtrarequest.requestchec');
     })->name('chec.requ');

Route::get('/test/me/cotoken', function () {
    return view('will.vidutoken.co');
     })->name('co.token');

Route::get('/test/me/khongtoken', function () {
    return view('will.vidutoken.khong');
     })->name('khong.token');


Route::get('/test/me/reqp', function () {

    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});



    });

