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



        $category = Category::get();

        return view('site.pages.home',[

            'categories' => $category,
        ]);

    }

    //pega a url dinamicamente e compara se existe ou nao.
    public function tipocategoria($name_url){

        $categoria_id = Category::select('id')->where('name_url', $name_url)->first();


        if($categoria_id != null){
            $adverts = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria_id->id)->select('adverts.*')->paginate(15);
            $advertsCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria_id->id)->select('adverts.*')->count();

            return view('site.pages.anuncios', [
                'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
                'description' => 'Os melhores alugueis no melhor site.',
                'adverts' => $adverts,
                'advertsCount' => $advertsCount

            ]);
        }else{
            return view('error.error404');

        }

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

    public function anuncioInterno($tipo_anuncio, $id, $url_anuncio){
        $advert = Advert::find($id);


        return view('site.pages.anuncio', [
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

    public function searchCep(){
        $cep = Input::get('cep');

        $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

        $dados['sucesso'] = (string) $reg->resultado;
        $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
        $dados['bairro']  = (string) $reg->bairro;
        $dados['cidade']  = (string) $reg->cidade;
        $dados['estado']  = (string) $reg->uf;

        return \Response::json($dados);

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

    public function searchAnuncio(){
        $anunciesubcats = SubCategory::get();
        $transacao = Input::get('transacao');
        $cidade = Input::get('cidade');


        $categoria = Input::get('categoria');

        if($cidade != null ){

        $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('cidade','=',$cidade)->where('tipo_anuncio','=',$transacao)->select('adverts.*')->paginate(16);

        $queryCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('cidade','=',$cidade)->where('tipo_anuncio','=',$transacao)->count();

        return view('resultado/anuncio', compact('queryAnuncios','anunciesubcats','queryCount'));
        }else{
            $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('tipo_anuncio','=',$transacao)->select('adverts.*')->paginate(16);

            $queryCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('tipo_anuncio','=',$transacao)->count();
            return view('resultado/anuncio', compact('queryAnuncios','anunciesubcats','queryCount'));

        }

    }
}
