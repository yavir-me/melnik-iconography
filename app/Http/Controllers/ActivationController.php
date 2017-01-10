<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Sentinel, App\User, Activation;

class ActivationController extends Controller
{
    public function activate($email, $activationCode) {
        $user = User::whereEmail($email)->first();

        // implements user interface in order to complete activation
        $sentinelUser = Sentinel::findById($user->id);

        if (Activation::complete($sentinelUser, $activationCode)) {
            return redirect('/login');
        } else {

        }
    }
}
