@extends('site.layout')

@section('content')
    <div class="plano-tudo">
        <div class="row" style="">
            <div id="tipo-plano" class="col-md-12">
                <label>SEU PLANO ESCOLHIDO FOI: <span id="escolheu-plano">NENHUM</span> </label>
                <div class="dropdown">
                    <select id="escolhaPlanos" class="form-control">
                        <option class="" value="">Seleciona um plano</option>
                        <optgroup label="Imovéis">
                            <option  value="planoMaster" class="Corretor">Corretor</option>
                            <option value="planoMaster" class="Imobiliária">Imobiliária</option>
                        </optgroup>
                        <optgroup label="Veículos">
                            <option value="planoMaster" class="Garageiro">Garageiro</option>
                        </optgroup>
                        <optgroup label="Outros">
                            <option value="outros" class="Outros">Particular</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <form id="formPagamento" action="">
            <div class="container no-padding">
                <section id="pricePlans" class="plano-master text-center hide">
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
                                        <li>Mensal</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                        <li>X</li>
                                    </ul>
                                </li>
                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$economic->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$economic->id}}">Anunciar</a></li>
                                @endif

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
                                        <li>Mensal</li>
                                        <li>Página hotsite</li>
                                        <li>Impulsionado pelo google</li>
                                        <li>X</li>
                                    </ul>
                                </li>
                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$standard->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$standard->id}}">Anunciar</a></li>
                                @endif

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
                                        <li>Mensal</li>
                                        <li>Página hotsite</li>
                                        <li>Impulsionado pelo google</li>
                                        <li>Impulsionado pelo facebook</li>

                                    </ul>
                                </li>
                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$turbo->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$turbo->id}}">Anunciar</a></li>
                                @endif

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

                                        <li>Anual</li>
                                        <li>Página hotsite</li>
                                        <li>Impulsionado pelo google</li>
                                        <li>Impulsionado pelo facebook</li>

                                    </ul>
                                </li>
                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$turboAnual->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$turboAnual->id}}">Anunciar</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul> <!-- End ul#plans -->
                </section>
                <br />
                <section id="pricePlans" class="usuario-plano text-center hide">
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
                                    </ul>
                                </li>
                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="">Cadastrar</a></li>
                                @elseif(empty(auth()->user()->typeuser_id))
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{url('anuncie')}}">Anunciar</a></li>
                                @endif
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
                                    </ul>
                                </li>
                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$prata->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$prata->id}}">Anunciar</a></li>
                                @endif

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
                                    </ul>
                                </li>

                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$ouro->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$ouro->id}}">Anunciar</a></li>
                                @endif

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
                                    </ul>
                                </li>

                                @if(empty( auth()->user()->id))
                                    <li class="button"><a class="btn btnPagamento" href="{{url('login')}}" id="{{$diamante->id}}">Cadastrar</a></li>
                                @else
                                    <li class="button"><a class="btn btnPagamento" href="#" id="{{$diamante->id}}">Anunciar</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul> <!-- End ul#plans -->
                </section>
            </div>

        </form>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
    </div>

@endsection