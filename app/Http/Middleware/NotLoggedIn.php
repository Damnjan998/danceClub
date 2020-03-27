<?php


	namespace App\Http\Middleware;

	use Closure;

	class NotLoggedIn {
        public function handle($request, Closure $next) {
            if ($request->session()->has('user')) {
                return $next($request);
            } else {
                return redirect("/login");
            }
        }
	}
