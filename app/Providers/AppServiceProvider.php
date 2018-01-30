<?php

namespace App\Providers;

use App\Rice;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        view()->composer('admin.layout.sideBar','App\Http\ViewComposers\MenuComposer');
        view()->composer('home.layout.header','App\Http\ViewComposers\NavigateComposer');
        //文章分类
        view()->composer('home.layout.sidebar','App\Http\ViewComposers\CategoryComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
