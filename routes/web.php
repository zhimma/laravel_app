<?php

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
Route::namespace('Home')->group(function (){
    Route::get('/', 'IndexController@index')->name('home.index');
    Route::get('navigate/{id}', 'NavigateController@index')->name('home.navigate');
    Route::get('article/{id}', 'ArticleController@show')->name('home.article');
    Route::get('category/{id}', 'CategoryController@index')->name('home.category');
});
