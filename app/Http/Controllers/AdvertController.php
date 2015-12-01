<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\Feature;

class AdvertController extends Controller
{

    private $advertModel;

    public function  __construct(Advert $advertModel){
        $this->advertModel = $advertModel;
    }

    public function store(Request $request){

        $data = $request->all();
        dd($data);
        $data['user_id'] = Auth::user()->id;
        $data['adverts_categories_id'] = 100;
        $features = $request->get('caracteristicas');
        $images = $request->get('anuncio_images');
        dd($images);
        unset($data['caracteristicas']);
        $anuncio = Advert::create($data);
        $anuncio->features()->sync($features);
        //return \Redirect::to('/');
        return redirect('/')->with('status', 'Anúncio inserido com sucesso!');

    }




}
