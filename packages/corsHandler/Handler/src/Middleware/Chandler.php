<?php

namespace corsHandler\Handler\Middleware;

use Closure;

class Chandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $startTime;
    public $errors;
    public function handle($request, Closure $next)
    {

        $slugs = [];
        $request_headers = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTION'];

        // dd(\Route::getRoutes());
        $routes = \Route::getRoutes()->getRoutesByMethod();
        // dd($request->header());
        // dd($routes['GET']);
        $request_access_control_request_method = $request->header('access-control-request-method');
        $request_access_control_request_headers = $request->header('access-control-request-headers');
        $request_origin = $request->header('origin');

        $request_accept = $request->header('accept');
        if (in_array($request_access_control_request_method, $request_headers)) {
            $method_routes = $routes[$request_access_control_request_method];

            dd($method_routes[ltrim($request->getPathInfo(), $request->getPathInfo()[0])]);

            if (isset($method_routes[$request->getPathInfo()])) {
                dd($method_routes);

            }

        }
        // foreach ($routes as $route) {
        //     $slugs[] = $route->uri();
        // }

        dd($request->getPathInfo());

        return $next($request);
    }
    public function terminate($request, $response)
    {

    }

}
