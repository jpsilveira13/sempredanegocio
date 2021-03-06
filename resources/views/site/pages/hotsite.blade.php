@extends('site.layout')

@section('content')
</div>
</div>

@if(\Input::get('page'))
    <div id="recarregaPagina" class="clearfix"></div>

@endif
<div class="col-md-12 col-lg-12 hidden-sm hidden-xs no-padding">
    <div class="header-logo-minisite @if($user->typeuser_id == 5) bg-car @endif">
        @if($user->typeuser_id < 5)
            <div class="minisite-area-logo">
                <h1 class="area-logo-titulo">
                    <img src="{{$user->avatar}}" title="{{$user->name}}" />
                    <aside>Registro CRECI: {{$user->creci}} </aside>
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

        @elseif($user->typeuser_id == 5)
            <div class="minisite-area-logo">
                <h1 class="area-logo-titulo">
                    <img src="{{$user->avatar}}" title="{{$user->name}}" />
                    <!--<aside>Registro garage: MGF-17423 </aside> -->
                </h1>
                <p class="minisite-diamente minisite-diamante-upper pula-linha">
                    {{$advertVenda}}<br />Carros a <b> venda</b>
                </p>
                <p class="minisite-diamente minisite-diamante-lower pula-linha">
                    {{$advertAluga}}<br />Carros para <b> Aluguel</b>
                </p>
                <p class="minisite-diamente-count pula-linha">
                    {{$user->advertuser()->count()}}<br /> carros no portal
                </p>
            </div>
        @endif

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
                @if(!empty($user->phone))
                    <dt>Telefone:</dt>
                    <dd class="agente-minisite-sprited agente-minisite-telefone ">
                        <span itemprop="telephone">{{$user->phone}}</span>
                    </dd>
                @endif
                @if(!empty($user->email))
                    <dt>Email:</dt>
                    <dd class="agente-minisite-sprited agente-minisite-email">
                        <span itemprop="email"> {{$user->email}}</span>
                    </dd>
                @endif
                @if(!empty($user->address))
                    <dt>Endereço:</dt>
                    <dd itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="agente-minisite-sprited agente-minisite-local">
                        <span itemprop="streetAddress">{{$user->address}}</span>
                    </dd>
                @endif
            </dl>

            <?php $i = 0?>
            @if(empty($user->advertuser()->get()))
                saaa
            @else
                @foreach($user->advertuser()->get() as $advert)
                    <?php $i++ ?>
                    @if($i < 5)
                        <a class="menu-show" href="{{url('/')}}/anuncio/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{$advert->url_anuncio}}">
                            <article class="minisite-anuncio-destaque">
                                @if($advert->imagecapa)
                                    <?php
                                    $pos = strpos($advert->imagecapa()->first()->extension, "imoveis/site/");

                                    $url1 = "";
                                    if ($pos === false) {

                                    $url1 = $advert->imagecapa()->first()->extension;
                                    ?>
                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                    <?php }else{
                                    $url1 = "galeria/".$advert->imagecapa()->first()->extension;
                                    ?>
                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                    <?php }?>

                                @elseif(count($advert->images))
                                    <?php
                                    $pos = strpos($advert->images()->first()->extension, "imoveis/site/");

                                    $url1 = "";
                                    if ($pos === false) {

                                    $url1 = $advert->images()->first()->extension;
                                    ?>
                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                    <?php }else{
                                    $url1 = "galeria/".$advert->images()->first()->extension;
                                    ?>
                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                    <?php }?>

                                @else
                                    <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                @endif
                                @if($advert->advertImovel != null)
                                    <div class="minisite-anuncio-destaque-descricao">
                                        <span class="minisite-anuncio-destaque-bairro">{{$advert->bairro}}</span>
                                        <p class="minisite-anuncio-destaque-detalhes">@if($advert->preco != 0)R$ {{number_format((float)$advert->preco,2,",",".")}} @else Sob consulta @endif - {{$advert->advertImovel->area_construida}} m2 - {{$advert->advertImovel->numero_quarto}} quarto </p>
                                        <p class="minisite-anuncio-destaque-localizacao">
                                            @if($advert->active == 0)
                                                {{$advert->rua}} - @if($advert->numero){{$advert->numero}}@else @endif
                                            @endif
                                        </p>
                                        <div>
                                            <button class="minisite-anuncio-destaque-contato contatoBtn">Contato / Ver Detalhe</button>
                                        </div>
                                    </div>
                                @endif
                                @if($advert->advertVeiculo != null)
                                    <div class="minisite-anuncio-destaque-descricao">
                                        <span class="minisite-anuncio-destaque-bairro">{{$advert->bairro}}</span>
                                        <p class="minisite-anuncio-destaque-detalhes">R$ {{number_format((float)$advert->preco,2,",",".")}} - {{$advert->advertVeiculo->portas}} portas - {{$advert->advertVeiculo->km}} KM </p>
                                        <p class="minisite-anuncio-destaque-localizacao">
                                            {{$advert->rua}} - @if($advert->numero){{$advert->numero}}@else @endif
                                        </p>
                                        <div>
                                            <button class="minisite-anuncio-destaque-contato contatoBtn">Contato / Ver Detalhe</button>
                                        </div>
                                    </div>
                                @endif
                            </article>
                        </a>
                    @endif
                @endforeach
            @endif

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
                @if($user->typeuser_id < 5)
                    <h1 class="search-title"> Imovéis de {{$user->name}}</h1>
                @elseif($user->typeuser_id == 5)
                    <h1 class="search-title"> Veículos de {{$user->name}}</h1>

                @endif
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
            @if($user->typeuser_id < 5)
                <form action=""  id="searchHotImoveis" class="ajax">
                    <input type="hidden" value="1" name="status" />
                    <input type="hidden" value="{{$user->id}}" name='user_id' />
                    <input type="hidden" value="{{\Input::get('page')}}" name="page" />
                    <div id="nav-lateral" class="col-md-2 col-sm-2 no-padding">
                        <div class="area-pesquisa">
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Localização</h5>
                                <div class="filter-search">
                                    <i class="filter-search__title icon-search fa fa-search fa-2x"></i>
                                    <input name="cidade" id="location" value="{{\Input::get('cidade')}}"  autocomplete="off" type="text" class="filter-search__field form-control" placeholder="Incluir Cidade">
                                    <ul id="listaCidades" class="arrumaAnuncio lista-cidade-search"></ul>
                                </div>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Bairro</h5>
                                <input readonly name="bairro" id="bairro" value="{{\Input::get('bairro')}}" autocomplete="off" type="text" class="form-control search-results-input  pl3" placeholder="Incluir Bairro">
                                <ul id="listaBairros" class="lista-cidade-search"></ul>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco">
                                <h5 class="sessao-texto-pesquisa">Tipo de imóvel</h5>
                                <select   value="<?=(Session::get('subcategoria'))?> "name="subcategoria" class="search-results-select search-results-select-img escolhaAcomodacao">
                                    <option value="">Todos</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" id="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Modalidade</h5>
                                <select  value="<?=(Session::get('tipo_anuncio'))?>" name="tipo_anuncio" class="search-results-select search-results-select-img escolhaAcomodacao">

                                    @if(\Input::get('transacao') == 'venda')
                                        <option value="">Todos</option>
                                        <option selected value="venda">Comprar</option>
                                        <option value="aluga">Alugar</option>
                                    @elseif(!\Input::get('transacao'))
                                        <option selected value="">Todos</option>
                                        <option value="venda">Comprar</option>
                                        <option value="aluga">Alugar</option>
                                    @else
                                        <option value="">Todos</option>
                                        <option value="venda">Comprar</option>
                                        <option value="aluga" selected>Alugar</option>
                                    @endif

                                </select>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Preço</h5>
                                <label class="sessao-area-filtro-label preco-corrente">
                                    Mínimo
                                    <input type="text" value="<?=(Session::get('min_price'))?>" placeholder="R$" name="min_price" id="min_price" onkeypress="mascaraCampo(this, mvalor2)"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                                </label>
                                <label class="sessao-area-filtro-label preco-corrente">
                                    Máximo
                                    <input onkeypress="mascaraCampo(this, mvalor2)" type="text" name="max_price" placeholder="R$" value="<?=(Session::get('max_price'))?>"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                                </label>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Área</h5>
                                <label class="sessao-area-filtro-label area-corrente">
                                    Mínimo
                                    <input type="text" onkeypress="mascaraCampo(this, mvalor2)" name="min_area" placeholder="m²" value="<?=(Session::get('min_area'))?>" class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                                </label>
                                <label class="sessao-area-filtro-label area-corrente">
                                    Máximo
                                    <input type="text" name="max_area" onkeypress="mascaraCampo(this, mvalor2)" placeholder="m²" value="<?=(Session::get('max_area'))?>" class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                                </label>
                            </section>
                            <section style="padding-bottom: 56px" class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa hidden">Cômodos</h5>
                                <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                                    Quartos
                                    <select value="<?=(Session::get('num_quartos'))?>" name="num_quartos" id="numQuartos" class="search-results-select numeric-select escolhaAcomodacao">
                                        <option selected="selected" value="0">-</option>
                                        <option value="1">1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>

                                    </select>
                                </label>
                                <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                                    Banheiros
                                    <select value="<?=(Session::get('num_banheiros'))?>" name="num_banheiros" id="numBanheiros" class="search-results-select numeric-select escolhaAcomodacao">
                                        <option selected="selected" value="0">-</option>
                                        <option value="1">1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                    </select>
                                </label>
                                <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px" >
                                    Vagas
                                    <select value="<?=(Session::get('num_vagas'))?>" id="numVagas" name="num_vagas" class="search-results-select numeric-select escolhaAcomodacao">
                                        <option selected="selected" value="0">-</option>
                                        <option value="1">1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                    </select>
                                </label>
                            </section>
                            <fieldset id="aplicaFiltro" class="site-main__view-results filter-view-results">
                                <p>
                                    <a id="btn-close-nav"  class="filter-view-results__button filter-view-results__button-apply icon-after-arrow-bd-up js-toggleResultFilters">APLICAR FILTROS</a>
                                </p>
                            </fieldset>
                        </div>
                    </div>
                </form>
            @section('jsimovel')
                <script src="{{asset('js/searchHotImo.js')}}"></script>
            @endsection
            @endif
            @if($user->typeuser_id == 5)
                <form action=""  id="searchHotVeiculos" class="ajax">
                    <input type="hidden" value="1" name="status" />
                    <input type="hidden" value="{{$user->id}}" name='user_id' />
                    <div id="nav-lateral" class="col-md-2 col-sm-2 no-padding ">
                        <div class="area-pesquisa">
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Localização</h5>
                                <div class="filter-search">
                                    <i class="filter-search__title icon-search fa fa-search fa-2x"></i>
                                    <input name="cidade" id="location" value="{{\Input::get('cidade')}}"  autocomplete="off" type="text" class="filter-search__field form-control" placeholder="Incluir Cidade">
                                    <ul id="listaCidades" class="arrumaAnuncio lista-cidade-search"></ul>
                                </div>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco">
                                <h5 class="sessao-texto-pesquisa">Tipo de Veículos</h5>
                                <select value="<?=(Session::get('subcategories_id'))?>" id="subcategory" name="subcategories_id" class="search-results-select search-results-select-img escolhaAcomodacao">
                                    <option value="">Seleciona uma opção</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" id="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco">
                                <h5 class="sessao-texto-pesquisa">Seleciona a Marca</h5>
                                <select  id="veiculos" value="<?=(Session::get('marca_id'))?>" name="marca_id" class="search-results-select search-results-select-img escolhaAcomodacao">
                                    <option value="">Seleciona uma opção</option>

                                </select>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco">
                                <h5 class="sessao-texto-pesquisa">Seleciona o Modelo</h5>
                                <select id="modelo" name="modelo_id" value="<?=(Session::get('modelo_id'))?>" class="search-results-select search-results-select-img escolhaAcomodacao">
                                    <option value="" selected="selected">Todos</option>
                                </select>
                            </section>
                            <section  class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Ano veículo</h5>
                                <label class="sessao-area-filtro-label preco-corrente">
                                    Ano início
                                    <input type="text" placeholder="ex.:1995"  value="<?=(Session::get('ano_inicio'))?>" name="ano_inicio" id="ano_inicio" class="search-results-input escolhaAcomodacao" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="4">
                                </label>
                                <label class="sessao-area-filtro-label preco-corrente">
                                    Ano final
                                    <input type="text" placeholder="ex.:2016" onkeypress="mascaraCampo(this, mascSoNumeros)"  value="<?=(Session::get('ano_final'))?>" name="ano_final" class="search-results-input escolhaAcomodacao" maxlength="4">
                                </label>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Modalidade</h5>
                                <select  value="<?=(Session::get('tipo_anuncio'))?>" name="tipo_anuncio" class="search-results-select search-results-select-img escolhaAcomodacao">

                                    @if(\Input::get('transacao') == 'venda')
                                        <option selected value="venda">Comprar</option>
                                        <option value="aluga">Alugar</option>
                                    @elseif(!\Input::get('transacao'))
                                        <option selected value="">Todos</option>
                                        <option value="venda">Comprar</option>
                                        <option value="aluga">Alugar</option>
                                    @else
                                        <option value="venda">Comprar</option>
                                        <option value="aluga" selected>Alugar</option>
                                    @endif

                                </select>
                            </section>
                            <section style="padding-bottom: 60px" class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Preço</h5>
                                <label class="sessao-area-filtro-label preco-corrente">
                                    Mínimo
                                    <input type="text" placeholder="0" value="<?=(Session::get('min_price'))?>" name="min_price" id="min_price" onkeypress="mascaraCampo(this, mvalor2)"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                                </label>
                                <label class="sessao-area-filtro-label preco-corrente">
                                    Máximo
                                    <input onkeypress="mascaraCampo(this, mvalor2)" type="text" name="max_price" placeholder="0" value="<?=(Session::get('max_price'))?>"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                                </label>
                            </section>
                            <fieldset id="aplicaFiltro" class="site-main__view-results filter-view-results">
                                <p>
                                    <a id="btn-close-nav"  class="filter-view-results__button filter-view-results__button-apply icon-after-arrow-bd-up js-toggleResultFilters">APLICAR FILTROS</a>
                                </p>
                            </fieldset>
                        </div>
                    </div>
                </form>
            @section('jsveiculo')
                <script src="{{asset('js/searchHotVeiculo.js')}}"></script>
            @endsection
            @endif
            <div class="col-md-10 col-sm-12">
                <div class="before"></div>
                <div class="row" id="resultSearch">
                    <div class="col-md-12">
                        <div id="products" class="list-group">
                            <?php $contador = 0; ?>
                            @foreach($advertUser as $advert)
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
                                    @if(!empty(auth()->user()->id))

                                        @if(count(auth()->user()->id) > 0 && auth()->user()->id == $advert->user_id || auth()->user()->typeuser_id == 1 )
                                            <span class="contador-visita"><i class="fa fa-eye" aria-hidden="true"></i> {{$advert->advert_count}}</span>
                                        @endif
                                    @endif
                                    <a class="item-total" href="{{url('/')}}/anuncio/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{str_slug($advert->url_anuncio)}}" >
                                        <div class="thumbnail">
                                            @if($advert->imagecapa)
                                                <?php
                                                $pos = strpos($advert->imagecapa->extension, "imoveis/site/");
                                                $url1 = "";
                                                if ($pos === false) {

                                                $url1 = $advert->imagecapa->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }else{
                                                $url1 = "galeria/".$advert->imagecapa->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }?>

                                            @elseif(count($advert->images))
                                                <?php
                                                $pos = strpos($advert->images()->first()->extension, "imoveis/site/");

                                                $url1 = "";
                                                if ($pos === false) {

                                                $url1 = $advert->images()->first()->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }else{
                                                $url1 = "galeria/".$advert->images()->first()->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }?>

                                            @else
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                            @endif

                                            @if($advert->advertImovel != null)
                                                <div class="caption infos-suggest">
                                                    <h4 class="group inner list-group-item-heading text-bairro">{{$advert->cidade}} - {{$advert->estado}} <br /> {{$advert->bairro}}

                                                    </h4>
                                                    <p class="group inner list-group-item-text">
                                                    <ul class="list-infos unstyled clearfix no-padding" id="tooltip-config">
                                                        <li class="icone-quartos zaptip" data-original-title="Quantidade de quartos" data-toggle="tooltip">@if(!empty($advert->advertImovel->numero_quarto)) {{$advert->advertImovel->numero_quarto}} @else -- @endif</li>
                                                        <li class="icone-suites zaptip" data-original-title="Quantidade de suítes" data-toggle="tooltip">@if(!empty($advert->advertImovel->numero_banheiro)) {{$advert->advertImovel->numero_banheiro}} @else -- @endif</li>
                                                        <li class="icone-vagas zaptip" data-original-title="Quantidade de vagas" data-toggle="tooltip">@if(!empty($advert->advertImovel->numero_garagem)) {{$advert->advertImovel->numero_garagem}} @else -- @endif</li>

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
                                                                <span class="val-imovel">@if($advert->preco != 0)R$ {{number_format((float)$advert->preco,2,",",".")}} @else Sob consulta @endif</span>
                                                                @if($advert->preco != 0)
                                                                    <span class="text-diaria">@if($advert->tipo_anuncio == 'aluga')/ mês @elseif($advert->tipo_anuncio == 'venda') / venda @endif</span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4 col-md-4 fr">
                                                            <div class="acoes-minifichas-sugestoes">
                                                                <span class="addicon btnFavorito4090308 icone-favoritada pull-right fvestilo"  data-toggle="tooltip" data-placement="top" data-original-title="Adicionar à minha lista"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($advert->advertVeiculo != null)
                                                <div class="caption infos-suggest">
                                                    <h4 class="group inner list-group-item-heading text-bairro">{{$advert->advertVeiculo->modelo}}<br />
                                                        {{$advert->advertVeiculo->marca}}
                                                    </h4>
                                                    <p class="group inner list-group-item-text">
                                                    <div class="features">
                                                        <div>
                                                            <span><i class="spr-resultado-busca ico-year"></i>{{$advert->advertVeiculo->ano}}</span>
                                                            <span><i class="spr-resultado-busca ico-combustivel"></i> @if($advert->advertVeiculo->combustivel == "Gasolina e álcool") Flex @else {{$advert->advertVeiculo->combustivel}} @endif</span>
                                                        </div>
                                                        <div>
                                                            <span><i class="spr-resultado-busca ico-km"></i>{{$advert->advertVeiculo->km}}</span>
                                                            <span><i class="spr-resultado-busca ico-shift"></i>{{$advert->advertVeiculo->cambio}}</span>
                                                        </div>
                                                    </div>
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
                                            @endif

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class='text-center'>
                            <div id="page-selection"></div>
                            {!! $advertUser->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection