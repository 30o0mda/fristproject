<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as Myview;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function (Myview $view) {
            $view->with(['myvar' => 'message from composer var']);
        });
    }


}
