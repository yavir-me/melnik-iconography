<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Sentinel;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class LoginController extends Controller
{
	public function login() {
		return view('authentication.login');
	}

	public function postLogin(Request $request) {

		try {
		// authenticate user
			if (Sentinel::authenticate($request->all())) {
		// define slug of the role
				$slug = Sentinel::getUser()->roles()->first()->slug;
				if ($slug == 'admin') {
					return redirect('/earnings');
				} else if ($slug == 'manager') {
					return redirect()->back();
				}
			} else {
				return redirect()->back()->with(['wrong_credentials' => 'Mail or password is wrong. Check your credentials.']);
			}
		} catch (ThrottlingException $e) {
			$delay = $e->getDelay();
			return redirect()->back()->with(['wrong_credentials' => 'You are banned for '. $delay .' seconds.']);
		} catch (NotActivatedException $e) {
			return redirect()->back()->with(['wrong_credentials' => 'Your account is not activated']);
		}

	}

	public function logout(Request $request) {
		Sentinel::logout();
		return redirect('/login');
	}
}