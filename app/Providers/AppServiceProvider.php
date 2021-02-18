<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        \URL::forceRootUrl(\Config::get('app.url'));
        if (str_contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
        }

        Blade::directive('icon', function ($expression) {
            return "<i class=\"fas fa-fw fa-{{ $expression }}\"></i>";
        });
    }
}
