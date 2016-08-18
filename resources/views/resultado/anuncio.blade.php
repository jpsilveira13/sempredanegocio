@extends('site.layout')

@section('content')
</div><!-- fechamento da div row que esta dentro do layout -->
</div><!-- fechamento da container  que esta dentro do layout -->


@if(count($queryAnuncios) > 0)
    <div id="recarregaPagina" class="clearfix"></div>
    <div class="row no-margin">
        <div id="containerPesquisa" class="container">
            <div class="col-md-12">
                <div class="search-results">
                    <mark class="search-results-count">
                        <strong class="search-results-header-counter">{{number_format((float)$queryCount,0,".",".")}}</strong>

                    </mark>
                    <h1 class="search-title"> Anúncios Encontrados</h1>
                </div>
            </div>
            <div class="col-md-12 hidden-md hidden-lg">
                <button id="btn-pesquisa" class="center-block btn-search">
                    FILTRAR RESULTADOS
                </button>
            </div>
            <!--<div style="margin-bottom: 12px" class="col-md-12 col-xs-12 col-sm-12 center-block">
                <a class="Anuncie aqui" target="_blank" title="Anuncie aqui" href="{{url('seja-parceiro')}}"> <img src="{{url('images/bannerImo.png')}}" class="img-responsive center-block" /></a>
            </div>-->
            <div style="margin-bottom: 12px" class="col-md-12 col-xs-12 col-sm-12 center-block">
                <a class="Anuncie aqui" target="_blank" title="Anuncie aqui" href="{{url('/anuncio/venda/2372304/ayat-club-residence')}}"> <img src="{{url('images/bg-hindy.jpg')}}" class="img-responsive center-block" /></a>
            </div>
            <br />
            <div class="clearfix"></div>
            <div class="row">
                <form action=""  id="formSearchImoveis" class="ajax">
                    <input type="hidden" value="1" name="status" />
                    <input type="hidden" value="{{\Input::get('page')}}" name="page" id="page" />
                    <input type="hidden" value="1" name="categoria" />

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
                                    <option value="">Seleciona uma opção</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" id="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </section>
                            <section class="clearfix sessao-area-filtro bg-branco ">
                                <h5 class="sessao-texto-pesquisa">Modalidade</h5>
                                <select  value="<?=(Session::get('tipo_anuncio'))?>" name="tipo_anuncio" class="search-results-select search-results-select-img escolhaAcomodacao">

                                    @if(\Input::get('transacao') == 'venda')
                                        <option selected value="venda">Comprar</option>
                                        <option value="aluga">Alugar</option>
                                    @elseif(!\Input::get('transacao'))
                                        <option selected value="">Seleciona uma opção</option>
                                        <option value="venda">Comprar</option>
                                        <option value="aluga">Alugar</option>
                                    @else
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
                    <div class="col-md-10 col-sm-12">
                        <div class="before"></div>
                        <div class="row" id="resultSearch">
                            <div id="products"  class="list-group">
                                <?php $contador = 0; ?>

                                @foreach($queryAnuncios as $queryAnuncio)
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
                                            @if(count(auth()->user()) > 0 && auth()->user()->id == $queryAnuncio->user_id )
                                                <span class="contador-visita"><i class="fa fa-eye" aria-hidden="true"></i> {{$queryAnuncio->advert_count}}</span>
                                            @endif
                                        @endif
                                        <a class="item-total" href="{{url('/')}}/anuncio/{{$queryAnuncio->tipo_anuncio}}/{{$queryAnuncio->id}}/{{str_slug($queryAnuncio->url_anuncio)}}" >
                                            <div class="thumbnail">

                                                @if(count($queryAnuncio->images))

                                                    <?php
                                                    $pos = strpos($queryAnuncio->images()->first()->extension, "amazonaws.com");

                                                    $url1 = "";
                                                    if ($pos === false) {

                                                    $url1 = "galeria/".$queryAnuncio->images()->first()->extension;

                                                    ?>
                                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                                    <?php }else{
                                                    $url1 = $queryAnuncio->images()->first()->extension;
                                                    ?>
                                                    <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                                    <?php }?>

                                                @else
                                                    <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                                @endif

                                                <div class="caption infos-suggest">
                                                    <h4 class="group inner list-group-item-heading text-bairro">{{$queryAnuncio->cidade}}<br />
                                                        {{$queryAnuncio->estado}}
                                                    </h4>
                                                    <p class="group inner list-group-item-text">
                                                    <ul class="list-infos unstyled clearfix no-padding" id="tooltip-config">
                                                        <li class="icone-quartos zaptip" data-original-title="Quantidade de quartos" data-toggle="tooltip"> {{$queryAnuncio->advertImovel->numero_quarto}}</li>
                                                        <li class="icone-suites zaptip" data-original-title="Quantidade de suítes" data-toggle="tooltip"> {{$queryAnuncio->advertImovel->numero_banheiro}}</li>
                                                        <li class="icone-vagas zaptip" data-original-title="Quantidade de vagas" data-toggle="tooltip"> {{$queryAnuncio->advertImovel->numero_garagem}}</li>
                                                    </ul>
                                                    <!-- essa div só ficara visivel quando for lista -->
                                                    <div class="col-xs-12 col-md-12 list-item-nav2">
                                                        <p class="lead description-anuncio">
                                                            {{str_limit($queryAnuncio->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                        </p>
                                                    </div>

                                                    <div class="row list-group-hidden">
                                                        <div class="col-xs-12 col-md-12">
                                                            <p class="lead description-anuncio">
                                                                {{str_limit($queryAnuncio->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb4">
                                                        <div class="col-xs-8 col-md-8 ">
                                                            <div class="bottom-suggest">
                                                                <span class="val-imovel">R$ {{number_format((float)$queryAnuncio->preco,2,",",".")}}</span>
                                                                <span class="text-diaria">@if($queryAnuncio->tipo_anuncio == 'aluga') / mês @else  @endif </span>
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
                                <div id="page-selection"></div>
                            </div>
                            @else
                                Nao achou nenhum resultado ;/
                            @endif
                        </div>
                    </div>

            </div>
            </form>
        </div>

    </div>
    </div>

    @endsection