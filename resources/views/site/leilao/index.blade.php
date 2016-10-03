@extends('site.layout')

@section('content')
</div>
</div>

@if(\Input::get('page'))
    <div id="recarregaPagina" class="clearfix"></div>

@endif

@foreach($veiculos as $veiculo)
    {{$veiculo->leilao['id']}}
    @endforeach
<div class="clearfix"></div>
<div class="row no-margin">
    <div class="container">
        <div class="col-md-12">
            <div class="search-results">
                <mark class="search-results-count">
                    <strong class="search-results-header-counter">{{number_format((float)$veiculos->count(),0,".",".")}}</strong>

                </mark>

                <h1 class="search-title">  Ofertas</h1>

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

            <form action=""  id="searchHotVeiculos" class="ajax">
                <input type="hidden" value="1" name="status" />

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
            <div class="col-md-10 col-sm-12">
                <div class="before"></div>
                <div class="row" id="resultSearch">
                    <div class="col-md-12">
                        <div id="products" class="list-group">

                            <?php $contador = 0;?>
                            @foreach($veiculos as $veiculo)
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

                                    <a class="item-total" href="{{url('/')}}/oferta/{{$veiculo->advertVeiculo->id}}/{{str_slug($veiculo->advertVeiculo->url_anuncio)}}" >
                                        <div class="thumbnail">
                                            @if($veiculo->advertVeiculo->imagecapa)
                                                <?php
                                                $pos = strpos($veiculo->advertVeiculo->imagecapa->extension, "imoveis/site/");
                                                $url1 = "";
                                                if ($pos === false) {

                                                $url1 = $veiculo->advertVeiculo->imagecapa->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }else{
                                                $url1 = "galeria/".$veiculo->advertVeiculo->imagecapa->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }?>

                                            @elseif(count($veiculo->advertVeiculo->images))
                                                <?php
                                                $pos = strpos($veiculo->advertVeiculo->images()->first()->extension, "imoveis/site/");

                                                $url1 = "";
                                                if ($pos === false) {

                                                $url1 = $veiculo->advertVeiculo->images()->first()->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }else{
                                                $url1 = "galeria/".$veiculo->advertVeiculo->images()->first()->extension;
                                                ?>
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                                <?php }?>

                                            @else
                                                <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                            @endif
                                            <div class="caption infos-suggest">
                                                <h4 class="group inner list-group-item-heading text-bairro">{{$veiculo->modelo}}<br />
                                                    {{$veiculo->marca}}
                                                </h4>
                                                <p class="group inner list-group-item-text">
                                                <div class="features">
                                                    <div>
                                                        <span><i class="spr-resultado-busca ico-year"></i>{{$veiculo->ano}}</span>
                                                        <span><i class="spr-resultado-busca ico-combustivel"></i> @if($veiculo->combustivel == "Gasolina e álcool") Flex @else {{$veiculo->combustivel}} @endif</span>
                                                    </div>
                                                    <div>
                                                        <span><i class="spr-resultado-busca ico-km"></i>{{$veiculo->km}}</span>
                                                        <span><i class="spr-resultado-busca ico-shift"></i>{{$veiculo->cambio}}</span>
                                                    </div>
                                                </div>
                                                <!-- essa div só ficara visivel quando for lista -->
                                                <div class="col-xs-12 col-md-12 list-item-nav2">
                                                    <p class="lead description-anuncio">
                                                        {{str_limit($veiculo->advertVeiculo->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                    </p>
                                                </div>

                                                <div class="row list-group-hidden">
                                                    <div class="col-xs-12 col-md-12">
                                                        <p class="lead description-anuncio">
                                                            {{str_limit($veiculo->advertVeiculo->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row mb4">
                                                    <div class="col-xs-12 col-md-12">
                                                        <div class="bottom-suggest">
                                                            <span class="text-effect val-imovel">@if($veiculo->preco_leilao == 0) R$ {{number_format((float)$veiculo->preco_min,2,",",".")}} / lance atual @else R$ {{number_format((float)$veiculo->preco_leilao,2,",",".")}} / lance atual  @endif</span>
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
                            <div id="page-selection"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection