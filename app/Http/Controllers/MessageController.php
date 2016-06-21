<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\AdvertMessage;

class MessageController extends Controller
{
    private $messageModel;

    public function __construct(AdvertMessage $messageModel){

        $this->messageModel = $messageModel;

    }

    public function index()
    {
        $user = Auth::user();
        $messages = AdvertMessage::where('id_user',$user->id)->orderBy('visto','asc')->paginate(30);
        return view('admin.mensagens.index',compact('messages'));

    }

    public function view($id){
        $mensagem = $this->messageModel->find($id);
        $mensagem->visto = $mensagem->visto+1;
        $mensagem->save();
        return view('admin.mensagens.view',compact('mensagem'));
    }

    public function destroy($id){
        $this->messageModel->find($id)->delete();
        return redirect()->route('mensagens');
    }


}
