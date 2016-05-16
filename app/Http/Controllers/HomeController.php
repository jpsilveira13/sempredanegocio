<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Json;
use sempredanegocio\Models\AdvertImage;
use sempredanegocio\Models\AdvertImovel;
use sempredanegocio\Models\AdvertMessage;
use sempredanegocio\Models\AdvertVeiculo;
use sempredanegocio\Models\Cidade;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertCategory;
use sempredanegocio\Models\Category;
use sempredanegocio\Models\Complaint;
use sempredanegocio\Models\Feature;
use sempredanegocio\Models\MessageFriend;
use sempredanegocio\Models\Plans;
use sempredanegocio\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use sempredanegocio\Models\TypeUser;
use sempredanegocio\Models\User;
use sempredanegocio\Models\VeiculoAno;
use sempredanegocio\Models\VeiculoMarca;
use sempredanegocio\Models\VeiculoModelo;

class HomeController extends Controller
{
    public function index(){

        $category = Category::get();
        $advertCountImoveis = AdvertImovel::count();
        $advertCountVeiculos= AdvertImovel::count();
        $advertCountTotal = Advert::count();
        $imageCount = AdvertImage::count();
        $userCount = User::count();

        return view('site.pages.home',[

            'categories' => $category,
            'advertCountImoveis' => $advertCountImoveis,
            'advertCountTotal' => $advertCountTotal,
            'advertCountVeiculos' => $advertCountVeiculos,
            'imageCount' => $imageCount,
            'userCount' => $userCount,
        ]);

    }

    public function sendEmailTest()
    {

        \Mai::send('emails.teste', ['msg' => 'hello'], function ($message) {
            $message->from('suporte@sempredanegocio.com.br', 'João Paulo');

            $message->to('samotinho@gmail.com', 'Pedro 2')->subject('My Test Email!');
        });

        var_dump('sent');
    }

    //pega a url dinamicamente e compara se existe ou nao.
    public function tipocategoria($name_url){

        $categoria_id = Category::select('id')->where('name_url', $name_url)->first();

        if(empty($categoria_id)){
            return view('error.error404');

        }else{
            $subcategories = SubCategory::where('category_id',$categoria_id->id)->get();
            if($categoria_id->id == 1){
                $adverts = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id')->where('subcategories.category_id',$categoria_id->id)->where('status','=','1')->select('adverts.*')->limit(18)->skip(18)->get();

                $advertsCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id')->where('subcategories.category_id',$categoria_id->id)->select('adverts.*')->count();

                return view('site.pages.anuncios', [
                    'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
                    'description' => 'Os melhores anúncios no melhor site.',
                    'adverts' => $adverts,
                    'advertsCount' => $advertsCount,
                    'subcategories' => $subcategories,
                    'category' => $categoria_id->id

                ]);

            }else if($categoria_id->id == 2){

                $marcas = VeiculoMarca::get();
                $modelos = VeiculoModelo::get();
                $advertVeiculos = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_carro','adverts.id','=','advert_carro.advert_id')->where('subcategories.category_id',$categoria_id->id)->where('status','=','1')->select('adverts.*')->orderBy(DB::raw('RAND()'))->limit(18)->get();
                $advertsCount = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_carro','adverts.id','=','advert_carro.advert_id')->where('subcategories.category_id',$categoria_id->id)->select('adverts.*')->count();
                return view('site.pages._veiculo', [
                    'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
                    'description' => 'Os melhores anúncios no melhor site.',
                    'advertVeiculos' => $advertVeiculos,
                    'advertsCount' => $advertsCount,
                    'subcategories' => $subcategories,
                    'category' => $categoria_id,
                    'marcas' => $marcas,
                    'modelos' => $modelos,
                ]);
            }
        }
    }

    public  function anuncie(){
        //$products = Product::orderBy(DB::raw('RAND()'))->get();


        return view('site.pages.anuncie', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie',
            'description' => 'Os melhores anúncios no melhor site.',
            //'product' => $products

        ]);
    }

    public function anuncieCategoria(){
        $anuncieCats = Category::get();
        $anuncieSubCat = SubCategory::get();
        $anuncieCaract = Feature::get();
        $typeusers = TypeUser::get();
        return view('site.pages.anuncie',[
            'anunciecats' => $anuncieCats,
            'anunciesubcats' => $anuncieSubCat,
            'anunciecaracts' => $anuncieCaract,
            'typeusers' => $typeusers

        ]);

    }

    //hotsite
    public function hotsite($id,$url_name){
        $user = User::find($id);
        $subcategories = SubCategory::get();


        $advertAluga = Advert::where('user_id',$user->id)->where('tipo_anuncio','=','aluga')->count();
        $advertVenda = Advert::where('user_id',$user->id)->where('tipo_anuncio','=','venda')->count();

        if(empty($user)) {
            return view('error.error404');
        }else{
            return view('site.pages.hotsite', [
                'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
                'description' => 'Os melhores anúncios no melhor site.',
                'user' => $user,
                'advertAluga' => $advertAluga,
                'advertVenda' => $advertVenda,
                'subcategories' => $subcategories

            ]);

        }

    }
    public function anuncioInterno($tipo_anuncio, $id, $url_anuncio){
        $advertGeral = Advert::where('id',$id)->with('advertImovel','advertVeiculo')->first();

        $advertCount = Advert::find($id);
        $advertCount->advert_count = $advertCount->advert_count+1;
        $advertCount->save();

        if(empty($advertGeral)){
            return view('error.error404');

        }else{
            return view('site.pages.anuncio', [
                'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
                'description' => 'Os melhores anúncios no melhor site.',
                'advertGeral' => $advertGeral
            ]);

        }

    }

    public  function getCategories(){
        $cat_id = Input::get('cat_id');

        $subcategories = SubCategory::where('category_id', '=',$cat_id)->get();
        return Response::json($subcategories);


    }



    public  function getAdvSub(){
        $adv_id = Input::get('adv_id');


        $features = Feature::where('subcategory_id','=',$adv_id)->get();

        return Response::json($features);

    }

    public function getSubCaract(){
        $sub_id = Input::get('subcategories_id');

        $subcaract = Feature::where('subcategories_id','=',$sub_id);
        return Response::json($subcaract);
    }

    public function getMarcaTotal(){
        // $tipoVeiculo = Input::get('subcategories_id');
        $marca_total = VeiculoMarca::orderBy('marca','asc')->get();
        return Response::json($marca_total);

    }

    public function getMarca(){
        $marca_id = Input::get('marca_id');

        $modelo = VeiculoModelo::where('codigo_marca','=',$marca_id)->orderBy('modelo','asc')->get();

        return Response::json($modelo);

    }
    public function getModelo(){
        $modelo_id = Input::get('modelo_id');
        $query = VeiculoAno::where('codigo_modelo','=',$modelo_id)->orderBy('ano','asc')->get();
        return Response::json($query);
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
        $result = Cidade::select('nome','uf')->where('nome','LIKE',$query.'%')->orderBy('id','desc')->take(8)->distinct()->get();
        return \Response::json($result);

    }
    public function searchBairro($query){

        $result = null;
        $cidade = Input::get('cidade');
        $result = Advert::where('bairro','LIKE',$query.'%')->orderBy('id','desc')->take(8)->distinct()->get();

        return \Response::json($result);

    }
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
    public function formAmigo(){
        $inputData = Input::get('formData');

        parse_str($inputData, $formFields);
        $userData = array(
            'user_id'                   =>  $formFields['user_id'],
            'url_site'                  =>  $formFields['url_site'],
            'nome_amigo'                =>  $formFields['nome_amigo'],
            'email_amigo'               =>  $formFields['email_amigo'],
            'nome_anuncio'              =>  $formFields['nome_anuncio'],
            'email_anuncio'             =>  $formFields['email_anuncio'],
            'assunto_anuncio'           =>  $formFields['assunto_anuncio'],


        );

        $rules = array(
            'nome_amigo'      =>  'required',
            'email_amigo'     =>  'required',
            'email_anuncio'    =>  'required',
        );
        if(MessageFriend::create($userData)) {
            //return success  message
            return Response::json(array(
                'success' => true
            ));


        }
        $validator = Validator::make($userData,$rules);
        if($validator->fails()){
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else {
            \Mail::send('emails.contactAmigo',$userData,function($message) use ($userData){
                $message->from('naoresponder@sempredanegocio.com.br', 'Sempre da Negócio');

                $message->to($userData['email_amigo']);
                $message->subject($userData['nome_anuncio']. ', quer compartilhar esse anúncio com você ');
                $message->replyTo($userData['email_anuncio'], $userData['nome_anuncio']);

            });



        }

    }
    public function formContato(){
        $inputData = Input::get('formData');


        parse_str($inputData, $formFields);
        $userData = array(
            'id_user'                           =>  $formFields['id_user'],
            'url_site'                          =>  $formFields['url_site'],
            'nome_usuario'                      =>  $formFields['nome_usuario'],
            'email_usuario'                     =>  $formFields['email_usuario'],
            'telefone_usuario'                  =>  $formFields['telefone_usuario'],
            'nome'                              =>  $formFields['nome'],
            'email'                             =>  $formFields['email'],
            'codigo_area'                       =>  $formFields['codigo_area'],
            'telefone'                          =>  $formFields['telefone'],
            'mensagem'                          =>  $formFields['mensagem'],

        );
        $rules = array(
            'email_usuario'              =>  'required',
            'telefone_usuario'           =>  'required',
            'mensagem'                   =>  'required',
        );

        $validator = Validator::make($userData,$rules);
       /* if($validator->fails()){
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else {
            \Mail::send('emails.contactAnunciante',$userData,function($message) use ($userData){
                $message->from('naoresponder@sempredanegocio.com.br', 'Sempre da Negócio');

                $message->to($userData['email_usuario']);
                $message->subject($userData['nome']. ', enviou uma mensagem para você ');
                $message->replyTo($userData['email_usuario'], $userData['nome']);

            });

        }*/
        if(AdvertMessage::create($userData)) {

            //return success  message
            return Response::json(array(
                'success' => true
            ));
        }
    }

    //search imoveis

    public function scopeImoveis(){

        $id_user = \Input::has('id_user') ? Input::get('id_user'): null;

        $max_price = str_replace(".","",str_replace(",","",\Input::get('max_price')));
        $min_price = str_replace(".","",str_replace(",","",\Input::get('min_price')));
        $min_area = \Input::has('min_area') ? Input::get('min_area'): null;
        $max_area = \Input::has('max_area') ? Input::get('max_area'): null;

        $query = Advert::select('adverts.*')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id');


        if($id_user){
            $query->where('user_id',$id_user);

        }

        if (\Input::get('subcategoria')) {
            $query->where('subcategories_id', \Input::get('subcategoria'));
        }
        if (\Input::get('cidade')) {

            $query->where('cidade', \Input::get('cidade'));
        }
        if (\Input::get('cidade') && \Input::get('bairro')) {
            $query->where('bairro', \Input::get('bairro'));
        }

        if (\Input::get('tipo_anuncio')) {
            $query->where('tipo_anuncio', \Input::get('tipo_anuncio'));

        }

        if ($min_price && $max_price) {
            $query->where('preco', '>=', $min_price)->where('preco', '<=', $max_price);

        }
        if ($min_area && $max_area) {
            $query->where('area_construida', '>=', $min_area)->where('area_construida', '<=', $max_area);

        }

        if (\Input::get('num_quartos')) {

            $query->where('numero_quarto', \Input::get('num_quartos'));

        }
        if (\Input::get('num_banheiros')) {
            $query->where('numero_banheiro', \Input::get('num_banheiros'));

        }
        if (\Input::get('num_vagas')) {
            $query->where('numero_garagem', \Input::get('num_vagas'));

        }
        return Response::json($query->where('status', '>', '0')->with('images','advertImovel')->skip(18)->paginate(18));

    }

    //search veiculos
    public function scopeVeiculos(){
        $id_user = \Input::has('id_user') ? Input::get('id_user'): null;

        $max_price = str_replace(".","",str_replace(",","",\Input::get('max_price')));
        $min_price = str_replace(".","",str_replace(",","",\Input::get('min_price')));

        $query = Advert::select('adverts.*')->join('advert_carro','adverts.id','=','advert_carro.advert_id');


        if($id_user){
            $query->where('user_id',$id_user);

        }

        if (\Input::get('subcategoria')) {
            $query->where('subcategories_id', \Input::get('subcategoria'));
        }
        if (\Input::get('cidade')) {

            $query->where('cidade', \Input::get('cidade'));
        }
        if (\Input::get('cidade') && \Input::get('bairro')) {
            $query->where('bairro', \Input::get('bairro'));
        }

        if (\Input::get('tipo_anuncio')) {
            $query->where('tipo_anuncio', \Input::get('tipo_anuncio'));

        }

        if ($min_price && $max_price) {
            $query->where('preco', '>=', $min_price)->where('preco', '<=', $max_price);

        }

        if (\Input::get('marca_id')) {

            $query->where('marca', \Input::get('marca_id'));

        }
        if (\Input::get('modelo_id')) {
            $query->where('modelo', \Input::get('modelo_id'));

        }

        return Response::json($query->where('status', '>', '0')->with('images','advertVeiculo')->paginate(18));


    }

    //search anuncio
    public function searchAnuncio()
    {

        $categoria = Input::get('categoria');
        $subcategories = SubCategory::where('category_id', $categoria)->get();
        $transacao = Input::get('transacao');
        $cidade = Input::get('cidade');

        if($categoria == 1){
            if($cidade != null){
                $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id')->where('subcategories.category_id',$categoria)->where('cidade','=',$cidade)->where('tipo_anuncio','=',$transacao)->where('status','=','1')->select('adverts.*');
                $queryCount = $queryAnuncios->count();
                $queryAnuncios = $queryAnuncios->take(18)->get();
                return view('resultado/anuncio',compact('queryAnuncios','subcategories','queryCount'));
            }else{
                $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id')->where('subcategories.category_id',$categoria)->where('tipo_anuncio','=',$transacao)->where('status','=','1')->select('adverts.*');
                $queryCount = $queryAnuncios->count();
                $queryAnuncios = $queryAnuncios->take(18)->get();
                return view('resultado/anuncio',compact('queryAnuncios','subcategories','queryCount'));

            }
        }else if($categoria == 2){
            $pegaMarcas = VeiculoMarca::orderBy('marca','asc')->get();
            if($cidade != null) {

                $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_carro', 'adverts.id', '=', 'advert_carro.advert_id')->where('subcategories.category_id', $categoria)->where('cidade', '=', $cidade)->where('tipo_anuncio', '=', $transacao)->where('status', '=', '1')->select('adverts.*');
                $queryCount = $queryAnuncios->count();
                $queryAnuncios = $queryAnuncios->limit(18)->get();
                return view('resultado/resultVeiculo', compact('queryAnuncios', 'subcategories', 'queryCount','pegaMarcas'));
            }else{

                $queryAnuncios = Advert::join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')->join('advert_carro', 'adverts.id', '=', 'advert_carro.advert_id')->where('subcategories.category_id', $categoria)->where('tipo_anuncio', '=', $transacao)->where('status', '=', '1')->select('adverts.*');
                $queryCount = $queryAnuncios->count();
                $queryAnuncios = $queryAnuncios->limit(18)->get();
                return view('resultado/resultVeiculo', compact('queryAnuncios', 'subcategories', 'queryCount','pegaMarcas'));
            }
        }
    }


    public function alterStatus($query){

        $status = $query;

        dd($status);

    }

    //tela pagamento

    public function pagamento(){
        $bronze = Plans::where('id','=', 1)->first();
        $prata = Plans::where('id',2)->first();
        $ouro = Plans::where('id',3)->first();
        $diamante = Plans::where('id',4)->first();
        //Planos para corretores e imobiliarias
        $economic = Plans::where('id','=',5)->first();
        $standard = Plans::where('id',6)->first();
        $turbo = Plans::where('id',7)->first();
        $turboAnual = Plans::where('id',8)->first();

        return view('site.pages.pagamento', [
            'title' => 'Sempredanegocio.com.br | Não perca tempo! Anuncie.',
            'description' => 'Os melhores anúncios no melhor site.',
            'bronze' => $bronze,
            'prata' => $prata,
            'ouro' => $ouro,
            'diamante' => $diamante,
            'economic' => $economic,
            'standard' => $standard,
            'turbo' => $turbo,
            'turboAnual' => $turboAnual,

        ]);

    }

    public function contadorTelefone(){
        $id =  Input::get('id');
        $telCount = Advert::find($id);
        $telCount->tel_count = $telCount->tel_count+1;
        $telCount->save();


    }


    public function tipoPlano($id){
        $idPlano = Plans::find(\Input::get('id'));
        dd($idPlano);

    }

    public function formPagamento(){
        $id_plan = Input::get('id');
        $usuario =  Auth::user();
        $usuario->plans_id = $id_plan;
        $usuario->save();

    }
}
