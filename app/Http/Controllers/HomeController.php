<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Category;
use sempredanegocio\Models\SubCategory;
use sempredanegocio\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        return view('site.pages.home');

    }

    public  function imoveis(){
        $imoveis = Post::orderBy(DB::raw('RAND()'))->get();


        return view('site.pages.imoveis', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
            'description' => 'Os melhores alugueis no melhor site.',
            'imoveis' => $imoveis

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

    public function anuncieCategoria(){
        $anuncieCats = Category::get();
        $anuncieSubCat = SubCategory::get();

        return view('site.pages.anuncie',[
            'anunciecats' => $anuncieCats,
            'anunciesubcats' => $anuncieSubCat

        ]);

    }

    public function imovelInterno(){

        return view('site.pages.imovel', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
            'description' => 'Os melhores alugueis no melhor site.',
        ]);
    }


}
