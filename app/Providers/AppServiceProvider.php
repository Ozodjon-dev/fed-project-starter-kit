<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('vendor.pagination.bootstrap-5');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (isset($_COOKIE['theme'])) {
            config(['custom.theme' => $_COOKIE['theme']]);
        } else {
            config(['custom.theme' => 'light']);
        }

        // Cookie to'g'ri o'qilayotganini tekshirish
        \Log::info('Current theme from cookie: ' . ($_COOKIE['theme'] ?? 'not set'));
    }



}
