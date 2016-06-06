<?php

namespace sempredanegocio\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sempredanegocio\Http\Requests;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertMessage;
use sempredanegocio\Models\Complaint;
use sempredanegocio\Models\User;
use sempredanegocio\Models\Leads;
use sempredanegocio\Models\LeadsHistorico;


class AdminController extends Controller
{


    public function home(User $user)
    {
        $user = Auth::user();

        if($user->tipo == "admin"){
            $queryCountTotal = Advert::all()->count();
            $countTickert = Complaint::all()->count();

            return view('admin.principal.index',compact('queryCountTotal','countTickert'));
        }else{
            $id_user =  Auth::user()->id;
            $messageCount = AdvertMessage::where('id_user',$id_user)->count();
            $queryCountUser = Advert::where('user_id','=',$id_user )->count();
            return view('admin.principal.index',compact('queryCountUser','messageCount'));
        }
    }

    public function mostrarMensagem(User $user){
        $id_user =  Auth::user()->id;
        $messageQuery = AdvertMessage::where('id_user',$id_user)->take(6)->get();
        return view('admin.principal.index',compact('messageQuery'));
    }

    public function dadosPainelAdm()
    {/*
        [14:01, 13/5/2016] Maurício: 1-Quantidade de acessos veiculos
    [14:02, 13/5/2016] Maurício: 2-Quantidade acesso imoveis
    [14:03, 13/5/2016] Maurício: 3-contador ver telefone
    [14:03, 13/5/2016] Maurício: 4-Contador simulacao financiamento
    [14:03, 13/5/2016] Maurício: 5-Contador simulacao seguro
    [14:05, 13/5/2016] Maurício: 6-email de contato do formulario
    [14:06, 13/5/2016] Maurício: 7-anuncios total
    [14:06, 13/5/2016] Maurício: imagens total
    [14:11, 13/5/2016] Maurício: 8-colocar para enviar email em cada modificacao da solicitacao*/

        $qntVerAnunciosTodos = Advert::sum('advert_count');
        $qntVerAnunciosImoveis = Advert::select('adverts.advert_count')->join('subcategories','adverts.subcategories_id','=','subcategories.id')
                                 ->where('subcategories.category_id','=','1')->sum('advert_count');
        $qntVerAnunciosVeiculos = Advert::select('adverts.advert_count')->join('subcategories','adverts.subcategories_id','=','subcategories.id')
                                  ->where('subcategories.category_id','=','2')->sum('advert_count');
        $qntVerTelefone = Advert::sum('tel_count');
        $qntFinanciamento = Advert::sum('fin_count');
        $qntEmailContato = AdvertMessage::count();
    /*
       [10:02, 23/5/2016] Maurício: 7-colocar contador de anuncios gratis e anuncios pagos
        [10:03, 23/5/2016] Maurício: 8-ver para salvar as informações do painel todo final de mes
     */
        $qntAnunciosGratis = Advert::where('destaque', '=', '0')->count();
        $qntAnunciosPagos = Advert::where('destaque', '!=', '0')->count();

        return view('admin.principal.adm',compact('qntVerAnunciosTodos','qntVerAnunciosImoveis', 'qntVerAnunciosVeiculos',
                                                  'qntVerTelefone', 'qntFinanciamento', 'qntEmailContato', 'qntAnunciosGratis',
                                                  'qntAnunciosPagos'));


    }

    public function mostrarLeads(){

        $leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->orderBy('data_retorno','asc')->paginate(30);
        return view('admin.principal.leads',compact('leads'));
    }

    public function edit($id){
        
        $lead = Leads::where('id', $id)->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
}
