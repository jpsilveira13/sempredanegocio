<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;

class AdvertController extends Controller
{

    private $advertModel;

    public function  __construct(Advert $advertModel){
        $this->advertModel = $advertModel;
    }

    public function store(Request $request){
        $data_advert = $request->all();
        dd($data_advert);



    }



    /*private $anuncioModel;

    public function __construct(Anuncio $anuncioModel){

        $this->anuncioModel = $anuncioModel;
    }

    public function store(Request $request){

        $data_anuncio = $request->all();
        $caracteristicas = $request->get('caracteristicas');
        unset($data_anuncio['caracteristicas']);
        $anuncio = Anuncio::create($data_anuncio);


        foreach($caracteristicas  as $caracteristica){
            $caractere = new AnuncioCaracteristica();
            $anuncio->caracteristicas()->save($caractere);


        } */

       /* $data_anuncio = $request->all();
        $caracteristicas = $request->get('caracteristicas');
        unset($data_anuncio['caracteristicas']);

        $anuncio = Anuncio::create($data_anuncio);

        foreach($caracteristicas as $caracteristica){
            $caracteristica = new AnuncioCaracteristica();

            $anuncio->caracteristicas()->save($caracteristica);
        }

        return view('site.pages.anuncie'); */

}
