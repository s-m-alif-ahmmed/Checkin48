<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
         $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        {
            Paginator::useBootstrap();


            view()->composer('frontend.app', function ($view) {
                $socialMediaLinks = \App\Models\SocialMedia::where('status','active')->whereIn('id', [1, 2, 3, 4, 5])->get()->pluck('link', 'id');
                $view->with('socialMediaLinks', $socialMediaLinks);
            });
        }
    }
}
