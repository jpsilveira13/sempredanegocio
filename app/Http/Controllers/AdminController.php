<?php

namespace sempredanegocio\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sempredanegocio\Http\Requests;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\User;


class AdminController extends Controller
{

    public function home(User $user)
    {
        $user = Auth::user();

        if($user->tipo == "admin"){
            $queryCountTotal = Advert::all()->count();

            return view('admin.principal.index',compact('queryCountTotal'));
        }else{
            $id_user =  Auth::user()->id;

            $queryCountUser = Advert::where('user_id','=',$id_user )->count();
            return view('admin.principal.index',compact('queryCountUser'));

        }
    }


}
