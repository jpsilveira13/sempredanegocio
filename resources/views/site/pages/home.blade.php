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
            <img src="{{asset('images/bannerTeste2.jpg')}}" alt="Propaganda" />
        </div>
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
                @for($i = 0;$i<10;$i++)
                    <div class="item  col-xs-12 col-sm-6 col-lg-3 col-md-3 bloco-item">
                        <a class="item-total" href="{{asset('imoveis/1/teste')}}" >
                            <div class="thumbnail">

                                <img class="group list-group-image content-img-sugestao" src="http://imagens.zapcorp.com.br/imoveis/761283/zap296020/35549b74-f1f2-48cf-8c4a-aa82b84834ee_m.jpg" alt="titulo imagem" />

                                <div class="caption infos-suggest">
                                    <h4 class="group inner list-group-item-heading text-bairro">PRAIA GRANDE<br />
                                        Arrial do Cabo
                                    </h4>
                                    <p class="group inner list-group-item-text">
                                    <ul class="list-infos unstyled clearfix no-padding" id="tooltip-config">
                                        <li class="icone-quartos zaptip" data-original-title="Quantidade de quartos" data-toggle="tooltip">4</li>
                                        <li class="icone-suites zaptip" data-original-title="Quantidade de suítes" data-toggle="tooltip">2</li>
                                        <li class="icone-vagas zaptip" data-original-title="Quantidade de vagas" data-toggle="tooltip">0</li>
                                        <li class="icone-hospedes zaptip" data-original-title="Quantidade de pessoas" data-toggle="tooltip">12</li>

                                    </ul>
                                    <!-- essa div só ficara visivel quando for lista -->
                                    <div class="col-xs-12 col-md-12 list-item-nav2">
                                        <p class="lead description-anuncio">
                                            apartamento duplex LOCALIZADO NA PRAIA GRA...
                                        </p>
                                    </div>

                                    <div class="row list-group-hidden">
                                        <div class="col-xs-12 col-md-12">
                                            <p class="lead description-anuncio">
                                                apartamento duplex LOCALIZADO NA PRAIA GRA...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb4">
                                        <div class="col-xs-6 col-md-6 ">
                                            <div class="bottom-suggest">
                                                <span class="val-imovel">R$ 300</span>
                                                <span class="text-diaria">/ diária</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-6 fr ">
                                            <div class="acoes-minifichas-sugestoes">
                                                <span class="addicon btnFavorito4090308 icone-favoritada pull-right fvestilo"  data-toggle="tooltip" data-placement="top" data-original-title="Adicionar à minha lista"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                @endfor

            </div>
        </section>
    </div>
    <div class="col-lg-1 col-md-1 hidden-xs hidden-sm" >
        <div class="area-banner-lateral">
            <img src="{{asset('images/bannerTeste1.jpg')}}" alt="Banner teste 1"/>
        </div>
    </div>
@endsection