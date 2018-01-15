<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/11 15:46
 */

Route::prefix('admin')->group(function(){
    // Authentication Routes...
    Route::namespace('Admin\Auth')->group(function(){
        $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
        $this->post('login', 'LoginController@login');
        $this->post('logout', 'LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'RegisterController@register');

        // Password Reset Routes...
       /* $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Forgot PasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'ResetPasswordController@reset');*/
    });


    Route::namespace('Admin')->middleware(['auth.admin:admin'])->group(function(){
        Route::resource('index','IndexController');
        Route::get('user/ajaxGetList',"UserController@ajaxGetList")->name('user.ajaxGetList');
        Route::resource('user','UserController');
        Route::post('userInfo/upload',['uses'=>'UserInfoController@upload'])->name('userInfo.upload');
        Route::resource('userInfo','UserInfoController');
        Route::resource('menu','MenuController');
        Route::get('permission/ajaxGetList',['uses' => 'PermissionController@ajaxGetList'])->name('permission.ajaxGetList');
        Route::resource('permission','PermissionController');
        Route::get('role/ajaxGetList',['uses' => 'RoleController@ajaxGetList'])->name('role.ajaxGetList');
        Route::PUT('role/updateAuth/{id}',['uses' => 'RoleController@updateAuth'])->name('role.updateAuth');
        Route::resource('role','RoleController');
    });

});
