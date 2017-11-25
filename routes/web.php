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

/*Route::get('/', function () {
    return view('welcome');
})->name('index');
//Route::get('/user','')->name('user');
//使用route 辅助函数为命名路由生成url
Route::get('/redirect',function(){
    return redirect()->route('index');
});
Route::get('/model/{id}',function(\App\User $user){
    dd($user::where('id',1)->first());
});*/

Route::get('/routes',function(){
    $route = Route::current();
    $route = Route::currentRouteAction();
    dd($route);
});