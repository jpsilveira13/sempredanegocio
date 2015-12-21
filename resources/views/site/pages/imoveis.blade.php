@extends('site.layout')

@section('content')
</div><!-- fechamento da div row que esta dentro do layout -->
</div><!-- fechamento da container  que esta dentro do layout -->


<div class="container-caixa-busca">
    <div class="spacer-filtros"></div>
    <div class="centraliza-caixa-busca">
        <div id="divCaixaBusca" class="caixa-busca caixa-busca-resultado">
            <form name="caixaBusca">
                <div class="nivel-busca">
                    <div class="tipo-transacao">
                        <label for="btnVenda">O que você precisa?</label>
                        <div class="buttons" id="divTransacao">
                            <button id="btnVenda" type="button" class="button active" value="Venda"  disabled="disabled">Comprar</button>
                            <button id="btnLocacao" type="button" class="button" value="Locacao">Alugar</button>
                            <button id="btnLancamento" type="button" class="button" value="Lancamentos" >Lançamentos</button>
                        </div>
                    </div>
                    <div class="tipo-imovel">
                        <label for="tipoImovelNovo">Qual tipo?</label><br />
                        <input type="hidden" id="hdnSubTipoSelecionado" value="apartamento-padrao">
                        <select id="tipo" class="tipo-imovel-temporada">
                            <option value=""> Qual o tipo?</option>
                            <optgroup label="Todos">
                                <option value=Todos os imóveis>Todos os imóveis</option>
                            </optgroup>
                            <optgroup label="Residencial">
                                <option value="Apartamento Padrão">Apartamento Padrão</option>
                                <option value="Casa de Condomínio" >Casa de Condomínio</option>
                                <option value="Casa de Vila">Casa de Vila</option>

                            </optgroup>
                            <optgroup label="Comercial">
                                <option value="Box/Garagem">Box/Garagem</option>
                                <option value="Conjunto Comercial/Sala" data-nomeamigavel="Conjunto Comercial/Sala">Conjunto Comercial/Sala</option>
                                <option value="Hotel">Hotel</option>
                                <option value="Loja/Salão">Loja/Salão</option>
                                <option value="Pousada/Chalé">Pousada/Chalé</option>
                                <option value="Prédio Inteiro">Prédio Inteiro</option>
                                <option value="Studio">Studio</option>
                            </optgroup>
                            <optgroup label="Rural">
                                <option value="Chácara">Chácara</option>
                                <option value="Fazenda">Fazenda</option>
                                <option value="Sítio">Sítio</option>
                            </optgroup>
                        </select>
                    </div>
                    <!-- localidade -->
                    <div class="local-busca">
                        <label for="location">Onde?</label><br />
                        <input type="text" value=""  placeholder="Digite a cidade..." name="cidade" id="location" class="ui-autocomplete-input" autocomplete="off">
                        <ul id="listaCidades"></ul>
                    </div>

                </div>
                <div class="container-fluid content-filtros container-filtros" id="divCaixaBusca">
                    <ul class="filtros-principais clearfix">
                        <li>
                            <label id="labelFaixaPreco" class="icone-faixa-preco filtro faixa-preco" data-label="FAIXA DE PREÇO?">FAIXA DE PREÇO? <span class="icone-seta-cheia-baixo"></span></label>
                            <div id="divFaixaPreco" class="content-slider filtro-check content-filtro">
                                <div class="titulo-check">
                                    FAIXA DE PREÇO - R$
                                </div>
                                <div id="box-slider-preco" class="box-busca">

                                    <ul class="unstyled pull-left">
                                        <li><input type="text" id="typePrecoMin" class="input-slider-esq alerta-imput-busca" value="0" maxlength="11" pattern="\d*"></li>
                                        <li class="spacer-slider"><span class="spacer-left"></span>até<span class="spacer-right"></span></li>
                                        <li><input type="text" id="typePrecoMax" class="input-slider-dir alerta-imput-busca" maxlength="11" pattern="\d*"></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label id="labelQuarto" class="icone-quartos filtro quartos" data-label="QUARTOS">QUARTOS <span class="icone-seta-cheia-baixo"></span></label>
                            <div id="divQuartos" class="filtro-check check-quartos content-filtro">
                                <div class="titulo-check">
                                    QUARTOS
                                </div>
                                <ul class="opcoes-check unstyled pull-left">
                                    <li class="option-selected" >
                                        <label>
                                            <input type="checkbox" checked value="1" id="quarto1" />
                                            <span>1</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="2" id="quarto2" />
                                            <span>2</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="3" id="quarto3" />
                                            <span>3</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="4" id="quarto4" />
                                            <span>4</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                        </li>
                        <li>
                            <label id="labelSuite" class="icone-suites filtro suites" data-label="SUÍTES">SUÍTES <span class="icone-seta-cheia-baixo"></span></label>

                            <span class="icone-seta-cheia-baixo"></span>
                            <div id="divSuite" class="filtro-check check-suites content-filtro" data-filtro="select" style="display: none;">
                                <div class="titulo-check">SUÍTES</div>
                                <ul class="opcoes-check unstyled pull-left">
                                    <li class="option-selected" >
                                        <label>
                                            <input type="checkbox" checked value="1" id="suite1" />
                                            <span>1</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="2" id="suite2" />
                                            <span>2</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="3" id="suite3" />
                                            <span>3</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="4" id="suite4" />
                                            <span>4</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <label id="labelVaga" class="icone-vagas filtro vagas" data-label="VAGAS">VAGAS <span class="icone-seta-cheia-baixo"></span></label>
                            <div id="divVaga" class="filtro-check check-vagas content-filtro" data-filtro="select" style="display: none;">
                                <div class="titulo-check">VAGAS</div>
                                <ul class="opcoes-check unstyled pull-left">
                                    <li class="option-selected" >
                                        <label>
                                            <input type="checkbox" checked value="1" id="vagas1" />
                                            <span>1</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="2" id="vagas2" />
                                            <span>2</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="3" id="vagas3" />
                                            <span>3</span>
                                        </label>
                                    </li>
                                    <li class="" >
                                        <label>
                                            <input type="checkbox" value="4" id="vagas4" />
                                            <span>4</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                        </li>
                        <li>
                            <label id="labelFaixaArea" class="icone-area filtro area" data-label="ÁREA (m²)">ÁREA (m²) <span class="icone-seta-cheia-baixo"></span></label>
                        </li>
                    </ul>

                </div>
                <div class="nivel-busca">
                    <div class="rodape-busca">
                        <div class="mensagem-caixa-busca">
                            <div id="previewAnuncios" class="mensagem-preview">
                                <div id="mensagem-alerta">
                                    <div class="result-number">
                                        <strong>{{$countAdvert->count()}}</strong> anúncios encontrados
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-buscar">
                            <button id="btnBuscar" class="btn btn-spd" type="button">Buscar</button>
                            <div class="content-mais-opcoes">
                                <span id="linkMaisOpcoesBusca" class="mais-opcoes-busca" title="Faça uma busca avançada utilizando filtros personalizados"><span class="icone-seta-cheia-baixo"></span>Busca avançada</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- fim caixa busca resultado -->
    </div>
</div>
<div class="clearfix"></div>
<div class="row no-margin">
    <div class="container">
        <div class="col-md-6 hidden-sm hidden-xs">
            <div class="well well-sm">
                <strong>Exibir como </strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                 </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grade</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 pull-right hidden-sm hidden-xs">
            <form action="{{URL::current()}}" class="pull-right">
                <div class="select2-container pull-right " style="margin-top:9px">
                    <select class="select2-choice" id="sortby">
                        <option value="Relevancia" selected="selected">
                            Relevância

                        </option>
                        <option  value="DataAtualizacao">
                            Data Atualização

                        </option>
                        <option  value="Valor">
                            Valor

                        </option>
                        <option  value="Area">
                            Área

                        </option>
                    </select>
                </div>
                <label class="control-label pull-right sort" for="sortby">Ordenar por</label>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-11">
            <section class="sugestao-anuncio">
                <div class="row">
                    <div class="col-md-12 col-lg-12  banner-propaganda">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Banner topo -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-9034476199683173"
                             data-ad-slot="1837640844"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Temos  anúncios cadastrados</h2>
                    </div>
                </div>

                <div id="products" class="row list-group">
                    @foreach($adverts as $advert)
                        <div class="item  col-xs-12 col-sm-6 col-lg-3 col-md-3 bloco-item">
                            <a class="item-total" href="{{url('/')}}/imovel/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{$advert->url_anuncio}}" >
                                <div class="thumbnail">
                                    @if(count($advert->images))
                                        <img class="group list-group-image content-img-sugestao" src="{{url('gallery/'.$advert->images()->first()->extension)}}" width="220" height="229" alt="titulo imagem" />
                                    @else
                                        <img class="group list-group-image content-img-sugestao" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                    @endif
                                    <div class="caption infos-suggest">
                                        <h4 class="group inner list-group-item-heading text-bairro">{{$advert->cidade}}<br />
                                            {{$advert->estado}}
                                        </h4>
                                        <p class="group inner list-group-item-text">
                                        <ul class="list-infos unstyled clearfix no-padding" id="tooltip-config">
                                            <li class="icone-quartos zaptip" data-original-title="Quantidade de quartos" data-toggle="tooltip">{{$advert->numero_quarto}}</li>
                                            <li class="icone-suites zaptip" data-original-title="Quantidade de suítes" data-toggle="tooltip">{{$advert->numero_suite}}</li>
                                            <li class="icone-vagas zaptip" data-original-title="Quantidade de vagas" data-toggle="tooltip">{{$advert->numero_garagem}}</li>
                                            <li class="icone-hospedes zaptip" data-original-title="Quantidade de pessoas" data-toggle="tooltip">12</li>

                                        </ul>
                                        <!-- essa div só ficara visivel quando for lista -->
                                        <div class="col-xs-12 col-md-12 list-item-nav2">
                                            <p class="lead description-anuncio">
                                                {{str_limit($advert->anuncio_descricao,$limit = 42, $end=" ...")}}
                                            </p>
                                        </div>

                                        <div class="row list-group-hidden">
                                            <div class="col-xs-12 col-md-12">
                                                <p class="lead description-anuncio">
                                                    {{str_limit($advert->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mb4">
                                            <div class="col-xs-8 col-md-8 ">
                                                <div class="bottom-suggest">
                                                    <span class="val-imovel">R$ {{number_format((float)$advert->preco,2)}}</span>
                                                    <span class="text-diaria">/ mês</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-4 fr">
                                                <div class="acoes-minifichas-sugestoes">
                                                    <span class="addicon btnFavorito4090308 icone-favoritada pull-right fvestilo"  data-toggle="tooltip" data-placement="top" data-original-title="Adicionar à minha lista"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class='text-center'>
                {!! $adverts->render() !!}
            </div>
        </div>
        <div id="barra-fixa-menu">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm" >
                <div class="area-banner-lateral">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- banner lateral -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:120px;height:600px"
                         data-ad-client="ca-pub-9034476199683173"
                         data-ad-slot="6267840446"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection