<?php

namespace corsHandler\Handler\Middleware;

use Closure;
use Response;

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

        $routes = \Route::getRoutes()->getRoutesByMethod();
        // dd($request->header());
        // dd($routes['GET']);
        $request_access_control_request_method = $request->header('access-control-request-method');
        $request_access_control_request_headers = $request->header('access-control-request-headers');
        $request_origin = $request->header('origin');

        $request_accept = $request->header('accept');
        if (in_array($request_access_control_request_method, $request_headers)) {
            $method_routes = $routes[$request_access_control_request_method];
            // dd(["sdss", $method_routes]);

            // dd($method_routes[ltrim($request->getPathInfo(), $request->getPathInfo()[0])]);

            if (isset($method_routes[ltrim($request->getPathInfo(), '/')])) {
                // dd($request->getPathInfo());
                // dd($routes);
                $allowed_methods = [];
                foreach ($request_headers as $key => $verb) {
                    # code...
                    foreach ($routes as $key => $value) {
                        # code...
                        if (isset($routes[$verb])) {
                            if (isset($routes[$verb][ltrim($request->getPathInfo(), '/')])) {
                                $allowed_methods[] = $verb;

                            }
                        }
                    }

                }
                return Response::make(null, 200, ['Allow' => implode(',', array_unique($allowed_methods)), 'Access-Control-Request-Method' => implode(',', array_unique($allowed_methods))]);

                dd(["verbs", array_unique($allowed_methods)]);

            }

        }
        // foreach ($routes as $route) {
        //     $slugs[] = $route->uri();
        // }

        dd(["Return", $request->getPathInfo()]);

        return $next($request);
    }
    public function terminate($request, $response)
    {

    }

}
