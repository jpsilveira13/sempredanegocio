<?php

namespace sempredanegocio\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sempredanegocio\Http\Requests;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertMessage;
use sempredanegocio\Models\Complaint;
use sempredanegocio\Models\User;


class AdminController extends Controller
{


    public function home(User $user)
    {
        $user = Auth::user();

        if($user->tipo == "admin"){
            $queryCountTotal = Advert::all()->count();
            $countTickert = Complaint::all()->count();

            return view('admin.principal.index',compact('queryCountTotal','countTickert'));
        }else{
            $id_user =  Auth::user()->id;
            $messageCount = AdvertMessage::where('id_user',$id_user)->count();
            $queryCountUser = Advert::where('user_id','=',$id_user )->count();
            return view('admin.principal.index',compact('queryCountUser','messageCount'));
        }
    }

    public function mostrarMensagem(User $user){
        $id_user =  Auth::user()->id;
        $messageQuery = AdvertMessage::where('id_user',$id_user)->take(6)->get();
        return view('admin.principal.index',compact('messageQuery'));
    }

    public function dadosPainelAdm()
    {
        $qntVerAnuncios = Advert::sum('advert_count');

        return view('admin.principal.adm',compact('qntVerAnuncios'));
    }
}
