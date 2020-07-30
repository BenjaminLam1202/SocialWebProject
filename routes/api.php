<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
Route::get('/users',function(){
	return App\User::all();
});
Route::apiResource('post', 'Api\PoController')->except(['index']);
Route::get('/fake/{user}','Api\PoController@fake')->name('generater.dashboard');
Route::get('/admin/dashboard','Api\PoController@dashboard')->name('admin.dashboard');
Route::get('/article','Api\PoController@social')->name('article.article');
Route::get('/article/detail/post/{id}','Api\PoController@detail');
Route::get('/admin/article/detail/post/{poid}','Api\PoController@detailadmin');
//comment route
//admin
Route::prefix('admin')->group(function () {

	Route::prefix('article/detail/post')->group(function () {

		Route::delete('{poid}/comment/{comid}/deletereply', 'Api\ComController@destroyreply');
		Route::delete('{poid}/comment/{comid}/delete', 'Api\ComController@destroy');
		Route::post('{poid}/comment/{comid}/reply', 'Api\ComController@replystore');
		Route::get('{poid}/comment/{comid}/edit', 'Api\ComController@edit')->name('admin.comment.edit')->middleware('usertouser');


		Route::patch('{poid}/comment/{comid}/update', 'Api\ComController@update'); 
		Route::get('{poid}/comment/{comid}/detail', 'Api\ComController@show');
	});
	Route::get('categories','Api\CatController@index');
	Route::post('categories/create','Api\CatController@store');
	Route::get('categories/{id}', 'Api\CatController@showme');
	Route::delete('categories/{id}/delete', 'Api\CatController@destroy')->middleware('rolecheck:admin');
	Route::patch('categories/{id}/update', 'Api\CatController@update')->middleware('rolecheck:admin');
	//user route
	Route::get('user','Api\UsController@index')->middleware('rolecheck:admin');
	Route::get('article','Api\UsController@adminarticle')->middleware('rolecheck:admin');
	Route::patch('user/{id}/update', 'Api\UsController@update')->middleware('rolecheck:admin');
	Route::delete('user/{id}/delete', 'Api\UsController@destroy')->middleware('rolecheck:admin');
	Route::post('user/create', 'Api\UsController@store')->middleware('rolecheck:admin');
	Route::post('role/make', 'Api\RoleController@store')->middleware('rolecheck:admin');
	Route::post('role/create', 'Api\RoleController@setrole')->middleware('rolecheck:admin');
	Route::post('role/remove', 'Api\RoleController@removerole')->middleware('rolecheck:admin');
	Route::get('role', 'Api\RoleController@index')->name('admin.manager.role')->middleware('rolecheck:admin');

	//role

});
//normal
Route::prefix('article/detail/post')->group(function () {

Route::delete('{poid}/comment/{comid}/deletereply', 'Api\ComController@destroyreply');
Route::delete('{poid}/comment/{comid}/delete', 'Api\ComController@destroy');
Route::post('{poid}/comment/{comid}/reply', 'Api\ComController@replystore');
Route::get('{poid}/comment/{comid}/edit', 'Api\ComController@edit');
Route::patch('{poid}/comment/{comid}/update', 'Api\ComController@update');
Route::get('{poid}/comment/{comid}/detail', 'Api\ComController@show');
});

//social
Route::get('/social', 'Api\PoController@social')->name('article.social');
