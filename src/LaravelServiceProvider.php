<?php

namespace TooPago\OpenPay;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/openpay.php' => config_path('openpay.php')
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/openpay.php', 'openpay'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
