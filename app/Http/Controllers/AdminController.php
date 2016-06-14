<?php

namespace sempredanegocio\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sempredanegocio\Http\Requests;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertMessage;
use sempredanegocio\Models\Complaint;
use sempredanegocio\Models\DadosAdmin;
use sempredanegocio\Models\User;
use sempredanegocio\Models\Leads;
use sempredanegocio\Models\LeadsHistorico;
use DateTime;


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
    //Carregar dados do painel adm
    public function dadosPainelAdm()
    {
        /*
                $qntVerAnunciosTodos = Advert::sum('advert_count');
                $qntVerAnunciosImoveis = Advert::select('adverts.advert_count')->join('subcategories','adverts.subcategories_id','=','subcategories.id')
                                         ->where('subcategories.category_id','=','1')->sum('advert_count');
                $qntVerAnunciosVeiculos = Advert::select('adverts.advert_count')->join('subcategories','adverts.subcategories_id','=','subcategories.id')
                                          ->where('subcategories.category_id','=','2')->sum('advert_count');
                $qntVerTelefone = Advert::sum('tel_count');
                $qntFinanciamento = Advert::sum('fin_count');
                $qntEmailContato = AdvertMessage::count();
                $qntAnunciosGratis = Advert::where('destaque', '=', '0')->count();
                $qntAnunciosPagos = Advert::where('destaque', '!=', '0')->count();
        
                return view('admin.principal.adm',compact('qntVerAnunciosTodos','qntVerAnunciosImoveis', 'qntVerAnunciosVeiculos',
                                                          'qntVerTelefone', 'qntFinanciamento', 'qntEmailContato', 'qntAnunciosGratis',
                                                          'qntAnunciosPagos')); */

        $timezone = new DateTime('now');

        $dia = $timezone->format("d");
        $mes = $timezone->format("m");
        $ano = $timezone->format("Y");

        $dados = DadosAdmin::where('ano', '=', $ano)->where('mes', '=', $mes)->where('dia', '=', $dia)->first();

        if(!empty($dados))
        {
            $qntVerAnunciosTodos = $dados->totalCliques;
            $qntVerAnunciosImoveis =  $dados->cliquesImoveis;
            $qntVerAnunciosVeiculos =  $dados->cliquesVeiculos;
            $qntVerTelefone =  $dados->cliquesVerTelefone;
            $qntFinanciamento =  $dados->cliquesFinanciamento;
            $qntEmailContato =  $dados->emailsContato;
            $qntAnunciosGratis =  $dados->anunciosGratis;
            $qntAnunciosPagos =  $dados->anunciosPagos;

            return view('admin.principal.adm',compact('qntVerAnunciosTodos','qntVerAnunciosImoveis', 'qntVerAnunciosVeiculos',
                'qntVerTelefone', 'qntFinanciamento', 'qntEmailContato', 'qntAnunciosGratis',
                'qntAnunciosPagos'));
        }
        else {

            $qntVerAnunciosTodos = Advert::sum('advert_count');
            $qntVerAnunciosImoveis = Advert::select('adverts.advert_count')->join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')
                ->where('subcategories.category_id', '=', '1')->sum('advert_count');
            $qntVerAnunciosVeiculos = Advert::select('adverts.advert_count')->join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')
                ->where('subcategories.category_id', '=', '2')->sum('advert_count');
            $qntVerTelefone = Advert::sum('tel_count');
            $qntFinanciamento = Advert::sum('fin_count');
            $qntEmailContato = AdvertMessage::count();
            $qntAnunciosGratis = Advert::where('destaque', '=', '0')->count();
            $qntAnunciosPagos = Advert::where('destaque', '!=', '0')->count();

            DadosAdmin::create(['dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'totalCliques' => $qntVerAnunciosTodos,
                'cliquesImoveis' => $qntVerAnunciosImoveis, 'cliquesVeiculos' => $qntVerAnunciosVeiculos,
                'cliquesVerTelefone' => $qntVerTelefone, 'cliquesFinanciamento' => $qntFinanciamento,
                'emailsContato' => $qntEmailContato, 'anunciosGratis' => $qntAnunciosGratis, 'anunciosPagos' => $qntAnunciosPagos]);

            return view('admin.principal.adm',compact('qntVerAnunciosTodos','qntVerAnunciosImoveis', 'qntVerAnunciosVeiculos',
                'qntVerTelefone', 'qntFinanciamento', 'qntEmailContato', 'qntAnunciosGratis',
                'qntAnunciosPagos'));
        }

    }
    //Atualizar e salvar dados do painel adm no banco de dados
    /* public function atualizaDadosPainelAdm()
    {
        $timezone = new DateTime('now');

        $mes = $timezone->format("m");
        $ano = $timezone->format("Y");

        $dados = DadosAdmin::where('ano', '=', $ano)->where('mes', '=', $mes)->first();

        if(!empty($dados))
        {
            $qntVerAnunciosTodos = $dados->totalCliques;
            $qntVerAnunciosImoveis =  $dados->cliquesImoveis;
            $qntVerAnunciosVeiculos =  $dados->cliquesVeiculos;
            $qntVerTelefone =  $dados->cliquesVerTelefone;
            $qntFinanciamento =  $dados->cliquesFinanciamento;
            $qntEmailContato =  $dados->emailsContato;
            $qntAnunciosGratis =  $dados->anunciosGratis;
            $qntAnunciosPagos =  $dados->anunciosPagos;

            return view('admin.principal.adm',compact('qntVerAnunciosTodos','qntVerAnunciosImoveis', 'qntVerAnunciosVeiculos',
                        'qntVerTelefone', 'qntFinanciamento', 'qntEmailContato', 'qntAnunciosGratis',
                        'qntAnunciosPagos'));
        }
        else {

            $qntVerAnunciosTodos = Advert::sum('advert_count');
            $qntVerAnunciosImoveis = Advert::select('adverts.advert_count')->join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')
                ->where('subcategories.category_id', '=', '1')->sum('advert_count');
            $qntVerAnunciosVeiculos = Advert::select('adverts.advert_count')->join('subcategories', 'adverts.subcategories_id', '=', 'subcategories.id')
                ->where('subcategories.category_id', '=', '2')->sum('advert_count');
            $qntVerTelefone = Advert::sum('tel_count');
            $qntFinanciamento = Advert::sum('fin_count');
            $qntEmailContato = AdvertMessage::count();
            $qntAnunciosGratis = Advert::where('destaque', '=', '0')->count();
            $qntAnunciosPagos = Advert::where('destaque', '!=', '0')->count();


            $testeee = DadosAdmin::create(['mes' => $mes, 'ano' => $ano, 'totalCliques' => $qntVerAnunciosTodos,
                'cliquesImoveis' => $qntVerAnunciosImoveis, 'cliquesVeiculos' => $qntVerAnunciosVeiculos,
                'cliquesVerTelefone' => $qntVerTelefone, 'cliquesFinanciamento' => $qntFinanciamento,
                'emailsContato' => $qntEmailContato, 'anunciosGratis' => $qntAnunciosGratis, 'anunciosPagos' => $qntAnunciosPagos]);

            dd($testeee);

            return view('admin.principal.adm',compact('qntVerAnunciosTodos','qntVerAnunciosImoveis', 'qntVerAnunciosVeiculos',
                        'qntVerTelefone', 'qntFinanciamento', 'qntEmailContato', 'qntAnunciosGratis',
                        'qntAnunciosPagos'));
        }



    } */
    //Mostrar todos os leads
    public function mostrarLeads(){

        $leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->where('leads_historico.situacao', '=', '1')->orderBy('data_retorno','asc')->paginate(30);

        //dd($leads); select('leads_historico.data_retorno,
        //leads.nome, leads.email, leads.telefone, leads.celular, leads.cidade, leads_historico.id as idhistorico')
        return view('admin.principal.leads',compact('leads'));
    }
    //Abrir a tela de editar carregando os dados do lead selecionado
    public function edit($id){
        
        $lead = Leads::where('id', $id)->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
    //Abrir tela para adicionar novo lead
    public function novo(){

        return view('admin.principal.novoLeads');
    }
    //Salvar novo lead
    public function store(Requests\LeadsSaveRequest $request){

        $data = $request->all();

        $lead = Leads::create($data);

        $data_retorno = DateTime::createFromFormat('d/m/Y', $data['data_retorno'])->format('Y-m-d');
        $mensagem = $data['mensagem'];

        LeadsHistorico::create(['lead_id' => $lead->id, 'data_retorno' => $data_retorno, 'mensagem' => $mensagem]);

        $leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->orderBy('data_retorno','asc')->paginate(30);
        return view('admin.principal.leads',compact('leads'));

    }
    //Editar lead ja salvo
    public function editLead(Requests\LeadsEditRequest $request){

        $data = $request->all();

        $lead = Leads::find($data['id']);

        $lead->nome = $data['nome'];
        $lead->email = $data['email'];
        $lead->telefone = $data['telefone'];
        $lead->celular = $data['celular'];
        $lead->cidade = $data['cidade'];
        $lead->estado = $data['estado'];
        $lead->sexo = $data['sexo'];
        
        $lead->save();

        $lead = Leads::where('id', $data['id'])->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
    //Adicionar novo historico a lead existente
    public function addHistoricoLead(Requests\LeadsHistoricoSaveRequest $request){

        $data = $request->all();

        $data_retorno = DateTime::createFromFormat('d/m/Y', $data['data_retorno'])->format('Y-m-d');
        $mensagem = $data['mensagem'];

        LeadsHistorico::create(['lead_id' => $data['id'], 'data_retorno' => $data_retorno, 'mensagem' => $mensagem]);

        $lead = Leads::where('id', $data['id'])->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
    //Inativar historico lead
    public function inativarHistoricoLead($id, $idLead){

        $lead = LeadsHistorico::find($id);

        $lead->situacao = 0;

        $lead->save();

        $lead = Leads::where('id', $idLead)->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }

    //Pegar os veiculos

    public function getVeiculo(){
        $id_user =  Auth::user()->id;
        $queryVeiculos = Advert::select('adverts.*')->join('advert_imovel','adverts.id','=','advert_imovel.advert_id');
        Response::json($queryVeiculos->where('user_id','=',$id_user)->orderBy('id','desc')->with('images','advertImovel')->paginate(18));



    }


    public function anunciosSemImg(){

        $adverts = Advert::get();

        foreach ($adverts as $adv)
        {
            $qnt = $adv->images()->count();

            if($qnt <= 0)
            {
                dd($adv->id);
            }
        }
        /*
        $lead = LeadsHistorico::find($id);

        $lead->situacao = 0;

        $lead->save();

        $lead = Leads::where('id', $idLead)->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
        */
    }

    public function lerXML(){

        $xml = simplexml_load_file('http://integracao.valuegaia.com.br/arquivos/modelo.xml', 'SimpleXMLElement', LIBXML_NOCDATA);//http://sempredanegocio.com.br/teste.xml'); /* Lê o arquivo XML e recebe um objeto com as informações */


        /* Percorre o objeto e imprime na tela as informações de cada contato */
        foreach ($xml as $value){
            //dd(simplexml_load_file($value->CodigoImovel, 'SimpleXMLElement', LIBXML_NOCDATA));
            $content = $value->CodigoImovel;
            dd($content);
            //$a = "Id: " . $contato->idcontato . "<br>";
           // $a .= "Nome: " . $contato->nome . "<br>";
           // $a .= "Email: " . $contato->email. "<br><br>";
           // echo $a;
        }
    }
}
