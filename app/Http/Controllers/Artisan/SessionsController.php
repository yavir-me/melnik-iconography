<?php

namespace App\Http\Controllers\Artisan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('create');
        $this->middleware('authenticated')->only('destroy');
    }

    public function create()
    {
        return view('admin.login');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:30'
            ]);

        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Неправильно введены логин или пароль.'
                ]);
        }

        return redirect()->route('dashboard');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('artisan');
    }

}
