<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Article;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer(['_partials.header','_partials.sidebar'], function ($view) {

            $latestarticles = Article::orderBy('created_at','desc')->get();
            $cats = Category::all();
            $populararticles = Article::get()->sortByDesc('views');

            $view->with(compact('latestarticles','cats','populararticles'));

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
