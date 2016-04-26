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
    public function store(\Illuminate\Contracts\Filesystem\Factory $fs, Requests\AdvertSaveRequest $request, AdvertImage $advertImage, User $user, AdvertImovel $advertImovel){

        $data = $request->all();
        //aqui eu atualizo as informações do usuário

        $data['user_id']    = Auth::user()->id;
        $user               = User::find($data['user_id']);
        $user->name         = $request->get('nome-usuario');
        $user->phone        = $request->get('telefone-usuario');
        $user->email        = $request->get('email');
        $user->update();

        $data['url_anuncio'] = str_slug($data['anuncio_titulo']);
        $features = $request->get('caracteristicas');
        $images = $request->file('anuncio_images');
        unset($data['anuncio_images']);
        unset($data['caracteristicas']);
        $anuncio = Advert::create($data);
        $diskCloud = $fs->disk('s3');

        foreach($images as $image){


            $renamed = md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $advertImage::create(['advert_id' => $anuncio->id,'extension' => $renamed]);
            $diskCloud->disk('s3')->put($renamed, file_get_contents($image));
            //$path = public_path().'/galeria/imoveis/site'.$renamed;

           // $url = Image::make($image->getRealPath())->resize(678,407);
            //Image::make($image->getRealPath())->resize(678,407)->save($path);
        }

        $anuncio->features()->sync($features);

        if($data['category_id'] == 1){


            $numero_quarto = $data['numero_quarto'];
            $numero_garagem = $data['numero_garagem'];
            $numero_banheiro = $data['numero_banheiro'];
            $area_construida = $data['area_construida'];
            $valor_condomio = str_replace(",",".",str_replace(".","",$data['valor_condominio']));
            $valor_iptu  = str_replace(",",".",str_replace(".","",$data['valor_iptu']));
            $valor_preco  = str_replace(",",".",str_replace(".","",$data['preco']));
            if(empty($data['acomodacoes'])){
                $acomodacoes = 0;

            }

            $advertImovel::create(['numero_quarto'=>$numero_quarto,'numero_garagem' => $numero_garagem,'numero_banheiro' => $numero_banheiro,'area_construida' => $area_construida,'valor_condominio' => $valor_condomio,'valor_preco' => $valor_preco,'valor_iptu' => $valor_iptu,'acomodacoes' => $acomodacoes,'advert_id' => $anuncio->id,'category_id' => $data['category_id']]);


        }


        if($anuncio){

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

        }
        return redirect('/')->with('status', 'Anúncio inserido com sucesso!');

        /*if(Auth::user()) {
            return redirect('/')->with('status', 'Anúncio inserido com sucesso!');
        }else{
            auth()->login($user);
            return redirect('/')->with('status', 'Anúncio inserido com sucesso!');
        } */

    }

    public function edit(){
        return view('admin.anuncios.edit');

    }


}
