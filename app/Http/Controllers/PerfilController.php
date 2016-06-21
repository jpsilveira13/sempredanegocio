<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\AdvertMessage;
use sempredanegocio\Models\User;

class PerfilController extends Controller
{
    private $userModel;

    public function __construct(User $userModel){

        $this->userModel = $userModel;

    }

    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.perfil.index',compact($user));

    }

}
