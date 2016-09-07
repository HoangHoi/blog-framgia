<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        $categories = Category::all();
        $categoriesArr = [];
        foreach ($categories as $value) {
            $categoriesArr[$value->id] = $value->content;
        }
        view()->share('categories', $categoriesArr);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->bind('App\Repositories\Constract\CategoryRepositoryInterface', 'App\Repositories\CategoryRepository');
            $this->app->bind('App\Repositories\Constract\EntryRepositoryInterface', 'App\Repositories\EntryRepository');
            $this->app->bind('App\Repositories\Constract\UserRepositoryInterface', 'App\Repositories\UserRepository');
        }
    }

}
