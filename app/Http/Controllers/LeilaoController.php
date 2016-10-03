<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertVeiculo;
use sempredanegocio\Models\Leilao;
use Illuminate\Support\Facades\Input;

class LeilaoController extends Controller
{
    private $leilao;
    private $advert;
    private $veiculo;
    public function __construct(Advert $advert, AdvertVeiculo $veiculo,Leilao $leilao){
        $this->advert = $advert;
        $this->veiculo = $veiculo;
        $this->leilao = $leilao;
    }

    public function index(){
        $veiculos = $this->veiculo->ativo()->with('advertVeiculo','leilao')->get();

        return view('site.leilao.index',compact('veiculos'));


        /*
        Irei precisar disso no futuro
        $agora = time();
        $amanha = strtotime('+1 day', $agora);
        dd(strftime("%Y/%m/%d", $amanha));

      */


    }

    public function interno($id){
        $oferta = $this->veiculo->where('advert_id',$id)->with('advertVeiculo')->first();
        $leilao = $this->leilao->where('veiculo_id',$oferta->id)->with('advertleilao','userleilao')->orderBy('valor','desc')->first();
        $top5 = $this->leilao->orderBy('valor','desc')->where('veiculo_id',$oferta->id)->take(5)->get();

        return view('site.leilao.interno',compact('oferta','leilao','top5'));
    }

    public function pegaLance($id){
        $veiculo = $this->veiculo->find($id);//aqui eu tenho os dados do veículo
        $valor = 950000;
        $idUsuario = Input::get('idusuario');
        $lance = $this->leilao->where('veiculo_id',$veiculo->id)->orderBy('valor','desc')->first();


        $numeroLance = $lance->numero_lance;
        $numeroSomado = $numeroLance+1;


        if($lance && $valor > $lance->valor){
            $veiculo->preco_leilao = $valor;
            $veiculo->save();
            $lanceSalvo = array(
              'numero_lance' => $numeroSomado,
                'veiculo_id' => $lance->veiculo_id,
                'valor' => $valor,
                'user_id' => 133

            );
            if(Leilao::create($lanceSalvo)){
                return Response::json(array(
                   'sucess' => true,
                    'lance' => $lanceSalvo,
                ));
            }


        }else{
            return Response::json(array(
                'fail' => true,

            ));
        }


    }



}
