<?php

namespace Fabwebstudio\Webline;

use Illuminate\Support\ServiceProvider;

class WeblineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/webline.php' => config_path('webline.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        // Config
        $this->mergeConfigFrom( __DIR__.'/Config/webline.php', 'webline');

        $this->app['webline'] = $this->app->share(function($app) {
            return new Webline;
        });
    }
}
