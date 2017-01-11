<?php

namespace App\Http\Middleware;

use Closure, Illuminate\Http\Request, Sentinel, App\User, Auth;

class LanguageMiddleware
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
        $path = '/' . /* lang prefix goes here */ '/' . $request->path() . '/';
        // check locale for the authenticated user
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            $localization = $user->localization ? $user->localization : app()->getlocale();
        } else {
        // check if the client has defined locale statement
            if (!session()->has('locale')) {
                session()->put('locale', app()->getlocale());
            }
        }

        return $next($request);
    }
}
