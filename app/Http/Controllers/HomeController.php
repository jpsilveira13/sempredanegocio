<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use sempredanegocio\Models\Cidade;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertCategory;
use sempredanegocio\Models\Category;
use sempredanegocio\Models\Feature;
use sempredanegocio\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){


        $adverts = Advert::orderBy('id','desc')->paginate(16);
        $countAdvert = Advert::all();
        return view('site.pages.home',[
            'adverts' => $adverts,
            'countAdvert' => $countAdvert

        ]);

    }

    public  function imoveis(){
        $adverts = Advert::orderBy('id','desc')->paginate(16);
        $countAdvert = Advert::all();


        return view('site.pages.imoveis', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
            'description' => 'Os melhores alugueis no melhor site.',
            'adverts' => $adverts,
            'countAdvert' => $countAdvert

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

    public function imovelInterno($tipo_anuncio, $id, $url_anuncio){
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

    public function searchCidade($query){
        $result = null;
        $result = Cidade::select('nome','uf')->where('nome','LIKE',$query.'%')->orderBy('nome','desc')->take(6)->distinct()->get();
        return \Response::json($result);

    }


    public function testeImoveis(){
        $result = null;

        $result = Advert::where('cidade', '=', 'Uberaba')->where('numero_quarto','=','4')->take(16)->get();

        return view('testes.testes', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
            'description' => 'Os melhores alugueis no melhor site.',
            'result' => $result
        ]);


    }


}
