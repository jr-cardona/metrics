<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');

        view()->composer('components.language-switcher', function ($view) {
            $view->with('currentLocale', app()->getLocale());
            $view->with('availableLocales', config('app.available_locales'));
        });
    }
}
