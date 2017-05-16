<?php

namespace App\Http\Controllers\Artisan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
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

        // sign in him 
        if (! \Auth::attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Неправильно введены логин или пароль.'
                ]);
        }

        // redirect to a dashboard page
        redirect()->dashboard();
    }

}
