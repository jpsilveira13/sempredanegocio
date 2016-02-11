@extends('site.layout')
@section('menu-area')
@endsection
@section('categories')

@stop
@section('content')
</div>
</div>


<div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
    <video class="jquery-background-video" autoplay muted loop poster="http://www.kavaliro.com/wp-content/themes/kavaliro/library/videos/work_cover.jpg">
        <source src="http://www.kavaliro.com/wp-content/themes/kavaliro/library/videos/work.mp4" type="video/mp4">
        <source src="http://www.kavaliro.com/wp-content/themes/kavaliro/library/videos/work.webmhd.webm" type="video/webm">
        <source src="http://www.kavaliro.com/wp-content/themes/kavaliro/library/videos/work.ogv" type="video/ogg">
    </video>
    <div class="video-overlay"></div>
    <div class="container text-center position-relative">
        <h2 class="hero-title">Agora ficou fácil de achar o que você procura.</h2>
        <p class="hero-description hidden-xs">
            Facilitamos sua busca pelo anúncio ideal com os melhores preços em centenas de sites.
        </p>
        <div class="row hero-search-box">
            <form class="" method="GET" action="anuncio">

                <div class="col-md-2 col-sm-2 search-input">
                    <select name="transacao" class="form-control input-lg search-second">

                        <option value="venda">Comprar</option>
                        <option value="aluga">Alugar</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 search-input">
                    <select  name="categoria" class="form-control input-lg search-second">
                        <option selected=""> Qual o tipo?</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" id="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 search-input">
                    <input type="text" value="" class="form-control input-lg search-first fontsize-em mb0" placeholder="Digite a cidade..." name="cidade" id="location"  autocomplete="off">
                    <ul id="listaCidades"></ul>
                </div>
                <div class="col-md-2 col-sm-2 center-block search-input">
                    <button class="btn btn-custom btn-block btn-lg height46 btn-azul"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12 no-padding counter" style="padding: 0;">
    <div class="bg-fundo bg1">
        <div class="row no-margin">
            <h2 class="hero-title mt36 mb17">O Sempre da Negócio compara os preços em centenas de sites para você</h2>
        </div>
        <br />
        <div class="row no-margin">
            <div class="container">
                <div class="col-md-3 col-sm-6 selecao-categoria">
                    <a href="{{asset('/imoveis')}}">
                        <figure class="">
                            <img class="mb10 transition-img" src="{{url('images/img-imoveis.png')}}" alt="Imóveis" title="Área Imóveis" width="167" height="130" />
                            <figcaption>
                                <p class="hero-description">Imóveis</p>
                                <p class="hero-description fontsize13px">Encontre mais de 200.000 imóveis de sua região em um único lugar. </p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 selecao-categoria">
                    <figure class="">
                        <img class="mb10 transition-img height148" src="{{url('images/img-veiculos.png')}}" alt="Veículos" title="Área Veículos" width="167" height="130" />
                        <figcaption>
                            <p class="hero-description"> Veículos </p>
                            <p class="hero-description fontsize13px">Encontre o veículo do seu sonho, buscamos anúncios em mais de 30 sites de classificados pelo Brasil. </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3 col-sm-6 selecao-categoria">
                    <figure class="">
                        <img class="mb10 transition-img height148" src="{{url('images/img-eletronicos.png')}}" alt="Eletrônicos" title="Área Eletrônicos" width="167" height="130" />
                        <figcaption>
                            <p class="hero-description">Eletrônicos</p>
                            <p class="hero-description fontsize13px">Nós pesquisamos para você os melhores preços para economizar tempo e dinheiro. </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3 col-sm-6">
                    <figure class="">
                        <img class="mb10 transition-img height148" src="{{url('images/img-equipamentos.png')}}" alt="Equipamentos" title="Área Equipamentos" width="167" height="130" />
                        <figcaption>
                            <p class="hero-description">Equipamentos </p>
                            <p class="hero-description fontsize13px">Somos o único portal com área exclusiva para locação e venda de máquinas e equipamentos.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-md-12 no-padding counter pt0">
    <div class="bg-fundo bg2">
        <div class="row no-margin">
            <h2 class="hero-title mt36 mb48 corAzul">SAIBA POR QUE O "SEMPRE DA NEGÓCIO", É A MELHOR FERRAMENTA PARA VOCÊ DIVULGAR SEUS ANÚNCIOS</h2>
        </div>
        <div class="row no-margin">
            <div class="container">
                <div class="col-md-4 mb10">
                    <figure>
                        <figcaption>
                            <p class="hero-description corCinza">AGILIDADE</p>
                            <p class="hero-description fontsize13px corCinza">Somos especialistas em busca para agilizar a divulgação de seu anúncios de forma fácil e rápida.</p>
                        </figcaption>
                        <img src="{{url('images/agilidade.png')}}"  alt="Agilidade" title="Imagem Agilidade" width="169" height="124" />
                    </figure>
                </div>
                <div class="col-md-4 mb10">
                    <figure>
                        <img src="{{url('images/imgcomodidade.png')}}" alt="Praticidade" title="Imagem Praticidade" width="169" height="124" />
                        <figcaption>
                            <p></p>
                            <p class="hero-description corCinza">PRATICIDADE</p>
                            <p class="hero-description fontsize13px corCinza">Em um único lugar você anuncia e aumenta suas chances de alcançar o público certo. </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 mb10">
                    <figure>
                        <figcaption>
                            <p class="hero-description corCinza">Gerenciamento de anúncios</p>
                            <p class="hero-description fontsize13px corCinza">Gerencie a qualquer momento seus anúncios com facilidade e rapidez.</p>
                        </figcaption>
                        <img src="{{url('images/imgseguranca.png')}}" alt="Segurança" title="Imagem Segurança" width="169" height="124" />
                    </figure>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="col-md-12 no-padding counter">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item-counter">
                    <span class="item-icon"><i class="fa fa-database"></i></span>
                    <div data-refresh-interval="100" data-speed="10000" data-to="212180" data-from="0" class="item-count">212180</div>
                    <span class="item-info">Anúncios Cadastrados</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item-counter">
                    <span class="item-icon"><i class="fa fa fa-home "></i></span>
                    <div data-refresh-interval="100" data-speed="10000" data-to="87000" data-from="0" class="item-count">87000</div>
                    <span class="item-info">Transações realizadas</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item-counter">
                    <span class="item-icon"><i class="fa fa-users"></i></span>
                    <div data-refresh-interval="100" data-speed="10000" data-to="7000" data-from="0" class="item-count">7000</div>
                    <span class="item-info">Usuários ativos</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item-counter">
                    <span class="item-icon"><i class="fa fa-database"></i></span>
                    <div data-refresh-interval="100" data-speed="6000" data-to="109120" data-from="0" class="item-count">109120 </div>
                    <span class="item-info">Visitantes mês</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection