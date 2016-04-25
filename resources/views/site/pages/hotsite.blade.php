@extends('site.layout')

@section('content')
</div>
</div>
<div class="col-md-12 col-lg-12 hidden-sm hidden-xs no-padding">
    <div class="header-logo-minisite">
        <div class="minisite-area-logo">
            <h1 class="area-logo-titulo">
                <img src="{{$user->avatar}}" title="{{$user->name}}" />
                <aside>Registro CRECI: MGF-17423 </aside>
            </h1>
            <p class="minisite-diamente minisite-diamante-upper pula-linha">
                {{$advertVenda}}<br />Imóveis a <b> venda</b>
            </p>
            <p class="minisite-diamente minisite-diamante-lower pula-linha">
                {{$advertAluga}}<br />Imóveis para <b> Aluguel</b>
            </p>
            <p class="minisite-diamente-count pula-linha">
                {{$user->advertuser()->count()}}<br /> imóveis no portal
            </p>
        </div>
        <div class="minisite-area-direita">
            <h2 class="minisite-area-direita-titulo">
                Outras Informações sobre<br />
                {{$user->name}}:
            </h2>
            <dl>
                <dt class="minisite-area-since">
                    Anunciante desde
                </dt>
                <dd class="minisite-area-since">{{ date("m/Y", strtotime($user->created_at)) }}</dd>
                <dt class="minisite-area-atuacao">Principal área de atuação:</dt>
                <dd class="minisite-area-atuacao">
                    <span class="minisite-area-atuacao-texto">
                        {{$user->city}}
                    </span>
                </dd>
                <!-- aqui irei rodar o laço para trazer os bairros -->
                <dd class="minisite-area-atuacao-small">
                     <span class="minisite-area-atuacao-texto">

                    </span>
                </dd>
            </dl>
        </div>
        <div class="minisite-header-footer">
            <dl class="minisite-header-footer-info">
                <dt>Telefone:</dt>
                <dd class="agente-minisite-sprited agente-minisite-telefone ">
                    <span itemprop="telephone">{{$user->phone}}</span>
                </dd>

                <dt>Email:</dt>
                <dd class="agente-minisite-sprited agente-minisite-email">
                    <span itemprop="email"> {{$user->email}}</span>
                </dd>
                <dt>Endereço:</dt>
                <dd itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="agente-minisite-sprited agente-minisite-local">
                    <span itemprop="streetAddress">{{$user->address}}</span>
                </dd>
            </dl>
            <?php $i = 0?>
            @foreach($user->advertuser()->get() as $advert)
                <?php $i++ ?>
                @if($i < 5)
                    <a class="menu-show" href="{{url('/')}}/anuncio/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{$advert->url_anuncio}}">
                        <article class="minisite-anuncio-destaque">
                            @if(count($advert->images))
                                <?php
                                $pos = strpos($advert->images()->first()->extension, "imoveis/img");

                                $url1 = "";
                                if ($pos === false) {
                                    $url1 = 'gallery/'.$advert->images()->first()->extension;
                                } else {
                                    $url1 = "galeria/".$advert->images()->first()->extension;
                                }

                                ?>
                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="" />
                            @else
                                <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                            @endif
                            <div class="minisite-anuncio-destaque-descricao">
                                <span class="minisite-anuncio-destaque-bairro">{{$advert->bairro}}</span>
                                <p class="minisite-anuncio-destaque-detalhes">R$ {{number_format((float)$advert->preco,2,",",".")}} - {{$advert->advertImovel->area_construida}} m2 - {{$advert->advertImovel->numero_quarto}} quarto </p>
                                <p class="minisite-anuncio-destaque-localizacao">
                                    {{$advert->rua}} - @if($advert->numero){{$advert->numero}}@else @endif
                                </p>
                                <div>
                                    <button class="minisite-anuncio-destaque-contato contatoBtn">Contato / Ver Detalhe</button>
                                </div>
                            </div>

                        </article>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row no-margin">
    <div class="container">
        <div class="col-md-12">
            <div class="search-results">
                <mark class="search-results-count">
                    <strong class="search-results-header-counter">{{number_format((float)$user->advertuser()->count(),0,".",".")}}</strong>

                </mark>
                <h1 class="search-title"> Imovéis de {{$user->name}}</h1>
            </div>
        </div>
        <div class="col-md-12 hidden-lg hidden-md">
            <button id="btn-pesquisa" class="center-block btn-search">
                Filtros
            </button>
        </div>
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
        <div style="margin-bottom: 12px" class="col-md-12 col-xs-12 col-sm-12 center-block">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- header responsivo imoveis -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9276435422488602"
                 data-ad-slot="7022965179"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <form action=""  id="formSearchImoveis" class="ajax">
                <input type="hidden" name="id_user" value="{{$user->id}}" />

                <div id="nav-lateral" class="col-md-2 col-sm-2 no-padding ">
                    <button id="btn-close-nav" type="button" class="close">X</button>
                    <div class="area-pesquisa">
                        <!--<section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa">Localização</h5>

                           <input name="cidade" id="location" value="" autocomplete="off" type="text" class="form-control search-results-input  pl3" placeholder="Incluir Cidade">
                            <ul id="listaCidades" class="lista-cidade-search"></ul>

                        </section> -->
                        <section class="clearfix sessao-area-filtro bg-branco">
                            <h5 class="sessao-texto-pesquisa">Tipo de imóvel</h5>
                            <select  name="subcategoria" class="search-results-select search-results-select-img escolhaAcomodacao">
                                <option value="">Seleciona uma opção</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" id="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa">Modalidade</h5>
                            <select  name="tipo_anuncio" class="search-results-select search-results-select-img escolhaAcomodacao">
                                <option value="" selected>Seleciona uma opção</option>
                                <option value="venda" >Comprar</option>
                                <option value="aluga">Alugar</option>
                            </select>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa">Preço</h5>
                            <label class="sessao-area-filtro-label preco-corrente">
                                Mínimo
                                <input type="text" placeholder="0" name="min_price" id="min_price" onkeypress="mascaraCampo(this, mvalor2)"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                            </label>
                            <label class="sessao-area-filtro-label preco-corrente">
                                Máximo
                                <input onkeypress="mascaraCampo(this, mvalor2)" type="text" name="max_price" placeholder="0"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                            </label>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa">Área</h5>
                            <label class="sessao-area-filtro-label area-corrente">
                                Mínimo
                                <input type="text" onkeypress="mascaraCampo(this, mvalor2)" name="min_area" placeholder="0" value="" class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                            </label>
                            <label class="sessao-area-filtro-label area-corrente">
                                Máximo
                                <input type="text" name="max_area" onkeypress="mascaraCampo(this, mvalor2)" placeholder="0" value="" class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                            </label>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa hidden">Cômodos</h5>
                            <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                                Quartos
                                <select  name="num_quartos" id="numQuartos" class="search-results-select numeric-select escolhaAcomodacao">
                                    <option selected="selected" value="0">-</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>

                                </select>
                            </label>
                            <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                                Banheiros
                                <select name="num_banheiros" id="numBanheiros" class="search-results-select numeric-select escolhaAcomodacao">
                                    <option selected="selected" value="0">-</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>

                                </select>
                            </label>
                            <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px" >
                                Vagas
                                <select id="numVagas" name="num_vagas" class="search-results-select numeric-select escolhaAcomodacao">
                                    <option selected="selected" value="0">-</option>
                                    <option value="1">1+</option>
                                    <option value="2">2+</option>
                                    <option value="3">3+</option>
                                    <option value="4">4+</option>
                                </select>
                            </label>
                        </section>
                    </div>
                </div>

                <div class="col-md-10 col-sm-12">
                    <div class="before"></div>
                    <div class="row" id="resultSearch">
                        <div class="col-md-12">
                            <div id="products" class="list-group">
                                <?php $contador = 0; ?>
                                @foreach($user->advertuser()->get() as $advert)
                                    <?php $contador+=1;?>
                                    @if($contador > 12)
                                        <?php $contador = 0;?>
                                        <div style="margin-bottom: 20px" class="item  col-xs-12 col-sm-12 col-lg-12 col-md-12 bloco-item">
                                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                            <!-- imoveis -->
                                            <ins class="adsbygoogle"
                                                 style="display:block"
                                                 data-ad-client="ca-pub-9276435422488602"
                                                 data-ad-slot="4429425578"
                                                 data-ad-format="auto"></ins>
                                            <script>
                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                            </script>
                                        </div>
                                    @endif
                                    <div class="item  col-xs-12 col-sm-6 col-lg-4 col-md-4 bloco-item">
                                        <a class="item-total" href="{{url('/')}}/anuncio/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{str_slug($advert->url_anuncio)}}" >
                                            <div class="thumbnail">
                                                @if(count($advert->images))
                                                    <?php
                                                    $pos = strpos($advert->images()->first()->extension, "imoveis/img");
                                                    $url1 = "";
                                                    if ($pos === false) {
                                                        $url1 = 'gallery/'.$advert->images()->first()->extension;
                                                    } else {
                                                        $url1 = "galeria/".$advert->images()->first()->extension;
                                                    }
                                                    ?>
                                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                                @else
                                                    <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                                @endif
                                                <div class="caption infos-suggest">
                                                    <h4 class="group inner list-group-item-heading text-bairro">{{$advert->cidade}}<br />
                                                        {{$advert->estado}}
                                                    </h4>
                                                    <p class="group inner list-group-item-text">
                                                    <ul class="list-infos unstyled clearfix no-padding" id="tooltip-config">
                                                        <li class="icone-quartos zaptip" data-original-title="Quantidade de quartos" data-toggle="tooltip">{{$advert->advertImovel->numero_quarto}}</li>
                                                        <li class="icone-suites zaptip" data-original-title="Quantidade de suítes" data-toggle="tooltip">{{$advert->advertImovel->numero_banheiro}}</li>
                                                        <li class="icone-vagas zaptip" data-original-title="Quantidade de vagas" data-toggle="tooltip">{{$advert->advertImovel->numero_garagem}}</li>

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
                                                                <span class="val-imovel">R$ {{number_format((float)$advert->preco,2,",",".")}}</span>
                                                                <span class="text-diaria">@if($advert->tipo_anuncio == 'aluga')/ mês @elseif($advert->tipo_anuncio == 'venda') / venda @endif</span>
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
                            <div class='text-center'>
                                <div id="loading-page"><img alt="Loading..." src="http://www.infinite-scroll.com/loading.gif"><div><div class="carregamento-anuncio">Carregando anúncios...</div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection