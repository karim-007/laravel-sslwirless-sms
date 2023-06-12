<?php

namespace Karim007\LaravelSslwirlessSms;

use Illuminate\Support\ServiceProvider;
use Karim007\LaravelSslwirlessSms\Sms\SslWirlessSms;

class SSLWirlessSmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../config/sslwirless.php" => config_path("sslwirless.php")
        ],'config');
        $this->publishes([
            __DIR__.'/Controllers/SSLWirlessSmsController.php' => app_path('Http/Controllers/SSLWirlessSmsController.php'),
        ],'controllers');
    }

    /**
     * Register application services
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/sslwirless.php", "sslwirless");

        $this->app->bind("sslwirlesssms", function () {
            return new SslWirlessSms();
        });
    }
}
