<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Json;
use sempredanegocio\Models\Cidade;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertCategory;
use sempredanegocio\Models\Category;
use sempredanegocio\Models\Complaint;
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

    public function sendEmailTest()
    {

        \Mail::send('emails.teste', ['msg' => 'hello'], function ($message) {
            $message->from('suporte@sempredanegocio.com.br', 'João Paulo');

            $message->to('samotinho@gmail.com', 'Pedro 2')->subject('My Test Email!');
        });

        var_dump('sent');
    }

    //pega a url dinamicamente e compara se existe ou nao.
    public function tipocategoria($name_url){

        $categoria_id = Category::select('id')->where('name_url', $name_url)->first();
        $subcategories = SubCategory::where('category_id',$categoria_id->id)->get();
        if($categoria_id != null){
            $adverts = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria_id->id)->where('status','=','1')->orderBy(DB::raw('RAND()'))->select('adverts.*')->paginate(18);
            $advertsCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria_id->id)->select('adverts.*')->count();

            return view('site.pages.anuncios', [
                'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
                'description' => 'Os melhores alugueis no melhor site.',
                'adverts' => $adverts,
                'advertsCount' => $advertsCount,
                'subcategories' => $subcategories

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
        $features = Feature::where('subcategory_id','=',$adv_id)->get();

        return Response::json(['advert' => $advertcategories,'features' => $features]);


    }

    public function getSubCaract(){
        $sub_id = Input::get('subcategories_id');

        $subcaract = Feature::where('subcategories_id','=',$sub_id);
        return Response::json($subcaract);
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
        $result = Cidade::select('nome','uf')->where('nome','LIKE',$query.'%')->orderBy('nome','desc')->take(8)->distinct()->get();
        return \Response::json($result);

    }


    /* public function testeImoveis(){
         $result = null;

         $result = Advert::where('cidade', '=', 'Uberaba')->where('numero_quarto','=','4')->take(16)->get();

         return view('testes.testes', [
             'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
             'description' => 'Os melhores alugueis no melhor site.',
             'result' => $result
         ]);


     } */

    public function denuncia(){
        $inputData = Input::get('formData');

        parse_str($inputData, $formFields);
        $userData = array(
            'user_id'            => $formFields['user_id'],
            'url_site'           =>  $formFields['url_site'],
            'motivo'             =>  $formFields['motivo'],
            'descricao'          =>  $formFields['descricao'],
            'nome'               =>  $formFields['nome'],
            'email'              =>  $formFields['email'],

        );
        $rules = array(
            'nome'      =>  'required',
            'email'     =>  'required',
            'motivo'    =>  'required',
        );
        $validator = Validator::make($userData,$rules);
        if($validator->fails())
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {

            if(Complaint::create($userData)) {
                //return success  message
                return Response::json(array(
                    'success' => true
                ));
            }
        }

    }

    //search imoveis

    public function scopeImoveis(){
        $query = Advert::query();

        $min_area = Input::has('min_area') ? Input::get('min_area'): null;
        $max_area = Input::has('max_area') ? Input::get('max_area'): null;
        $max_price = str_replace(".","",str_replace(",","",\Input::get('max_price')));
        $min_price =  str_replace(".","",str_replace(",","",\Input::get('min_price')));

        if(\Input::get('subcategoria')){

            $query->where('subcategories_id',\Input::get('subcategoria'));


        }
        if(\Input::get('cidade')){
            $query->where('cidade',\Input::get('cidade'));

        }

        if(\Input::get('tipo_anuncio')){
            $query->where('tipo_anuncio',\Input::get('tipo_anuncio'));

        }

        if($min_price && $max_price){
            $query->where('preco','>=',$min_price)->where('preco','<=',$max_price);

        }
        if($min_area && $max_area){
            $query->where('area_construida','>=',$min_area)->where('area_construida','<=',$max_area);

        }

        if(\Input::get('num_quartos')){
            $query->where('numero_quarto',\Input::get('num_quartos'));

        }
        if(\Input::get('num_banheiros')){
            $query->where('numero_suite',\Input::get('num_banheiros'));

        }
        if(\Input::get('num_vagas')){
            $query->where('numero_garagem',\Input::get('num_vagas'));

        }

        return Response::json($query->where('status','>','0')->with('images')->paginate(18));


    }

    //search anuncio
    public function searchAnuncio(){
        $categoria = Input::get('categoria');
        $subcategories = SubCategory::where('category_id',$categoria)->get();
        $transacao = Input::get('transacao');
        $cidade = Input::get('cidade');

        if($cidade != null ){

            $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('cidade','=',$cidade)->where('tipo_anuncio','=',$transacao)->where('status','=','1')->orderBy(DB::raw('RAND()'))->select('adverts.*')->paginate(18);

            $queryCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('cidade','=',$cidade)->where('tipo_anuncio','=',$transacao)->where('status','=','1')->count();

            return view('resultado/anuncio', compact('queryAnuncios','anunciesubcats','queryCount','subcategories'));
        }else{
            $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('tipo_anuncio','=',$transacao)->where('status','=','1')->orderBy(DB::raw('RAND()'))->select('adverts.*')->paginate(18);

            $queryCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->where('subcategories.category_id',$categoria)->where('tipo_anuncio','=',$transacao)->count();
            return view('resultado/anuncio', compact('queryAnuncios','anunciesubcats','queryCount','subcategories'));

        }

    }

    public function alterStatus($query){

        $status = $query;

        dd($status);

    }
}
