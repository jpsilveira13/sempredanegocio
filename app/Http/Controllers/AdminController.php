<?php

namespace sempredanegocio\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sempredanegocio\Http\Requests;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertImovel;
use sempredanegocio\Models\AdvertImage;
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

        if($user->typeuser_id == 1){
            $queryCountTotal = Advert::count();
            $countTickert = Complaint::count();
            return view('admin.principal.index',compact('queryCountTotal','countTickert'));
        }else{
            $id_user =  Auth::user()->id;
            $messageCount = AdvertMessage::where('id_user',$id_user)->count();
            $queryCountUser = Advert::where('user_id','=',$id_user )->count();
            return view('admin.principal.index',compact('queryCountUser','messageCount'));
        }
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
        $advertsTotal = 2124171;

        $conta = 1;
        while ($conta < $advertsTotal) {
            $termino = $conta+10000;

            $adverts = null;
            $adverts = Advert::where('id', '>=', $conta)->where('id', '<=', $termino)->get();

            foreach ($adverts as $adv)
            {
                $qnt = $adv->images()->count();

                if($qnt <= 0)
                {
                    if($adv->advertImovel != null)
                        $adv->advertImovel->delete();
                    if($adv->advertVeiculo != null)
                        $adv->advertVeiculo->delete();
                    DB::delete('delete from advert_feature where advert_id = '.$adv->id);
                    $adv->delete();

                }
            }

            $conta = $termino;
        }
    }

    public function usuariosSemAnuncio(){

       // $adverts = User::where('password', null)->count();
       // dd($adverts);

        $advertsTotal = 1445000;

        $aaa = 0;

        $conta = 1;
        while ($conta < $advertsTotal) {

            $termino = $conta+5000;

            $users = null;
            $users = User::where('password', null)->where('id', '>=', $conta)->where('id', '<=', $termino)->get();

            foreach ($users as $us)
            {
                $qnt = Advert::where('user_id', $us->id)->count();


                if($qnt <= 0)
                {
                    $us->delete();
                }
            }

            $conta = $termino;
        }
        echo $aaa;
    }

    public function apagarAnuncio($id){

        $advert = Advert::find($id);

        if($advert->advertImovel != null)
            $advert->advertImovel->delete();

        if($advert->advertVeiculo != null)
            $advert->advertVeiculo->delete();

        foreach ($advert->images as $img) {
            $img->delete();
        }

        DB::delete('delete from advert_feature where advert_id = '.$advert->id);

        $advert->delete();
    }

    public function lerXML(){

        $user = Auth::user();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $user->url_ValueGaia);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        curl_close ( $ch );

        $xml = simplexml_load_string($content);

        if(!$xml)
        {
            //$request->session()->flash('alert-error', 'Anúncio editado com sucesso!');
            return view('admin.principal.integracao',[
                'user' => $user,
                'valida' => true
            ]);
        }


        foreach ($xml->Imoveis->Imovel as $value){

            $anuncio = Advert::where('origem_identificacao', '=', $value->CodigoCliente.$value->CodigoImovel.$value->CodigoImovelAuxiliar)->get();

            if($anuncio->count() > 0) {

                foreach ($anuncio as $anu){
                    //echo $anu->id."<br>".$anu->tipo_anuncio."<br>";

                    $anu->anuncio_titulo = $value->TituloImovel;
                    $anu->anuncio_descricao = $value->Observacao;
                    if($anu->tipo_anuncio === "aluga")
                        $anu->preco = $value->PrecoLocacao;
                    else
                        $anu->preco = $value->PrecoVenda;

                    $anu->estado = $value->Estado;
                    $anu->cidade = $value->Cidade;
                    $anu->bairro = $value->Bairro;

                    if (!empty($value->Endereco)) {
                        $anu->active = 1;
                        $anu->rua = $value->Endereco;
                        $anu->numero = $value->Numero;
                    } else {
                        $anu->active = 0;
                    }

                    //$destaque, - verificar com o mauricio

                    $subcategories_id = "20";
                    $tipo = (String)$value->TipoImovel;
                    $tipo = trim($tipo);

                    if ($tipo === 'Apartamento' || $tipo === 'Loft')
                        $subcategories_id = "10";
                    else if ($tipo === 'Área' || $tipo === 'Terreno' || $tipo === 'Galpão')
                        $subcategories_id = "30";
                    else if ($tipo === 'Casa' || $tipo === 'Sobrado' || $tipo === 'Barracão' ||
                             $tipo === 'Conjunto' || $tipo === 'Village' || $tipo === 'Laje')
                        $subcategories_id = "20";
                    else if ($tipo === 'Chácara' || $tipo === 'Fazenda' || $tipo === 'Fazenda Rural' ||
                             $tipo === 'Sítio' || $tipo === 'Bangalô' || $tipo === 'Rancho' || $tipo === 'Haras')
                        $subcategories_id = "60";
                    else if ($tipo === 'Ponto' || $tipo === 'Prédio' || $tipo === 'Sala' ||
                             $tipo === 'Salão' || $tipo === 'Loja' || $tipo === 'Studio')
                        $subcategories_id = "70";
                    else if ($tipo === 'Kitnet')
                        $subcategories_id = "107";
                    else if ($tipo === 'Flat')
                        $subcategories_id = "113";
                    else if ($tipo === 'Cobertura' || $tipo === 'Apartamento Duplex' || $tipo === 'Apartamento Triplex' ||
                             $tipo === 'Penthouse')
                        $subcategories_id = "101";
                    else if ($tipo === 'Pousada' || $tipo === 'Resort' || $tipo === 'Hotel' || $tipo === 'Ilha')
                        $subcategories_id = "90";

                    $anu->subcategories_id = $subcategories_id;

                    $anu->save();

                    $anu->advertImovel->numero_quarto = $value->QtdDormitorios;
                    $anu->advertImovel->numero_garagem = $value->QtdVagas;
                    $anu->advertImovel->numero_banheiro = $value->QtdBanheiros;
                    $anu->advertImovel->area_construida = $value->AreaUtil;
                    $anu->advertImovel->valor_iptu = $value->PrecoIptu;
                    $anu->advertImovel->acomodacoes = $value->QtdDormitorios;

                    $anu->advertImovel->save();

                    if(isset($value->Fotos)) {
                        foreach ($anu->images as $img) {
                            $img->delete();
                        }
                        foreach ($value->Fotos->Foto as $va) {

                            $extension = $va->URLArquivo;
                            AdvertImage::create(['advert_id' => $anu->id, 'extension' => $extension]);

                        }
                    }

                    $feature = array();
                    //DormitorioEmpregada - 8/10, 25/20, 102/80, 151/101
                    $Caracteristica = (String)$value->DormitorioEmpregada;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 8;
                        if ($subcategories_id === "20")
                            $feature[] = 25;
                        if ($subcategories_id === "80")
                            $feature[] = 102;
                        if ($subcategories_id === "101")
                            $feature[] = 151;
                    }
                    //Sacada - 12/10, 29/20, 106/80, 155/101, 183/113
                    $Caracteristica = (String)$value->Sacada;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 12;
                        if ($subcategories_id === "20")
                            $feature[] = 29;
                        if ($subcategories_id === "80")
                            $feature[] = 106;
                        if ($subcategories_id === "101")
                            $feature[] = 155;
                        if ($subcategories_id === "113")
                            $feature[] = 183;
                    }
                    //ArmarioDormitorio - 5/10, 22/20, 42/40, 62/50, 80/60, 99/80, 128/90, 148/101, 160/107, 179/113
                    $Caracteristica = (String)$value->ArmarioDormitorio;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 5;
                        if ($subcategories_id === "20")
                            $feature[] = 22;
                        if ($subcategories_id === "40")
                            $feature[] = 42;
                        if ($subcategories_id === "50")
                            $feature[] = 62;
                        if ($subcategories_id === "60")
                            $feature[] = 80;
                        if ($subcategories_id === "80")
                            $feature[] = 99;
                        if ($subcategories_id === "90")
                            $feature[] = 128;
                        if ($subcategories_id === "101")
                            $feature[] = 148;
                        if ($subcategories_id === "107")
                            $feature[] = 160;
                        if ($subcategories_id === "113")
                            $feature[] = 179;
                    }
                    //Churrasqueira - 10/10, 27/20, 50/50, 74/60, 104/80, 121/90, 153/101
                    $Caracteristica = (String)$value->Churrasqueira;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 10;
                        if ($subcategories_id === "20")
                            $feature[] = 27;
                        if ($subcategories_id === "50")
                            $feature[] = 50;
                        if ($subcategories_id === "60")
                            $feature[] = 74;
                        if ($subcategories_id === "80")
                            $feature[] = 104;
                        if ($subcategories_id === "90")
                            $feature[] = 121;
                        if ($subcategories_id === "101")
                            $feature[] = 153;
                    }
                    //Piscina - 7/10, 24/20, 44/40, 49/50, 73/60, 101/80, 123/90, 150/101, 169/108, 176/113
                    $Caracteristica = (String)$value->Piscina;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 7;
                        if ($subcategories_id === "20")
                            $feature[] = 24;
                        if ($subcategories_id === "40")
                            $feature[] = 44;
                        if ($subcategories_id === "50")
                            $feature[] = 49;
                        if ($subcategories_id === "60")
                            $feature[] = 73;
                        if ($subcategories_id === "80")
                            $feature[] = 101;
                        if ($subcategories_id === "90")
                            $feature[] = 123;
                        if ($subcategories_id === "101")
                            $feature[] = 150;
                        if ($subcategories_id === "108")
                            $feature[] = 169;
                        if ($subcategories_id === "113")
                            $feature[] = 176;
                    }
                    //TVCabo - 41/40, 61/50, 79/60, 93/70, 127/90
                    $Caracteristica = (String)$value->TVCabo;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "40")
                            $feature[] = 41;
                        if ($subcategories_id === "50")
                            $feature[] = 61;
                        if ($subcategories_id === "60")
                            $feature[] = 79;
                        if ($subcategories_id === "70")
                            $feature[] = 93;
                        if ($subcategories_id === "90")
                            $feature[] = 127;
                    }
                    //Varanda - 12/10, 29/20, 106/80, 155/101, 183/113
                    $Caracteristica = (String)$value->Varanda;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 12;
                        if ($subcategories_id === "20")
                            $feature[] = 29;
                        if ($subcategories_id === "80")
                            $feature[] = 106;
                        if ($subcategories_id === "101")
                            $feature[] = 155;
                        if ($subcategories_id === "113")
                            $feature[] = 183;
                    }
                    //AreaServico - 6/10, 23/20, 43/40, 63/50, 81/60, 100/80, 149/101, 184/113
                    $Caracteristica = (String)$value->AreaServico;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 6;
                        if ($subcategories_id === "20")
                            $feature[] = 23;
                        if ($subcategories_id === "40")
                            $feature[] = 43;
                        if ($subcategories_id === "50")
                            $feature[] = 63;
                        if ($subcategories_id === "60")
                            $feature[] = 81;
                        if ($subcategories_id === "80")
                            $feature[] = 100;
                        if ($subcategories_id === "101")
                            $feature[] = 149;
                        if ($subcategories_id === "113")
                            $feature[] = 184;
                    }
                    //CampoFutebol -  16/10, 110/80, 171/108
                    $Caracteristica = (String)$value->CampoFutebol;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 16;
                        if ($subcategories_id === "80")
                            $feature[] = 110;
                        if ($subcategories_id === "108")
                            $feature[] = 171;
                    }
                    //Mobiliado - 48/50, 71/60, 91/70, 161/107, 180,113
                    $Caracteristica = (String)$value->Mobiliado;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "50")
                            $feature[] = 48;
                        if ($subcategories_id === "60")
                            $feature[] = 71;
                        if ($subcategories_id === "70")
                            $feature[] = 91;
                        if ($subcategories_id === "107")
                            $feature[] = 161;
                        if ($subcategories_id === "113")
                            $feature[] = 180;
                    }
                    //Lareira - 138/90
                    $Caracteristica = (String)$value->Mobiliado;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "90")
                            $feature[] = 138;
                    }

                    DB::delete('delete from advert_feature where advert_id = '.$anu->id);
                    if (!empty($feature)) {
                        $anu->features()->sync($feature);
                    }

                }

            } else {

                if (!empty($value->PrecoLocacao)) { //aluga

                    $tipo_anuncio = "aluga";
                    $origem = "ValueGaia";
                    $origem_identificacao = $value->CodigoCliente.$value->CodigoImovel.$value->CodigoImovelAuxiliar;

                    $anuncio_titulo = $value->TituloImovel;
                    $anuncio_descricao = $value->Observacao;
                    $preco = $value->PrecoLocacao;
                    $url_anuncio = str_slug($value->TituloImovel);

                    $estado = $value->Estado;
                    $cidade = $value->Cidade;
                    $bairro = $value->Bairro;

                    if (!empty($value->Endereco)) {
                        $active = 1;
                        $rua = $value->Endereco;
                        $numero = $value->Numero;
                    } else {
                        $active = 0;
                    }

                    //$destaque, - verificar com o mauricio

                    $user_id = $user->id;

                    $subcategories_id = "20";

                    $tipo = (String)$value->TipoImovel;
                    $tipo = trim($tipo);

                    if ($tipo === 'Apartamento' || $tipo === 'Loft')
                        $subcategories_id = "10";
                    else if ($tipo === 'Área' || $tipo === 'Terreno' || $tipo === 'Galpão')
                        $subcategories_id = "30";
                    else if ($tipo === 'Casa' || $tipo === 'Sobrado' || $tipo === 'Barracão' ||
                        $tipo === 'Conjunto' || $tipo === 'Village' || $tipo === 'Laje'
                    )
                        $subcategories_id = "20";
                    else if ($tipo === 'Chácara' || $tipo === 'Fazenda' || $tipo === 'Fazenda Rural' ||
                        $tipo === 'Sítio' || $tipo === 'Bangalô' || $tipo === 'Rancho' ||
                        $tipo === 'Haras'
                    )
                        $subcategories_id = "60";
                    else if ($tipo === 'Ponto' || $tipo === 'Prédio' || $tipo === 'Sala' ||
                        $tipo === 'Salão' || $tipo === 'Loja' || $tipo === 'Studio'
                    )
                        $subcategories_id = "70";
                    else if ($tipo === 'Kitnet')
                        $subcategories_id = "107";
                    else if ($tipo === 'Flat')
                        $subcategories_id = "113";
                    else if ($tipo === 'Cobertura' || $tipo === 'Apartamento Duplex' || $tipo === 'Apartamento Triplex' ||
                        $tipo === 'Penthouse'
                    )
                        $subcategories_id = "101";
                    else if ($tipo === 'Pousada' || $tipo === 'Resort' || $tipo === 'Hotel' ||
                        $tipo === 'Ilha'
                    )
                        $subcategories_id = "90";

                    $advert = Advert::create(['user_id' => $user_id,
                        'subcategories_id' => $subcategories_id,
                        'tipo_anuncio' => $tipo_anuncio,
                        'origem' => $origem,
                        'origem_identificacao' => $origem_identificacao,
                        'estado' => $estado,
                        'cidade' => $cidade,
                        'bairro' => $bairro,
                        'rua' => $rua,
                        'numero' => $numero,
                        'anuncio_titulo' => $anuncio_titulo,
                        'anuncio_descricao' => $anuncio_descricao,
                        'preco' => $preco,
                        'url_anuncio' => $url_anuncio,
                        'active' => $active]);

                    $numero_quarto = $value->QtdDormitorios;
                    $numero_garagem = $value->QtdVagas;
                    $numero_banheiro = $value->QtdBanheiros;
                    $area_construida = $value->AreaUtil;
                    $valor_iptu = $value->PrecoIptu;
                    $acomodacoes = $value->QtdDormitorios;
                    $category_id = "1";

                    AdvertImovel::create(['numero_quarto' => $numero_quarto,
                        'numero_garagem' => $numero_garagem,
                        'numero_banheiro' => $numero_banheiro,
                        'area_construida' => $area_construida,
                        'valor_iptu' => $valor_iptu,
                        'acomodacoes' => $acomodacoes,
                        'advert_id' => $advert->id,
                        'category_id' => $category_id]);

                    if(isset($value->Fotos)) {
                        foreach ($value->Fotos->Foto as $va) {

                            $extension = $va->URLArquivo;
                            AdvertImage::create(['advert_id' => $advert->id, 'extension' => $extension]);

                        }
                    }

                    $feature = array();
                    //DormitorioEmpregada - 8/10, 25/20, 102/80, 151/101
                    $Caracteristica = (String)$value->DormitorioEmpregada;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 8;
                        if ($subcategories_id === "20")
                            $feature[] = 25;
                        if ($subcategories_id === "80")
                            $feature[] = 102;
                        if ($subcategories_id === "101")
                            $feature[] = 151;
                    }
                    //Sacada - 12/10, 29/20, 106/80, 155/101, 183/113
                    $Caracteristica = (String)$value->Sacada;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 12;
                        if ($subcategories_id === "20")
                            $feature[] = 29;
                        if ($subcategories_id === "80")
                            $feature[] = 106;
                        if ($subcategories_id === "101")
                            $feature[] = 155;
                        if ($subcategories_id === "113")
                            $feature[] = 183;
                    }
                    //ArmarioDormitorio - 5/10, 22/20, 42/40, 62/50, 80/60, 99/80, 128/90, 148/101, 160/107, 179/113
                    $Caracteristica = (String)$value->ArmarioDormitorio;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 5;
                        if ($subcategories_id === "20")
                            $feature[] = 22;
                        if ($subcategories_id === "40")
                            $feature[] = 42;
                        if ($subcategories_id === "50")
                            $feature[] = 62;
                        if ($subcategories_id === "60")
                            $feature[] = 80;
                        if ($subcategories_id === "80")
                            $feature[] = 99;
                        if ($subcategories_id === "90")
                            $feature[] = 128;
                        if ($subcategories_id === "101")
                            $feature[] = 148;
                        if ($subcategories_id === "107")
                            $feature[] = 160;
                        if ($subcategories_id === "113")
                            $feature[] = 179;
                    }
                    //Churrasqueira - 10/10, 27/20, 50/50, 74/60, 104/80, 121/90, 153/101
                    $Caracteristica = (String)$value->Churrasqueira;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 10;
                        if ($subcategories_id === "20")
                            $feature[] = 27;
                        if ($subcategories_id === "50")
                            $feature[] = 50;
                        if ($subcategories_id === "60")
                            $feature[] = 74;
                        if ($subcategories_id === "80")
                            $feature[] = 104;
                        if ($subcategories_id === "90")
                            $feature[] = 121;
                        if ($subcategories_id === "101")
                            $feature[] = 153;
                    }
                    //Piscina - 7/10, 24/20, 44/40, 49/50, 73/60, 101/80, 123/90, 150/101, 169/108, 176/113
                    $Caracteristica = (String)$value->Piscina;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 7;
                        if ($subcategories_id === "20")
                            $feature[] = 24;
                        if ($subcategories_id === "40")
                            $feature[] = 44;
                        if ($subcategories_id === "50")
                            $feature[] = 49;
                        if ($subcategories_id === "60")
                            $feature[] = 73;
                        if ($subcategories_id === "80")
                            $feature[] = 101;
                        if ($subcategories_id === "90")
                            $feature[] = 123;
                        if ($subcategories_id === "101")
                            $feature[] = 150;
                        if ($subcategories_id === "108")
                            $feature[] = 169;
                        if ($subcategories_id === "113")
                            $feature[] = 176;
                    }
                    //TVCabo - 41/40, 61/50, 79/60, 93/70, 127/90
                    $Caracteristica = (String)$value->TVCabo;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "40")
                            $feature[] = 41;
                        if ($subcategories_id === "50")
                            $feature[] = 61;
                        if ($subcategories_id === "60")
                            $feature[] = 79;
                        if ($subcategories_id === "70")
                            $feature[] = 93;
                        if ($subcategories_id === "90")
                            $feature[] = 127;
                    }
                    //Varanda - 12/10, 29/20, 106/80, 155/101, 183/113
                    $Caracteristica = (String)$value->Varanda;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 12;
                        if ($subcategories_id === "20")
                            $feature[] = 29;
                        if ($subcategories_id === "80")
                            $feature[] = 106;
                        if ($subcategories_id === "101")
                            $feature[] = 155;
                        if ($subcategories_id === "113")
                            $feature[] = 183;
                    }
                    //AreaServico - 6/10, 23/20, 43/40, 63/50, 81/60, 100/80, 149/101, 184/113
                    $Caracteristica = (String)$value->AreaServico;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 6;
                        if ($subcategories_id === "20")
                            $feature[] = 23;
                        if ($subcategories_id === "40")
                            $feature[] = 43;
                        if ($subcategories_id === "50")
                            $feature[] = 63;
                        if ($subcategories_id === "60")
                            $feature[] = 81;
                        if ($subcategories_id === "80")
                            $feature[] = 100;
                        if ($subcategories_id === "101")
                            $feature[] = 149;
                        if ($subcategories_id === "113")
                            $feature[] = 184;
                    }
                    //CampoFutebol -  16/10, 110/80, 171/108
                    $Caracteristica = (String)$value->CampoFutebol;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 16;
                        if ($subcategories_id === "80")
                            $feature[] = 110;
                        if ($subcategories_id === "108")
                            $feature[] = 171;
                    }
                    //Mobiliado - 48/50, 71/60, 91/70, 161/107, 180,113
                    $Caracteristica = (String)$value->Mobiliado;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "50")
                            $feature[] = 48;
                        if ($subcategories_id === "60")
                            $feature[] = 71;
                        if ($subcategories_id === "70")
                            $feature[] = 91;
                        if ($subcategories_id === "107")
                            $feature[] = 161;
                        if ($subcategories_id === "113")
                            $feature[] = 180;
                    }
                    //Lareira - 138/90
                    $Caracteristica = (String)$value->Mobiliado;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "90")
                            $feature[] = 138;
                    }

                    if (!empty($feature)) {
                        $advert->features()->sync($feature);
                    }
                }
                if (!empty($value->PrecoVenda)) { //venda @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    $tipo_anuncio = "venda";
                    $origem = "ValueGaia";
                    $origem_identificacao = $value->CodigoCliente.$value->CodigoImovel.$value->CodigoImovelAuxiliar;

                    $anuncio_titulo = $value->TituloImovel;
                    $anuncio_descricao = $value->Observacao;
                    $preco = $value->PrecoVenda;
                    $url_anuncio = str_slug($value->TituloImovel);

                    $estado = $value->Estado;
                    $cidade = $value->Cidade;
                    $bairro = $value->Bairro;

                    if (!empty($value->Endereco)) {
                        $active = 1;
                        $rua = $value->Endereco;
                        $numero = $value->Numero;
                    } else {
                        $active = 0;
                    }

                    //$destaque, - verificar com o mauricio

                    $user_id = $user->id;

                    $subcategories_id = "20";

                    $tipo = (String)$value->TipoImovel;
                    $tipo = trim($tipo);

                    if ($tipo === 'Apartamento' || $tipo === 'Loft')
                        $subcategories_id = "10";
                    else if ($tipo === 'Área' || $tipo === 'Terreno' || $tipo === 'Galpão')
                        $subcategories_id = "30";
                    else if ($tipo === 'Casa' || $tipo === 'Sobrado' || $tipo === 'Barracão' ||
                        $tipo === 'Conjunto' || $tipo === 'Village' || $tipo === 'Laje'
                    )
                        $subcategories_id = "20";
                    else if ($tipo === 'Chácara' || $tipo === 'Fazenda' || $tipo === 'Fazenda Rural' ||
                        $tipo === 'Sítio' || $tipo === 'Bangalô' || $tipo === 'Rancho' ||
                        $tipo === 'Haras'
                    )
                        $subcategories_id = "60";
                    else if ($tipo === 'Ponto' || $tipo === 'Prédio' || $tipo === 'Sala' ||
                        $tipo === 'Salão' || $tipo === 'Loja' || $tipo === 'Studio'
                    )
                        $subcategories_id = "70";
                    else if ($tipo === 'Kitnet')
                        $subcategories_id = "107";
                    else if ($tipo === 'Flat')
                        $subcategories_id = "113";
                    else if ($tipo === 'Cobertura' || $tipo === 'Apartamento Duplex' || $tipo === 'Apartamento Triplex' ||
                        $tipo === 'Penthouse'
                    )
                        $subcategories_id = "101";
                    else if ($tipo === 'Pousada' || $tipo === 'Resort' || $tipo === 'Hotel' ||
                        $tipo === 'Ilha'
                    )
                        $subcategories_id = "90";

                    $advert = Advert::create(['user_id' => $user_id,
                        'subcategories_id' => $subcategories_id,
                        'tipo_anuncio' => $tipo_anuncio,
                        'origem' => $origem,
                        'origem_identificacao' => $origem_identificacao,
                        'estado' => $estado,
                        'cidade' => $cidade,
                        'bairro' => $bairro,
                        'rua' => $rua,
                        'numero' => $numero,
                        'anuncio_titulo' => $anuncio_titulo,
                        'anuncio_descricao' => $anuncio_descricao,
                        'preco' => $preco,
                        'url_anuncio' => $url_anuncio,
                        'active' => $active]);

                    $numero_quarto = $value->QtdDormitorios;
                    $numero_garagem = $value->QtdVagas;
                    $numero_banheiro = $value->QtdBanheiros;
                    $area_construida = $value->AreaUtil;
                    $valor_iptu = $value->PrecoIptu;
                    $acomodacoes = $value->QtdDormitorios;
                    $category_id = "1";

                    AdvertImovel::create(['numero_quarto' => $numero_quarto,
                        'numero_garagem' => $numero_garagem,
                        'numero_banheiro' => $numero_banheiro,
                        'area_construida' => $area_construida,
                        'valor_iptu' => $valor_iptu,
                        'acomodacoes' => $acomodacoes,
                        'advert_id' => $advert->id,
                        'category_id' => $category_id]);

                    if(isset($value->Fotos)) {
                        foreach ($value->Fotos->Foto as $va) {

                            $extension = $va->URLArquivo;
                            AdvertImage::create(['advert_id' => $advert->id, 'extension' => $extension]);

                        }
                    }

                    $feature = array();
                    //DormitorioEmpregada - 8/10, 25/20, 102/80, 151/101
                    $Caracteristica = (String)$value->DormitorioEmpregada;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 8;
                        if ($subcategories_id === "20")
                            $feature[] = 25;
                        if ($subcategories_id === "80")
                            $feature[] = 102;
                        if ($subcategories_id === "101")
                            $feature[] = 151;
                    }
                    //Sacada - 12/10, 29/20, 106/80, 155/101, 183/113
                    $Caracteristica = (String)$value->Sacada;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 12;
                        if ($subcategories_id === "20")
                            $feature[] = 29;
                        if ($subcategories_id === "80")
                            $feature[] = 106;
                        if ($subcategories_id === "101")
                            $feature[] = 155;
                        if ($subcategories_id === "113")
                            $feature[] = 183;
                    }
                    //ArmarioDormitorio - 5/10, 22/20, 42/40, 62/50, 80/60, 99/80, 128/90, 148/101, 160/107, 179/113
                    $Caracteristica = (String)$value->ArmarioDormitorio;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 5;
                        if ($subcategories_id === "20")
                            $feature[] = 22;
                        if ($subcategories_id === "40")
                            $feature[] = 42;
                        if ($subcategories_id === "50")
                            $feature[] = 62;
                        if ($subcategories_id === "60")
                            $feature[] = 80;
                        if ($subcategories_id === "80")
                            $feature[] = 99;
                        if ($subcategories_id === "90")
                            $feature[] = 128;
                        if ($subcategories_id === "101")
                            $feature[] = 148;
                        if ($subcategories_id === "107")
                            $feature[] = 160;
                        if ($subcategories_id === "113")
                            $feature[] = 179;
                    }
                    //Churrasqueira - 10/10, 27/20, 50/50, 74/60, 104/80, 121/90, 153/101
                    $Caracteristica = (String)$value->Churrasqueira;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 10;
                        if ($subcategories_id === "20")
                            $feature[] = 27;
                        if ($subcategories_id === "50")
                            $feature[] = 50;
                        if ($subcategories_id === "60")
                            $feature[] = 74;
                        if ($subcategories_id === "80")
                            $feature[] = 104;
                        if ($subcategories_id === "90")
                            $feature[] = 121;
                        if ($subcategories_id === "101")
                            $feature[] = 153;
                    }
                    //Piscina - 7/10, 24/20, 44/40, 49/50, 73/60, 101/80, 123/90, 150/101, 169/108, 176/113
                    $Caracteristica = (String)$value->Piscina;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 7;
                        if ($subcategories_id === "20")
                            $feature[] = 24;
                        if ($subcategories_id === "40")
                            $feature[] = 44;
                        if ($subcategories_id === "50")
                            $feature[] = 49;
                        if ($subcategories_id === "60")
                            $feature[] = 73;
                        if ($subcategories_id === "80")
                            $feature[] = 101;
                        if ($subcategories_id === "90")
                            $feature[] = 123;
                        if ($subcategories_id === "101")
                            $feature[] = 150;
                        if ($subcategories_id === "108")
                            $feature[] = 169;
                        if ($subcategories_id === "113")
                            $feature[] = 176;
                    }
                    //TVCabo - 41/40, 61/50, 79/60, 93/70, 127/90
                    $Caracteristica = (String)$value->TVCabo;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "40")
                            $feature[] = 41;
                        if ($subcategories_id === "50")
                            $feature[] = 61;
                        if ($subcategories_id === "60")
                            $feature[] = 79;
                        if ($subcategories_id === "70")
                            $feature[] = 93;
                        if ($subcategories_id === "90")
                            $feature[] = 127;
                    }
                    //Varanda - 12/10, 29/20, 106/80, 155/101, 183/113
                    $Caracteristica = (String)$value->Varanda;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 12;
                        if ($subcategories_id === "20")
                            $feature[] = 29;
                        if ($subcategories_id === "80")
                            $feature[] = 106;
                        if ($subcategories_id === "101")
                            $feature[] = 155;
                        if ($subcategories_id === "113")
                            $feature[] = 183;
                    }
                    //AreaServico - 6/10, 23/20, 43/40, 63/50, 81/60, 100/80, 149/101, 184/113
                    $Caracteristica = (String)$value->AreaServico;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 6;
                        if ($subcategories_id === "20")
                            $feature[] = 23;
                        if ($subcategories_id === "40")
                            $feature[] = 43;
                        if ($subcategories_id === "50")
                            $feature[] = 63;
                        if ($subcategories_id === "60")
                            $feature[] = 81;
                        if ($subcategories_id === "80")
                            $feature[] = 100;
                        if ($subcategories_id === "101")
                            $feature[] = 149;
                        if ($subcategories_id === "113")
                            $feature[] = 184;
                    }
                    //CampoFutebol -  16/10, 110/80, 171/108
                    $Caracteristica = (String)$value->CampoFutebol;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "10")
                            $feature[] = 16;
                        if ($subcategories_id === "80")
                            $feature[] = 110;
                        if ($subcategories_id === "108")
                            $feature[] = 171;
                    }
                    //Mobiliado - 48/50, 71/60, 91/70, 161/107, 180,113
                    $Caracteristica = (String)$value->Mobiliado;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "50")
                            $feature[] = 48;
                        if ($subcategories_id === "60")
                            $feature[] = 71;
                        if ($subcategories_id === "70")
                            $feature[] = 91;
                        if ($subcategories_id === "107")
                            $feature[] = 161;
                        if ($subcategories_id === "113")
                            $feature[] = 180;
                    }
                    //Lareira - 138/90
                    $Caracteristica = (String)$value->Mobiliado;
                    $Caracteristica = trim($Caracteristica);
                    if ($Caracteristica === "1") {
                        if ($subcategories_id === "90")
                            $feature[] = 138;
                    }

                    if (!empty($feature)) {
                        $advert->features()->sync($feature);
                    }
                }
            }
        }

        return view('admin.principal.integracao',[
            'user' => $user,
            'valida' => false
        ]);

    }
    //Abrir integração
    public function integracao(){

        $user = Auth::user();

        return view('admin.principal.integracao',[
            'user' => $user,
            'valida' => false
        ]);
    }
}
