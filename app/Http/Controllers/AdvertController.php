<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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

    public function store(Request $request, AdvertImage $advertImage, User $user){

        $data = $request->all();

        if(Auth::user()){
            $data['user_id'] = Auth::user()->id;

        }else{
            $user = new User();
            $user->name         = $request->get('nome-usuario');
            $user->phone        = $request->get('telefone-usuario');
            $user->email        = $request->get('email-usuario');
            $password           = $request->get('password');
            $user->password     = bcrypt($password);
            $user->social       = "Site";
            $user->save();
            $data['user_id']    = $user->id;

        }

        $data['advert_categories_id'] = 100;
        $data['url_anuncio'] = str_slug($data['anuncio_titulo']);
        $features = $request->get('caracteristicas');
        $images = $request->file('anuncio_images');

        unset($data['anuncio_images']);
        unset($data['caracteristicas']);
        $anuncio = Advert::create($data);
        foreach($images as $image){
            $renamed = md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $path = public_path().'/gallery/'.$renamed;
            Image::make($image->getRealPath())->resize(603,362)->save($path);
            $advertImage::create(['advert_id' => $anuncio->id,'extension' => $renamed]);

        }
        $anuncio->features()->sync($features);
        if(Auth::user()) {
            return redirect('/')->with('status', 'Anúncio inserido com sucesso!');
        }else{
            auth()->login($user);
            return redirect('/')->with('status', 'Anúncio inserido com sucesso!');
        }

    }




}
