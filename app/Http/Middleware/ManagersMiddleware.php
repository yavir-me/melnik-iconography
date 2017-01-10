<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class ManagersMiddleware
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
            // User should be authenticated and he must have manager role
            if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'manager') {
                return $next($request);
            } else {
                return redirect('/');
            }       }
    }
