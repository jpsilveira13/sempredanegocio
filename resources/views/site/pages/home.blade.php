@extends('site.layout')
@section('menu-area')
@endsection
@section('categories')
    @include('site.pages.categorias_home')
@stop
@section('content')
    <br />
    <div class="row">
        <div class="col-md-12 col-lg-12 hidden-sm hidden-xs banner-propaganda">
            <img src="{{asset('images/bannerTeste2.jpg')}}"  alt="Propaganda" />
        </div>
    </div>
    <div class="row">

        @if (session('status'))
            <div class="col-md-12">

                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            </div>

        @endif
    </div>
    <div class="col-md-11">
        <div class="well well-sm hidden-xs hidden-sm">
            <strong>Exibir como </strong>
            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                 </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="glyphicon glyphicon-th"></span>Grade</a>
            </div>
        </div>
        <section class="sugestao-anuncio">
            <h2>Sugestões de anúncios para você</h2>

            <div id="products" class="row list-group">
                @foreach($adverts as $advert)
                    <div class="item  col-xs-12 col-sm-6 col-lg-3 col-md-3 bloco-item">
                        <a class="item-total" href="{{asset('imoveis/1/teste')}}" >
                            <div class="thumbnail">
                                <?=$advert->images->extension ?>
                                @if(count($advert->images()))
                                    <img class="group list-group-image content-img-sugestao" src="" width="220" height="229" alt="titulo imagem" />
                                @else
                                    <img class="group list-group-image content-img-sugestao" src="http://imagens.zapcorp.com.br/imoveis/761283/zap296020/35549b74-f1f2-48cf-8c4a-aa82b84834ee_m.jpg" width="220" height="229" alt="titulo imagem" />
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
                                            tipo
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
                                                <span class="val-imovel">R$ {{$advert->preco}}</span>
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
    </div>
    <div class="col-lg-1 col-md-1 hidden-xs hidden-sm" >
        <div class="area-banner-lateral">
            <img src="{{asset('images/bannerTeste1.jpg')}}" alt="Banner teste 1"/>
        </div>
    </div>
@endsection