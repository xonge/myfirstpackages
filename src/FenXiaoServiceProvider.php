<?php

namespace Xonge\Fenxiao;

use Illuminate\Support\ServiceProvider;

class FenXiaoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->make(FenXiaoController::class);

        include(__DIR__ . '/routes.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'FenXiao');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
