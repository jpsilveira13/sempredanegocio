<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public  function anunciar(){
        //$products = Product::orderBy(DB::raw('RAND()'))->get();


        return view('site.pages.anunciar', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
            'description' => 'Os melhores alugueis no melhor site.',
            //'product' => $products

        ]);

    }
}
