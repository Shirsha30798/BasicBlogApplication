<?php

namespace App\Providers;


use View;
use Illuminate\Support\ServiceProvider;
use App\Blog;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partials.meta_dynamic','layouts.nav','categories.show'], function ($view){
            $view->with('blogs', Blog::where('status',1)->latest()->get());
        });
    }
}
