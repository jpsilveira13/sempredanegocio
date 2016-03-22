<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Cidade;
use sempredanegocio\Models\State;
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
            $users = $this->userModel->orderBy('tipo','asc')->paginate(30);
            return view('admin.user.index',compact('users'));
        }
    }

    public function edit($id,State $state){
        $states = $state->lists('uf','id');
        $user = $this->userModel->find($id);

        return view('admin.user.edit',compact('user','states'));

    }
    public function update(Request $request,$id){
        $teste = $this->userModel->find($id)->update($request->all());
        dd($teste);
        return redirect()->route('admin.user.index')->with('status', 'Anúncio inserido com sucesso!');

    }
}
