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
use Illuminate\Support\Facades\Auth;


class LeilaoController extends Controller
{
    private $leilao;
    private $advert;
    private $veiculo;

    public function __construct(Advert $advert, AdvertVeiculo $veiculo, Leilao $leilao)
    {
        $this->advert = $advert;
        $this->veiculo = $veiculo;
        $this->leilao = $leilao;
    }

    public function index()
    {
        $agora = time();
        // dd($agora);
        $amanha = strtotime('+1 day', $agora);
        $amanha = strftime("%Y/%m/%d", $amanha);

        $veiculos = $this->veiculo->ativo()->with('advertVeiculo', 'leilao')->get();

        return view('site.leilao.index', compact('veiculos'));



    }

    public function interno($id)
    {

        $agora =time();

        $oferta = $this->veiculo->where('advert_id', $id)->with('advertVeiculo')->first();
        //Aqui soma + 1 dia
        $amanha = strtotime($oferta->created_at);
        $amanha = strtotime('+1 day', $amanha);
        $tempo = $amanha;
        $amanha = strftime("%Y/%m/%d %H:%M:%S", $amanha);

        //validar se o leilao está ativo
        if($tempo < $agora && $oferta->leilaoativo == 1){

            $oferta->leilaoativo = 0;
            $oferta->save();
        }
        $oferta->advertVeiculo->advert_count =  $oferta->advertVeiculo->advert_count+1;
        $oferta->advertVeiculo->save();
        $leilao = $this->leilao->where('veiculo_id', $oferta->id)->with('advertleilao', 'userleilao')->orderBy('valor', 'desc')->first();
        $top5 = $this->leilao->orderBy('valor', 'desc')->where('veiculo_id', $oferta->id)->take(5)->get();

        return view('site.leilao.interno', compact('oferta', 'leilao', 'top5','amanha'));
    }

    public function pegaLance(Request $request)
    {


        $idveiculo = $request->input('idveiculo');
        $valor = $request->input('valor');


        try {
            $veiculo = $this->veiculo->findOrFail($idveiculo);//aqui eu tenho os dados do veículo
        } catch (\Exception $e) {
            return Response::json(['fail' => true, 'message' => 'Veículo não encontrado!']);
        }

        if ($this->leilao) {
            $lance = $this->leilao->where('veiculo_id', $veiculo->id)->orderBy('valor', 'desc')->first();
        }
        $nomeUsuario = strstr(Auth::user()->name, ' ', true);
        $lancePorcento = ($valor*0.05)+ $valor;
        $variancia = $veiculo->variancia;
        if ($lance) {
            if ($valor > $lance->valor) {
                $numeroLance = $lance->numero_lance + 1;
                $veiculo->preco_leilao = $valor;
                $veiculo->save();


                $lanceSalvo = array(
                    'numero_lance' => $numeroLance,
                    'veiculo_id' => $lance->veiculo_id,
                    'valor' => $valor,
                    'user_id' => Auth::user()->id,
                    'variancia' => $variancia
                );
                $novoLance = Leilao::create($lanceSalvo);

                if ($novoLance) {
                    return Response::json([
                        'success' => true,
                        'lance' => $lanceSalvo,
                        'nome' => $nomeUsuario,
                        'lancePorcento' => $lancePorcento
                    ]);
                }
            } else {
                return Response::json([
                    'fail' => true,
                    'message' => 'lance maior'
                ]);
            }

        }else{
            $lanceSalvo = array(
                'numero_lance' => 1,
                'veiculo_id' => $idveiculo,
                'valor' => $valor,
                'user_id' => Auth::user()->id,
                'variancia' => $variancia
            );
            $novoLance = Leilao::create($lanceSalvo);
            if($novoLance){
                return Response::json([
                    'success' => true,
                    'lance' => $lanceSalvo,
                    'nome' => $nomeUsuario,
                    'lancePorcento' => $lancePorcento
                ]);
            }
        }


    }

    public function listarleilao(){
        $leiloes = $this->leilao->orderBy('visto','desc')->paginate(30);
        return view('admin.leilao.index',compact('leiloes'));
    }

    public function view($id){

        $leilao = $this->leilao->find($id);

        if($leilao->visto > 0){
            $leilao->visto = $leilao->visto - 1;
            $leilao->save();
        }


        return view('admin.leilao.view',compact('leilao'));

    }
}
