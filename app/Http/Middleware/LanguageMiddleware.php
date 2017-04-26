<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class LanguageMiddleware
{

    protected $langs = ['en', 'ru', 'ua'];

    public function handle($request, Closure $next)
    {

        if(!Session::has('locale'))
        {
            Session::put('locale', $request->getPreferredLanguage($this->langs));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }
}
