<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Billing\Stripe;

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

        // Callback function when ALL 'layouts.sidebar' has loaded
        // make $archives variable populated and available
        view()->composer('layouts.sidebar', function($view) {
            /** Method #1: direct one-liner */
            /*
            $view->with('archives', \App\Post::archives());
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));
            */

            /** Method #2: Declare and use */
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register class to a service container
        // \App::singleton
        $this->app->singleton(Stripe::class, function($app) {
            // $app->make('');
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
