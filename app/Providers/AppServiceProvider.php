<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        View::composer('User.include.Banner', function($view)
        {
            $view->with('categories',Category::where('category_status', 1) -> get());
        });


      View::composer('User.include.Dish', function($view)
        {

            $view->with('categories',Category::where('category_status', 1) ->get());

        });
    }

}
