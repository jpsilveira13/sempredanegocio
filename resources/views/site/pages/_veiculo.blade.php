@extends('site.layout')

@section('content')
</div><!-- fechamento da div row que esta dentro do layout -->
</div><!-- fechamento da container  que esta dentro do layout -->

<div class="row no-margin">
    <div class="container">
        <div class="col-md-12">
            <div class="search-results">
                <mark class="search-results-count">
                    <strong class="search-results-header-counter">{{number_format((float)$advertsCount,0,".",".")}}</strong>

                </mark>
                <h1 class="search-title"> Veículos Encontrados</h1>
            </div>
        </div>
        <div class="col-md-12 hidden-lg hidden-md">
            <button id="btn-pesquisa" class="center-block btn-search">
                Filtros
            </button>
        </div>
      <!--  <div class="col-md-6 hidden-sm hidden-xs">
            <div class="well well-sm">
                <strong>Exibir como </strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                 </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grade</a>
                </div>
            </div>
        </div> -->

        <!--<div class="col-md-6 pull-right hidden-sm hidden-xs">
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
        </div> -->
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
            <form action=""  id="formSearchVeiculos" class="ajax">
                <input type="hidden" value="1" name="status" />
                <input type="hidden" value="{{$category->id}}" name="categoria" />
                <div id="nav-lateral" class="col-md-2 col-sm-2 no-padding ">
                    <button id="btn-close-nav" type="button" class="close">X</button>
                    <div class="area-pesquisa">
                        <section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa">Localização</h5>

                            <input name="cidade" id="location" value="" autocomplete="off" type="text" class="form-control search-results-input  pl3" placeholder="Incluir Cidade">
                            <ul id="listaCidades" class="lista-cidade-search"></ul>

                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco ">
                            <h5 class="sessao-texto-pesquisa">Bairro</h5>

                            <input readonly name="bairro" id="bairro" value="" autocomplete="off" type="text" class="form-control search-results-input  pl3" placeholder="Incluir Bairro">
                            <ul id="listaBairros" class="lista-cidade-search"></ul>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco">
                            <h5 class="sessao-texto-pesquisa">Tipo de Veículos</h5>
                            <select  name="subcategoria" class="search-results-select search-results-select-img escolhaAcomodacao">
                                <option value="">Seleciona uma opção</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" id="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco">
                            <h5 class="sessao-texto-pesquisa">Seleciona a Marca</h5>
                            <select  id="veiculos" name="marca_id" class="search-results-select search-results-select-img escolhaAcomodacao">
                                <option value="">Seleciona uma opção</option>
                                @foreach($marcas as $marca)
                                    <option value="{{$marca->marca}}" id="{{$marca->marca}}">{{$marca->marca}}</option>
                                @endforeach
                            </select>
                        </section>
                        <section class="clearfix sessao-area-filtro bg-branco">
                            <h5 class="sessao-texto-pesquisa">Seleciona o Modelo</h5>
                            <select id="modelo" name="modelo_id" class="search-results-select search-results-select-img escolhaAcomodacao">
                                <option value="">Seleciona uma opção</option>
                                @foreach($modelos as $modelo)
                                    <option value="{{$modelo->modelo}}" id="{{$modelo->modelo}}">{{$modelo->modelo}}</option>
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
                                <input type="text" placeholder="0" value="{{old('min_price')}}" name="min_price" id="min_price" onkeypress="mascaraCampo(this, mvalor2)"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                            </label>
                            <label class="sessao-area-filtro-label preco-corrente">
                                Máximo
                                <input onkeypress="mascaraCampo(this, mvalor2)" type="text" name="max_price" placeholder="0"  class="search-results-input escolhaAcomodacao" data-mask-currency="true">
                            </label>
                        </section>

                    </div>
            </form>
            <!--<div class="propaganda">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9276435422488602"
                     data-ad-slot="7022965179"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div> -->
        </div>
        <div class="col-md-10 col-sm-12">
            <div class="before"></div>
            <div class="row" id="resultSearch">
                <div class="col-md-12">
                    <div id="products" class="list-group">

                        <?php $contador = 0; ?>
                        @foreach($advertVeiculos as $advertVeiculo)

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
                                <a class="item-total" href="{{url('/')}}/anuncio/{{$advertVeiculo->tipo_anuncio}}/{{$advertVeiculo->id}}/{{str_slug($advertVeiculo->url_anuncio)}}" >
                                    <div class="thumbnail heigth417">

                                        @if(count($advertVeiculo->images))
                                            <?php
                                            $pos = strpos($advertVeiculo->images()->first()->extension, "amazonaws.com");

                                            $url1 = "";
                                            if ($pos === false) {

                                            $url1 = "galeria/".$advertVeiculo->images()->first()->extension;
                                            ?>
                                            <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{url($url1)}}" width="220" height="229" alt="titulo imagem" />
                                            <?php }else{
                                            $url1 = $advertVeiculo->images()->first()->extension;
                                            ?>
                                            <img class="group list-group-image content-img-sugestao lazy transition-img" data-original="{{$url1}}" width="220" height="229" alt="titulo imagem" />
                                            <?php }?>
                                        @else
                                            <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{url('images/no-image.jpg')}}" alt="titulo imagem" />
                                        @endif
                                        <div class="caption infos-suggest">
                                            <h4 class="group inner list-group-item-heading text-bairro">{{$advertVeiculo->advertVeiculo->modelo}}<br />
                                                {{$advertVeiculo->advertVeiculo->marca}}
                                            </h4>
                                            <p class="group inner list-group-item-text">
                                            <div class="features">
                                                <div>
                                                    <span><i class="spr-resultado-busca ico-year"></i>{{$advertVeiculo->advertVeiculo->ano}}</span>
                                                    <span><i class="spr-resultado-busca ico-combustivel"></i> @if($advertVeiculo->advertVeiculo->combustivel == "Gasolina e álcool") Flex @else {{$advertVeiculo->advertVeiculo->combustivel}} @endif</span>
                                                </div>
                                                <div>
                                                    <span><i class="spr-resultado-busca ico-km"></i>{{$advertVeiculo->advertVeiculo->km}}</span>
                                                    <span><i class="spr-resultado-busca ico-shift"></i>{{$advertVeiculo->advertVeiculo->cambio}}</span>
                                                </div>
                                            </div>

                                            <!-- essa div só ficara visivel quando for lista -->
                                            <div class="col-xs-12 col-md-12 list-item-nav2">
                                                <p class="lead description-anuncio">
                                                    {{str_limit($advertVeiculo->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                </p>
                                            </div>

                                            <div class="row list-group-hidden">
                                                <div class="col-xs-12 col-md-12">
                                                    <p class="lead description-anuncio">
                                                        {{str_limit($advertVeiculo->anuncio_descricao,$limit = 42, $end=" ...")}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb4">
                                                <div class="col-xs-8 col-md-8 ">
                                                    <div class="bottom-suggest">
                                                        <span class="val-imovel val-veiculo">R$ {{number_format((float)$advertVeiculo->preco,2,",",".")}}</span>
                                                        <span class="text-diaria">@if($advertVeiculo->tipo_anuncio == 'aluga')/ mês @elseif($advertVeiculo->tipo_anuncio == 'venda') / venda @endif</span>
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
                        <div id="loading-page"><img alt="Loading..." src="{{url('images/preloaderVei.gif')}}"><div><div class="carregamento-anuncio"></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection