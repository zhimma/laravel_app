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
        Route::resource('user','UserController');
        Route::resource('menu','MenuController');
    });
});
