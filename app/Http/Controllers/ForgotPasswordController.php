<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, App\User, Reminder, Mail, Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() {
        return view('authentication.forgot-password');
    }

    public function postForgotPassword(Request $request) {

        $user = User::whereEmail($request->email)->first();

        if (count($user) == 0) {
            // !! even such user there isn't in db
            return redirect()->back()->with([
                'success' => 'Reset code was sent to your email.',
                ]);
        }

        $sentinelUser = Sentinel::findById($user->id);

        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

        // send email with reset password
        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with([
            'success' => 'Reset code was sent to your email.',
            ]);
    }

    private function sendEmail($user, $code){
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code
            ], function($message) use ($user){
                $message->to($user->email);
                $message->subject("Dear $user->first_name, reset your password");
            });
    }

    public function resetPassword($email, $resetCode) {

        $user = User::byEmail($email);
        $sentinelUser = Sentinel::findById($user->id);

        if (count($user) == 0) {
            abort(404);
        }

        if ($reminder = Reminder::exists($sentinelUser)) {
            if ($resetCode == $reminder->code) {
                return view('authentication.reset-password');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

    public function postResetPassword(Request $request, $email, $resetCode) {

        //validation
        $this->validate($request, [
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
            ]);

        $user = User::byEmail($email);
        $sentinelUser = Sentinel::findById($user->id);

        if (count($user) == 0) {
            abort(404);
        }

        if ($reminder = Reminder::exists($sentinelUser)) {
            if ($resetCode == $reminder->code) {
                Reminder::complete($sentinelUser, $resetCode, $request->password);
                return redirect('/login')->with('success', 'Please login with your new password');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

}