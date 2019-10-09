<?php

namespace corsHandler\Handler;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class CorsHandler extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Chandler', function ($app) {
            return new \corsHandler\Handler\Middleware\Chandler;
        });

    //     $this->app->middleware([
    //         \corsHandler\Handler\Middleware\Chandler::class
    //  ]);
        //
        // app('router')->aliasMiddleware('Chandler', \corsHandler\Handler\Middleware\Chandler::class);

        // array_unshift(app('router')->middlewarePriority, "Chandler");

        // dd(app('router')->middlewarePriority);
        

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

                /** @var \Illuminate\Foundation\Http\Kernel $kernel */
                $kernel = $this->app->make(Kernel::class);
                // When the HandleCors middleware is not attached globally, add the PreflightCheck
                if (! $kernel->hasMiddleware(\corsHandler\Handler\Middleware\Chandler::class)) {
                    $kernel->prependMiddleware(\corsHandler\Handler\Middleware\Chandler::class);
                }


    }
}
