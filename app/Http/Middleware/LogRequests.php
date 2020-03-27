<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_route = Route::getFacadeRoot()->current()->uri();
        DB::insert("INSERT INTO requests (ip, route_name) VALUES (?, ?)",
                        [$request->ip(),
                        $current_route]);
        return $next($request);
    }
}
