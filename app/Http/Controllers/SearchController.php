<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertImovel;
use sempredanegocio\Models\AdvertVeiculo;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    private $advert;
    private $advertImovel;
    private $advertVeiculo;

    public function __construct(Advert $advert, AdvertVeiculo $advertVeiculo,AdvertImovel $advertImovel){
        $this->advert = $advert;
        $this->advertImovel = $advertImovel;
        $this->advertVeiculo = $advertVeiculo;

    }

    public function searchImo(){
        $max_price = str_replace(".","",str_replace(",","",Input::get('max_price')));
        $min_price = str_replace(".","",str_replace(",","",Input::get('min_price')));
        $min_area = Input::has('min_area') ? Input::get('min_area'): null;
        $max_area = Input::has('max_area') ? Input::get('max_area'): null;


       $query = Advert::select('adverts.*')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id')->where('user_id',Input::get('user_id'));


        if (Input::get('subcategoria')) {
            Session::put('subcategoria',Input::get('subcategoria'));
            $query->where('subcategories_id', Input::get('subcategoria'));
        }
        if (Input::get('cidade')) {

            $query->where('cidade', Input::get('cidade'));
        }
        if (Input::get('cidade') && Input::get('bairro')) {
            Session::put('bairro',Input::get('bairro'));
            $query->where('bairro', Input::get('bairro'));
        }

        if (Input::get('tipo_anuncio')) {
            Session::put('tipo_anuncio',Input::get('tipo_anuncio'));
            $query->where('tipo_anuncio',Input::get('tipo_anuncio'));

        }
        if ($min_price && $max_price) {
            Session::put('min_price',$min_price);
            Session::put('max_price',$max_price);
            $query->where('preco', '>=', $min_price)->where('preco', '<=', $max_price);

        }
        if ($min_area && $max_area) {
            Session::put('min_area',$min_area);
            Session::put('max_area',$max_area);
            $query->where('area_construida', '>=', $min_area)->where('area_construida', '<=', $max_area);

        }

        if (Input::get('num_quartos')) {
            Session::put('num_quartos',Input::get('num_quartos'));

            $query->where('numero_quarto', Input::get('num_quartos'));

        }
        if (Input::get('num_banheiros')) {
            Session::put('num_banheiros',Input::get('num_banheiros'));
            $query->where('numero_banheiro',Input::get('num_banheiros'));

        }

        if (Input::get('num_vagas')) {
            Session::put('num_vagas',Input::get('num_vagas'));
            $query->where('numero_garagem', Input::get('num_vagas'));

        }
        return Response::json($query->where('status', '>', '0')->orderByRaw("RAND()")->with('images','advertImovel','imagecapa')->paginate(18));

    }

    public function searchVeiculos(){
        $max_price = str_replace(".","",str_replace(",","",\Input::get('max_price')));
        $min_price = str_replace(".","",str_replace(",","",\Input::get('min_price')));

        $query = Advert::select('adverts.*')->join('advert_carro','adverts.id','=','advert_carro.advert_id')->where('user_id',Input::get('user_id'));

        if (Input::get('subcategories_id')) {
            Session::put('subcategories_id',Input::get('subcategories_id'));
            $query->where('subcategories_id',Input::get('subcategories_id'));
        }
        if (Input::get('cidade')) {

            $query->where('cidade',Input::get('cidade'));
        }

        if (Input::get('tipo_anuncio')) {
            Session::put('tipo_anuncio',Input::get('tipo_anuncio'));
            $query->where('tipo_anuncio',Input::get('tipo_anuncio'));
        }

        if ($min_price && $max_price) {
            Session::put('min_price',$min_price);
            Session::put('max_price',$max_price);
            $query->where('preco', '>=', $min_price)->where('preco', '<=', $max_price);
        }
        if(Input::get('ano_inicio')){
            Session::put('ano_inicio',Input::get('ano_inicio'));
            $query->where('ano','>=',Input::get('ano_inicio'));
        }

        if(Input::get('ano_final')){
            Session::put('ano_final',Input::get('ano_final'));
            $query->where('ano','<=',Input::get('ano_final'));
        }

        if (Input::get('marca_id')) {
            Session::put('marca_id',Input::get('marca_id'));
            $query->where('marca','LIKE','%'.Input::get('marca_id').'%');

        }
        if (Input::get('modelo_id')) {
            Session::put('modelo_id',Input::get('modelo_id'));
            $query->where('modelo','LIKE','%'. Input::get('modelo_id').'%');

        }

        return Response::json($query->where('status', '>', '0')->orderByRaw("RAND()")->with('images','advertVeiculo','imagecapa')->paginate(18));
    }
}
