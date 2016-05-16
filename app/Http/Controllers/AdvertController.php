<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use sempredanegocio\Models\AdvertImovel;
use sempredanegocio\Models\AdvertVeiculo;
use sempredanegocio\Models\User;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertImage;
use sempredanegocio\Models\Feature;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\Factory as Storage;


class AdvertController extends Controller
{

    private $advertModel;
    private $advertVeiculo;
    private $advertImovel;

    public function  __construct(Advert $advertModel,AdvertImovel $advertImovel, AdvertVeiculo $advertVeiculo){
        $this->advertModel = $advertModel;
        $this->advertImovel = $advertImovel;
        $this->advertVeiculo = $advertVeiculo;
    }

    public function index(){
        $user = Auth::user();
        if($user->tipo != 'admin'){

            $adverts = Advert::where('user_id',$user->id)->orderBy('id','desc')->paginate(30);
            return view('admin.anuncios.index',compact('adverts'));
        }else{
            $adverts = $this->advertModel->paginate(30);
            return view('admin.anuncios.index',compact('adverts'));
        }

    }

    /* salvar anúncio */
    public function store(Storage $storage,Requests\AdvertSaveRequest $request, AdvertImage $advertImage, User $user, AdvertImovel $advertImovel, AdvertVeiculo $advertVeiculo){

        $data = $request->all();

        //aqui eu atualizo as informações do usuário

        $data['user_id']    = Auth::user()->id;
        $user               = User::find($data['user_id']);
        $user->name         = $request->get('nome-usuario');
        $user->phone        = $request->get('telefone-usuario');
        $user->email        = $request->get('email');
        if(empty($user->typeuser_id)){
            $user->typeuser_id   = $request->get('typeuser_id');
        }

        $user->update();

        $data['url_anuncio'] = str_slug($data['anuncio_titulo']);

        $features = $request->get('caracteristicas');
        $images = $request->file('anuncio_images');
        $data['preco']  = str_replace(",",".",str_replace(".","",$data['preco']));

        unset($data['anuncio_images']);
        unset($data['caracteristicas']);
        $anuncio = Advert::create($data);

        foreach($images as $image){
            $renamed = "imoveis/site/".md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();

            $path = public_path().'/galeria/'.$renamed;

            Image::make($image->getRealPath())->resize(678,407)->save($path);
            $advertImage::create(['advert_id' => $anuncio->id,'extension' => $renamed]);
        }

        if(!empty($features)){
             $anuncio->features()->sync($features);
        }
        if($data['category_id'] == 1){


            $numero_quarto = $data['numero_quarto'];
            $numero_garagem = $data['numero_garagem'];
            $numero_banheiro = $data['numero_banheiro'];
            $area_construida = $data['area_construida'];
            $valor_condominio = str_replace(",",".",str_replace(".","",$data['valor_condominio']));
            $valor_iptu  = str_replace(",",".",str_replace(".","",$data['valor_iptu']));


            if(empty($data['acomodacoes'])){
                $acomodacoes = 0;

            }
            if(empty($numero_quarto)){
                $numero_quarto = 0;

            }

            $advertImovel::create(['numero_quarto'=>$numero_quarto,'numero_garagem' => $numero_garagem,'numero_banheiro' => $numero_banheiro,'area_construida' => $area_construida,'valor_condominio' => $valor_condominio, 'valor_iptu' => $valor_iptu,'acomodacoes' => $acomodacoes,'advert_id' => $anuncio->id,'category_id' => $data['category_id']]);


        }else if($data['category_id'] == 2){

            $tipo           = $data['tipo'];
            $km             = $data['km'];
            $cor            = $data['cor'];
            $portas         = $data['portas'];
            $cambio         = $data['cambio'];
            $combustivel    = $data['combustivel'];
            $placa          = $data['placa'];
            $cor            = $data['cor'];
            $marca          = $data['marca_id'];
            $modelo         = $data['modelo_id'];
            $opcionais      = 0;

            $advertVeiculo::create(['ano'=>$tipo,'km' => $km,'cor' => $cor,'portas' => $portas,'cambio' => $cambio, 'combustivel' => $combustivel,'placa' => $placa,'opcionais'=> $opcionais,'marca' => $marca,'modelo' => $modelo, 'advert_id' => $anuncio->id,'category_id' => $data['category_id']]);
        }
       /*if($anuncio){

            $dataSend = [
                'id'    => $anuncio->id,
                'name'  => $user->name,
                'email' => $user->email,
                'tipo_anuncio' => $anuncio->tipo_anuncio,
                'url_anuncio' => $anuncio->url_anuncio
            ];
            \Mail::send('emails.anuncioInserido', $dataSend, function($message) use ($dataSend)
            {
                $message->from('naoresponder@sempredanegocio.com.br', 'Sempre da Negócio');
                $message->subject('Seu anúncio encontra disponível');
                $message->to($dataSend['email']);

            });
        } */
        if(auth()->user()->plans_id != null ){

            return redirect('/')->with('status', 'Parabéns!! Seu anúncio foi publicado!');

        }else{
            return redirect('/pagamento')->with('status', 'Parabéns!! Seu anúncio foi publicado!');

        }

    }

    public function edit(){
        return view('admin.anuncios.edit');

    }


}
