<?php

namespace Notyourtechguy\Birdpay;

use Illuminate\Support\ServiceProvider;

class BirdpayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/birdpay.php' => config_path('birdpay.php'),
        ], 'config');

//        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BirdpayService::class, function() {
            return new BirdpayService();
        });

        $this->app->alias(BirdpayService::class, 'birdpay');
    }
}
