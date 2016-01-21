<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\User;

class UserController extends Controller
{

    private $userModel;

    public  function __construct(User $userModel){
        $this->userModel = $userModel;
    }

    public function index(){

        $user = Auth::user()->tipo;
        if($user != 'admin'){

            return redirect()->route('home');
        }else{
            $users = $this->userModel->orderBy('id','desc')->paginate(30);
            return view('admin.user.index',compact('users'));
        }
    }






}
