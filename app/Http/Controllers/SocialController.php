<?php

namespace sempredanegocio\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $socUser = Socialite::driver('facebook')->user();
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


}
