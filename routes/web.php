<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

Route::get('/','PageController@index');


Route::get('about','PageController@about');
Route::get('contact','PageController@contact');



Route::get('/register','Auth\RegisterController@register');

 Auth::routes();
Route::get('logout','Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('test/{id}','TestController@index');


Route::get('category/{id}','CategoryController@index');





Route::group(['prefix' => 'admin','namespace'=>'admin','middleware'=>'auth'], function () {
    
   Route::view('/', 'admin.layouts.master');
    
    // Posts Routes (Crud) 

Route::group(['middleware' => ['can:isAdmin']], function () {
    

    
    // Category Routes (Crud)

    Route::get('category','CategoryController@index');
    Route::get('category/create','CategoryController@create');
    Route::post('category/create','CategoryController@store');
    Route::get('category/{id}/edit','CategoryController@edit');
    Route::post('category/{id}/edit','CategoryController@update');
    Route::get('category/{id}/delete','CategoryController@destroy');

    // Users Routes

    Route::get('user','UserController@index');
    Route::get('user/create','UserController@create');
    Route::post('user/create','UserController@store');
    Route::get('user/{id}/edit','UserController@edit');
    Route::post('user/{id}/edit','UserController@update');
    Route::get('user/{id}/delete','UserController@destroy');

});

    
Route::group(['middleware' => ['can:isAdminOrCon']], function () {
    

    Route::get('post','PostController@index');
    Route::get('post/create','PostController@create');
    Route::post('post/create','PostController@store');
    Route::get('post/{id}/show','PostController@show');
    Route::get('post/{id}/edit','PostController@edit');
    Route::post('post/{id}/edit','PostController@update');
    Route::get('post/{id}/delete','PostController@destroy');

});

});