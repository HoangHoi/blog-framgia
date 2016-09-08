<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Entry;

//use App\Repositories\Constract\EntryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
//    protected $entryRepositoryInterface;
//    public function __construct(EntryRepositoryInterface $entryRepositoryInterface)
//    {
//        $this->$entryRepositoryInterface = $entryRepositoryInterface;
//    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            $categoriesArr = [];
            foreach ($categories as $value) {
                $categoriesArr[$value->id] = $value->content;
            }
            view()->share('objCategories', $categories);
            view()->share('categories', $categoriesArr);
        }
        if (Schema::hasTable('entries')) {

            $best_entries = Entry::where('published_at', '!=', '0000-00-00 00:00:00')
                    ->orderBy('view_count', 'desc')
                    ->limit(config('common.num_best_entry'))
                    ->get();
            view()->share('best_entries', $best_entries);
        }
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
