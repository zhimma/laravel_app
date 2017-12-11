<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/11 15:46
 */

Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::resource('index','IndexController');
});