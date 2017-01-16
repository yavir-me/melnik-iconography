<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use Illuminate\Http\Request;
use Auth;
use App\SocialProvider;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
      try {

        $social_user = Socialite::with('facebook')->user();

    } catch (Exception $e) {
        return redirect('/');
    }

        // if we have logged provider
    $social_provider = SocialProvider::where('provider_id', $social_user->getId())->first();

    if (!$social_provider) {
        // retrieve user's full name
        $full_name = explode(' ', $social_user->getName());
        $user_name = $full_name[0];
        $user_surname = $full_name[1];

        $credentials = [
        'email' => $social_user->getEmail(),
        'first_name' => $user_name,
        'last_name' => $user_surname
        ];

        // create a new user and provider
        $user = Sentinel::authenticate($credentials);
        if (!$user) {
            $user = Sentinel::register($credentials);
            $activation = Activation::create($user);
            Sentinel::authenticate($credentials);
        }
        // create social provider
        $user->socialProviders()->create(
            ['provider_id' => $social_user->getId(), 'provider' => 'facebook']
            );
    } else {
        $user = $social_provider->user;
    }

    return redirect('/');

}
}
