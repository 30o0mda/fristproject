<?php

namespace App\Providers;

use App\Models\Example;
use App\Observers\ExampleObserve;
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
        Example ::observe(new ExampleObserve);
        View::composer('*', function (Myview $view) {
            $view->with(['myvar' => 'message from composer var']);
        });
    }


}
