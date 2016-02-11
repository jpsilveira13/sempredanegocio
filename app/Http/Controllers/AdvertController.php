<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use sempredanegocio\Models\User;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertImage;
use sempredanegocio\Models\Feature;
use Intervention\Image\Facades\Image;


class AdvertController extends Controller
{

    private $advertModel;

    public function  __construct(Advert $advertModel){
        $this->advertModel = $advertModel;
    }

    public function index(){
        $user = Auth::user();
        if($user->tipo != 'admin'){

            $adverts = Advert::where('user_id',$user->id)->paginate(30);
            return view('admin.anuncios.index',compact('adverts'));
        }else{
            $adverts = $this->advertModel->paginate(30);
            return view('admin.anuncios.index',compact('adverts'));
        }

    }

    /* salvar anúncio */
    public function store(Request $request, AdvertImage $advertImage, User $user){



        $data = $request->all();
        $data['user_id']    = Auth::user()->id;
        $user               = User::find($data['user_id']);
        $user->name         = $request->get('nome-usuario');
        $user->phone        = $request->get('telefone-usuario');
        $user->email        = $request->get('email-usuario');
        $user->update();

        $data['url_anuncio'] = str_slug($data['anuncio_titulo']);

        $data['valor_condominio'] = str_replace(",",".",str_replace(".","", $data['valor_condominio']));
        $data['valor_iptu'] = str_replace(",",".",str_replace(".","",$data['valor_iptu']));
        $data['preco'] = str_replace(",",".",str_replace(".","",$data['preco']));
        $features = $request->get('caracteristicas');
        $images = $request->file('anuncio_images');
        unset($data['anuncio_images']);
        unset($data['caracteristicas']);
        $anuncio = Advert::create($data);

        foreach($images as $image){
            $renamed = md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $path = public_path().'/gallery/'.$renamed;
            Image::make($image->getRealPath())->resize(678,407)->save($path);
            $advertImage::create(['advert_id' => $anuncio->id,'extension' => $renamed]);
        }

        $anuncio->features()->sync($features);
        if($anuncio){

            $dataSend = [
                'id'    => $anuncio->id,
                'name'  => $user->name,
                'email' => $user->email,
                'tipo_anuncio' => $anuncio->tipo_anuncio,
                'url_anuncio' => $anuncio->url_anuncio



            ];

            \Mail::send('emails.anuncioInserido', $dataSend, function($message) use ($dataSend)
            {
                $message->from('naoresponder@sempredanegocio.com.br', 'Sempre da Negócio');
                $message->subject('Seu anúncio encontra disponível');
                $message->to($dataSend['email']);

            });

        }
        return redirect('/')->with('status', 'Anúncio inserido com sucesso!');

        /*if(Auth::user()) {
            return redirect('/')->with('status', 'Anúncio inserido com sucesso!');
        }else{
            auth()->login($user);
            return redirect('/')->with('status', 'Anúncio inserido com sucesso!');
        } */

    }

    public function edit(){
        return view('admin.anuncios.edit');

    }


}
