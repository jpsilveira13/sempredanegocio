<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertCategory;
use sempredanegocio\Models\Category;
use sempredanegocio\Models\Feature;
use sempredanegocio\Models\SubCategory;
use sempredanegocio\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){


        $adverts = Advert::get();

        return view('site.pages.home',[
            'adverts' => $adverts,

        ]);

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
        $anuncieCaract = Feature::get();
        return view('site.pages.anuncie',[
            'anunciecats' => $anuncieCats,
            'anunciesubcats' => $anuncieSubCat,
            'anunciecaracts' => $anuncieCaract

        ]);

    }

    public function imovelInterno($id){
        $advert = Advert::find($id);


        return view('site.pages.imovel', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
            'description' => 'Os melhores alugueis no melhor site.',
            'advert' => $advert
        ]);
    }

    public  function getCategories(){
        $cat_id = Input::get('cat_id');

        $subcategories = SubCategory::where('category_id', '=',$cat_id)->get();
        return Response::json($subcategories);


    }

    public  function getAdvSub(){
        $adv_id = Input::get('adv_id');

        $advertcategories = AdvertCategory::where('subcategory_id', '=',$adv_id)->get();
       // dd($advertcategories);

        return Response::json($advertcategories);


    }


    public function testes(){

        return view('testes.testes', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
            'description' => 'Os melhores alugueis no melhor site.',
        ]);

    }


}
