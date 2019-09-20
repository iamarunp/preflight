<?php

namespace corsHandler\Handler;

use Illuminate\Support\ServiceProvider;

class CorsHandler extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->mergeConfigFrom(
            __DIR__ . '/config/CORS_handler_config.php', 'CORS_handler_config'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ]);

        $this->app->singleton('Chandler', function ($app) {
            return new \corsHandler\Handler\Middleware\Chandler;
        });
    }
}
