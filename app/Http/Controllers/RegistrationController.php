<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Sentinel, Activation, App\User, Mail;

class RegistrationController extends Controller
{
    public function register() {
        return view('authentication.register');
    }

    public function postRegister(Request $request) {

        // validation
        $this->validate($request, [
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
            ]);

        $user = Sentinel::register($request->all());
        // make record in activations table for current user with 'complete' column in order to check activation status account
        $activation = Activation::create($user);
        // get manager role
        $role = Sentinel::findRoleBySlug('client');

        // attach the role to a user
        $role->users()->attach($user);

        // send email with acount verification
        $this->sendEmail($user, $activation->code);

        return redirect('/');
    }

    private function sendEmail($user, $code){
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
            ], function($message) use ($user){
                $message->to($user->email);

                $message->subject("Hello, $user->first_name! Please activate your account at M-Arts.");
            });
    }

}
