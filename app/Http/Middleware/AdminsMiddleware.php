<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class AdminsMiddleware
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
			// User should be authenticated and he must have admin role
			if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') {
				return $next($request);
			} else {
				return redirect('/');
			}
		}
	}
