<?php

namespace App\Providers;

use App\Repositories\StoryEloquentRepository;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\StoryRepository', function($app)
        {
            return new StoryEloquentRepository($app['App\Story']);
        });
    }
}
