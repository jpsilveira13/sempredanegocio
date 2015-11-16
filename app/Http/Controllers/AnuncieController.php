<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;

class AnuncieController extends Controller{

    private $anuncieModel;

    public function __construct(Anuncie $anuncieModel){

        $this->anuncieModel = $anuncieModel;
    }

    public function store(Request $request){
        $caracteristicas = $request->get('caracteristicas');
        $post = $this->postModel->fill($request->all());

        $post->caracteristicas = implode(',',$caracteristicas);


        $post->save();
        return view('site.pages.anuncie', [


        ]);
    }

}
