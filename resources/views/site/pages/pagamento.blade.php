@extends('site.layout')

@section('content')
    @include('site.pages._etapa')



    <form id="formPagamento" action="">

        @if(!empty(auth()->user()->typeuser_id >= 3 && auth()->user()->typeuser_id <= 4))

            <div class="container no-padding">
                <section id="pricePlans" class="text-center">
                    <h1><b>ASSINE UM DE NOSSOS PLANOS</b></h1>
                    <h4>Parabéns você está próximo de transformar o seu negócio em uma celebridade digital.
                        Basta assinar um de nossos planos a seguir:</h4>
                    <h3 style="font-size:1em" class="label label-danger">Atenção não haverá Renovação Automática dos Planos</h3>
                    <br />
                    <br />
                    <br />
                    <ul id="plans">
                        <li class="plan col-md-4 col-sm-6 col-xs-12">
                            <ul class="planContainer">
                                <li class="title"><h2>{{$economic->name}}</h2></li>
                                <li class="price"><p>@if($economic->value == 0) Grátis @endif</p></li>
                                <li>
                                    <ul class="options">
                                        <li>12 <span>Fotos na internet</span></li>
                                        <li>Padrão</li>
                                        <li><span>Máximo de </span> 5 <span>anúncios</span></li>
                                        <li>Sem SMS de alerta</li>
                                        <li>Mensal</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                    </ul>
                                </li>
                                <li class="button"><a class="btn btnPagamento" href="#" id="{{$economic->id}}">Anunciar</a></li>
                            </ul>
                        </li>
                        <li class="plan col-md-4 col-sm-6 col-xs-12">
                            <ul class="planContainer">
                                <li class="title"><h2 class="bestPlanTitle">{{$standard->name}}</h2></li>
                                <li class="price"><p class="bestPlanPrice">R${{$standard->value}}</p></li>
                                <li>
                                    <ul class="options">
                                        <li>Fotos ilimitadas</li>
                                        <li> <span>Até</span> 12 <span>vezes mais visualização por anúncio</span></li>
                                        <li><span>Máximo </span> 40 <span>anúncios</span></li>
                                        <li>40 <span>SMS de alerta</span></li>
                                        <li>Mensal</li>
                                        <li>1 <span>vídeo de seu anúncio</span></li>
                                        <li><span>Exibição de até </span> 40 <span>vezes do corretor em anúncios particulares na região.</span></li>
                                        <li>Página hotsite</li>
                                        <li>Impulsionado pelo google</li>
                                        <li>X</li>
                                    </ul>
                                </li>
                                <li class="button"><a class="btn btnTeste bestPlanButton" id="{{$standard->id}}">Adquirir já</a></li>
                            </ul>
                        </li>

                        <li class="plan col-md-4 col-sm-6 col-xs-12">
                            <ul class="planContainer">
                                <li class="title"><h2>{{$turbo->name}}</h2></li>
                                <li class="price"><p>R${{$turbo->value}}</p></li>
                                <li>
                                    <ul class="options">
                                        <li>Fotos ilimitada</li>
                                        <li> <span>Até</span> 48 <span>vezes mais visualização por anúncio</span></li>
                                        <li>Anúncios ilimitados</li>
                                        <li>80 <span>SMS de alerta</span></li>
                                        <li>Mensal</li>
                                        <li>1 <span>vídeo de seu anúncio</span></li>
                                        <li><span>Exibição de até </span> 80 <span>vezes do corretor em anúncios particulares na região.</span></li>
                                        <li>Página hotsite</li>
                                        <li>Impulsionado pelo google</li>
                                        <li>Impulsionado pelo facebook</li>

                                    </ul>
                                </li>
                                <li class="button"><a href="{{ route('adquirir', ['id' => $turbo->id]) }}" class="btn">Adquirir já</a></li>
                            </ul>
                        </li>
                        <li class="plan col-md-4 col-sm-6 col-xs-12">
                            <ul class="planContainer">
                                <li class="title"><h2>{{$turboAnual->name}}</h2></li>
                                <li class="price"><p>R${{$turboAnual->value}}</p></li>
                                <li>
                                    <ul class="options">
                                        <li>Fotos ilimitada</li>
                                        <li> <span>Até</span> 576 <span>vezes mais visualização por anúncio</span></li>
                                        <li>Anúncios ilimitados</li>
                                        <li>960 <span>SMS de alerta</span></li>
                                        <li>Anual</li>
                                        <li>1 <span>vídeo de seu anúncio</span></li>
                                        <li><span>Exibição de até </span> 960 <span>vezes do corretor em anúncios particulares na região.</span></li>
                                        <li>Página hotsite</li>
                                        <li>Impulsionado pelo google</li>
                                        <li>Impulsionado pelo facebook</li>

                                    </ul>
                                </li>
                                <li class="button"><a href="{{ route('adquirir', ['id' => $turboAnual->id]) }}" class="btn">Adquirir já</a></li>
                            </ul>
                        </li>
                    </ul> <!-- End ul#plans -->
                </section>
                @else
                    <br />
                    <section id="pricePlans" class="text-center">
                        <h1>ASSINE UM DE NOSSOS PLANOS</h1>
                        <h4>Parabéns você está próximo de transformar o seu negócio em uma celebridade digital.
                            Basta assinar um de nossos planos a seguir:</h4>
                        <h3 style="font-size:1em" class="label label-danger">Atenção não haverá Renovação Automática dos Planos</h3>
                        <br />
                        <br />
                        <br />
                        <ul id="plans">
                            <li class="plan col-md-4 col-sm-6 col-xs-12">
                                <ul class="planContainer">
                                    <li class="title"><h2>{{$bronze->name}}</h2></li>
                                    <li class="price"><p>Grátis</p></li>
                                    <li>
                                        <ul class="options">
                                            <li>4 <span>Fotos na internet</span></li>
                                            <li>Padrão</li>
                                            <li>X</li>
                                            <li>X</li>
                                            <li>X</li>
                                            <li>Sem SMS de alerta</li>
                                            <li>X</li>
                                            <li>X</li>
                                        </ul>
                                    </li>
                                    <li class="button"> <a href="#" class="btn btnPagamento">Anunciar</a></li>
                                </ul>
                            </li>
                            <li class="plan col-md-4 col-sm-6 col-xs-12">
                                <ul class="planContainer">
                                    <li class="title"><h2 class="bestPlanTitle">{{$prata->name}}</h2></li>
                                    <li class="price"><p class="bestPlanPrice">R${{$prata->value}}</p></li>
                                    <li>
                                        <ul class="options">
                                            <li><span>Até </span> 8 <span> fotos na internet</span></li>
                                            <li> <span>Até</span> 12 <span>vezes mais visualização</span></li>
                                            <li>2 <span>meses</span></li>
                                            <li>X</li>
                                            <li>X</li>
                                            <li>10 <span> SMS de alerta</span></li>
                                            <li>X</li>
                                            <li>X</li>

                                        </ul>
                                    </li>
                                    <li class="button"><a class="btn btnTeste bestPlanButton" id="{{$prata->id}}"href="{{ route('adquirir', ['id' => $prata->id]) }}">Adquirir já</a></li>

                                </ul>
                            </li>

                            <li class="plan col-md-4 col-sm-6 col-xs-12">
                                <ul class="planContainer">
                                    <li class="title"><h2>{{$ouro->name}}</h2></li>
                                    <li class="price"><p>R${{$ouro->value}}</p></li>
                                    <li>
                                        <ul class="options">
                                            <li><span>Até </span> 12 <span> fotos na internet</span></li>
                                            <li> <span>Até</span> 48 <span>vezes mais visualização</span></li>
                                            <li>6 <span>meses</span></li>
                                            <li>Impulsionado pelo Google</li>
                                            <li>X</li>
                                            <li>26 <span> SMS de alerta</span></li>
                                            <li>1 vídeo do seu anúncio</li>
                                            <li>X</li>
                                        </ul>
                                    </li>
                                    <li class="button"><a href="{{ route('adquirir', ['id' => $ouro->id]) }}" class="btn ">Adquirir já</a></li>

                                </ul>
                            </li>
                            <li class="plan col-md-4 col-sm-6 col-xs-12">
                                <ul class="planContainer">
                                    <li class="title"><h2>{{$diamante->name}}</h2></li>
                                    <li class="price"><p>R${{$diamante->value}}</p></li>
                                    <li>
                                        <ul class="options">
                                            <li><span>Até </span> 24 <span> fotos na internet</span></li>
                                            <li> <span>Até</span> 94 <span>vezes mais visualização</span></li>
                                            <li>1 <span>ano</span></li>
                                            <li>Impulsionado pelo Google</li>
                                            <li>Impulsionado pelo Facebook</li>
                                            <li>48 <span> SMS de alerta</span></li>
                                            <li>1 vídeo do seu anúncio</li>
                                            <li>Loja Virtual</li>
                                        </ul>
                                    </li>
                                    <li class="button"><a href="{{ route('adquirir', ['id' => $diamante->id]) }}" class="btn" role="button">Adquirir já</a></li>
                                </ul>
                            </li>
                        </ul> <!-- End ul#plans -->
                    </section>
            </div>
        @endif
    </form>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

@endsection