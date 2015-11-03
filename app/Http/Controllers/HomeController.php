<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        return view('site.pages.home');

    }

    public  function imoveis(){
        //$products = Product::orderBy(DB::raw('RAND()'))->get();


        return view('site.pages.imoveis', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
            'description' => 'Os melhores alugueis no melhor site.',
            //'product' => $products

        ]);

    }

    public  function anuncie(){
        //$products = Product::orderBy(DB::raw('RAND()'))->get();


        return view('site.pages.anuncie', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
            'description' => 'Os melhores alugueis no melhor site.',
            //'product' => $products

        ]);
    }


}
