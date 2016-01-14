<?php

namespace sempredanegocio\Http\Controllers\Auth;

use sempredanegocio\Models\User;
use Validator;
use sempredanegocio\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function getLogin() {
        return redirect('/');
    }

    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();

    }

    public function handleProviderCallback($provider)
    {
        $socUser = Socialite::driver($provider)->user();
        $user = User::where('idsocial',$socUser->getId())->first();
        if(!$user){
            $user = new User();
            $user->idsocial = $socUser->getId();
            $user->social = "Facebook";
            $user->avatar = $socUser->getAvatar();
            $user->name = $socUser->getName();
            $user->email = $socUser->getEmail();
            $user->password = bcrypt(str_random(10));
            $user->save();
        }
        auth()->login($user);
        return redirect('/');
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
            'password' => 'required|confirmed|min:6',
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

    public function getLogout()
    {
        // Log out
        \Auth::logout();
        \Session::flush(); // Destroy all sessions

        return redirect('/');
    }
}
