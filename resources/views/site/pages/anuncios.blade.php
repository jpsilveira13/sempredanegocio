@extends('site.layout')

@section('content')
</div><!-- fechamento da div row que esta dentro do layout -->
</div><!-- fechamento da container  que esta dentro do layout -->

<div id="menu-total" class="sidebar-left hide">
    <div id="menu-teste" class="left">
        <div class="col-md-2 col-sm-2">
            <div class="area-pesquisa">
                <section class="clearfix sessao-area-filtro bg-branco">
                    <h5 class="sessao-texto-pesquisa">Tipo de imóvel</h5>
                    <select  name="categoria" class="search-results-select search-results-select-img">
                        <option selected="selected">Selecionar</option>

                    </select>
                </section>
                <section class="clearfix sessao-area-filtro bg-branco ">
                    <h5 class="sessao-texto-pesquisa">Preço</h5>
                    <label class="sessao-area-filtro-label preco-corrente">
                        Mínimo
                        <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                    </label>
                    <label class="sessao-area-filtro-label preco-corrente">
                        Máximo
                        <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                    </label>
                </section>
                <section class="clearfix sessao-area-filtro bg-branco ">
                    <h5 class="sessao-texto-pesquisa">Área</h5>
                    <label class="sessao-area-filtro-label area-corrente">
                        Mínimo
                        <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                    </label>
                    <label class="sessao-area-filtro-label area-corrente">
                        Máximo
                        <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                    </label>
                </section>
                <section class="clearfix sessao-area-filtro bg-branco ">
                    <h5 class="sessao-texto-pesquisa hidden">Cômodos</h5>
                    <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                        Quartos
                        <select class="search-results-select numeric-select">
                            <option selected="selected">-</option>
                            <option value="1">1+</option>
                            <option value="1">2+</option>
                            <option value="1">3+</option>
                            <option value="1">4+</option>

                        </select>
                    </label>
                    <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                        Banheiros
                        <select class="search-results-select numeric-select">
                            <option selected="selected">-</option>
                            <option value="1">1+</option>
                            <option value="1">2+</option>
                            <option value="1">3+</option>
                            <option value="1">4+</option>

                        </select>
                    </label>
                    <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px" >
                        Vagas
                        <select class="search-results-select numeric-select">
                            <option selected="selected">-</option>
                            <option value="1">1+</option>
                            <option value="1">2+</option>
                            <option value="1">3+</option>
                            <option value="1">4+</option>

                        </select>
                    </label>


                </section>

            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row no-margin">
    <div class="container">
        <div class="col-md-12">
            <div class="search-results">
                <mark class="search-results-count">
                    <strong class="search-results-header-counter"></strong>
                    {{$advertsCount}}
                </mark>
                <h1 class="search-title"> Anúncios cadastrados</h1>
            </div>
        </div>
        <div class="col-md-12">
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
        <div class="clearfix"></div>
        <div class="row">

            <div class="col-md-2 col-sm-2 hidden-sm hidden-xs">
                <div class="area-pesquisa">
                    <section class="clearfix sessao-area-filtro bg-branco">
                        <h5 class="sessao-texto-pesquisa">Tipo de imóvel</h5>
                        <select  name="categoria" class="search-results-select search-results-select-img">
                            <option selected="selected">Selecionar</option>

                        </select>
                    </section>
                    <section class="clearfix sessao-area-filtro bg-branco ">
                        <h5 class="sessao-texto-pesquisa">Preço</h5>
                        <label class="sessao-area-filtro-label preco-corrente">
                            Mínimo
                            <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                        </label>
                        <label class="sessao-area-filtro-label preco-corrente">
                            Máximo
                            <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                        </label>
                    </section>
                    <section class="clearfix sessao-area-filtro bg-branco ">
                        <h5 class="sessao-texto-pesquisa">Área</h5>
                        <label class="sessao-area-filtro-label area-corrente">
                            Mínimo
                            <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                        </label>
                        <label class="sessao-area-filtro-label area-corrente">
                            Máximo
                            <input type="text" placeholder="0" value="" class="search-results-input" data-mask-currency="true">
                        </label>
                    </section>
                    <section class="clearfix sessao-area-filtro bg-branco ">
                        <h5 class="sessao-texto-pesquisa hidden">Cômodos</h5>
                        <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                            Quartos
                            <select class="search-results-select numeric-select">
                                <option selected="selected">-</option>
                                <option value="1">1+</option>
                                <option value="1">2+</option>
                                <option value="1">3+</option>
                                <option value="1">4+</option>

                            </select>
                        </label>
                        <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px">
                            Banheiros
                            <select class="search-results-select numeric-select">
                                <option selected="selected">-</option>
                                <option value="1">1+</option>
                                <option value="1">2+</option>
                                <option value="1">3+</option>
                                <option value="1">4+</option>

                            </select>
                        </label>
                        <label class="sessao-texto-pesquisa sessao-area-filtro-label-numeric fontsize11px" >
                            Vagas
                            <select class="search-results-select numeric-select">
                                <option selected="selected">-</option>
                                <option value="1">1+</option>
                                <option value="1">2+</option>
                                <option value="1">3+</option>
                                <option value="1">4+</option>

                            </select>
                        </label>


                    </section>

                </div>
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <div id="products" class="list-group">
                            @foreach($adverts as $advert)
                                <div class="item  col-xs-12 col-sm-6 col-lg-4 col-md-4 bloco-item">
                                    <a class="item-total" href="{{url('/')}}/anuncio/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{str_slug($advert->url_anuncio)}}" >
                                        <div class="thumbnail">
                                            @if(count($advert->images))
                                                <img class="group list-group-image content-img-sugestao lazy" src="{{url('gallery/'.$advert->images()->first()->extension)}}" width="220" height="229" alt="titulo imagem" />
                                            @else
                                                <img class="group list-group-image content-img-sugestao lazy" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
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
                    </div>
                    <div class='text-center'>
                        {!! $adverts->render() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection