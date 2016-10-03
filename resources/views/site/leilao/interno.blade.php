@extends('site.layout')

@section('content')


    <div class="clearfix" style="margin-bottom: 10px"></div>

    @if(!auth()->guest())
        @if(auth()->user()->id == $oferta->advertVeiculo->user->id)
            <section class="container col-md-6 col-lg-6 no-show ">
                <a href="{{route('admin.anuncios.edit',['id'=>$oferta->advertVeiculo->id])}}" style="margin-bottom: 10px" class="btn btn-zap">Editar Anúncio</a>
            </section>
            <br />
        @endif
        @if(auth()->user()->typeuser_id == 1 )
            <section class="container col-md-6 col-lg-6 no-show ">
                <a href="{{url("/admin/anuncios/destroy")}}/{{$oferta->advertVeiculo->id}}" style="margin-bottom: 10px" class="btn btn-zap">Remover Anúncio</a>
            </section>
            <br />
        @endif

    @endif

    <section class="container col-md-6 col-lg-6 no-show ">
        <a href="{{url("ofertas")}}" style="margin-bottom: 10px" class="btn btn-zap">Ver todos os Anúncios</a>
    </section>
    <p></p>
    <div class="container no-padding">
        <div class="col-md-7 col-lg-7 ">
            <div class="side-left">
                <div class="box-default clearfix imovel-area-detalhe">


                    <h1 class="pull-left">
                        <span class="subtitle">{{$oferta->advertVeiculo->subcategory->name}}</span>
                        @if($oferta->advertVeiculo->active == 0)
                            {{$oferta->advertVeiculo->rua}} - @if($oferta->advertVeiculo->numero == 0)  @else{{$oferta->advertVeiculo->numero}}
                            @endif
                        @endif
                        <span class="logradouro" style="line-height: 24px"><b>{{$oferta->marca}}</b><br />{{$oferta->modelo}}</span>
                        <br />

                        <span class="logradouro">{{$oferta->advertVeiculo->bairro}}, {{$oferta->advertVeiculo->cidade}} - {{$oferta->advertVeiculo->estado}}</span>

                    </h1>

                    <div class="pull-right posvalue-imovel">
                        <span class="value-ficha">
                                <span id="precoLeilao" class="subtitle">Lance Atual</span>
                            @if(!empty($leilao))
                                @if($leilao->valor > 0)
                                    R$ {{number_format((float)$leilao->valor,2,",",".")}}
                                @endif
                            @else

                                R$ {{number_format((float)$oferta->preco_min,2,",",".")}}
                            @endif
                        </span>
                    </div>
                    <div class="preco-fipe pull-right posvalue-imovel">
                        <span class="value-ficha">
                                <span class="subtitle">Preço Fipe</span>
                                R$ {{number_format((float)$oferta->preco_fipe,2,",",".")}}
                        </span>
                    </div>

                </div><!-- box informações endereço -->
                <div class="box-default informacoes-imovel clearfix">

                    <div class="pull-left">
                        <ul class="unstyled no-padding">
                            <li>{{$oferta->ano}}<span class="text-info">Ano</span></li>
                            <li>{{$oferta->km}}<span class="text-info">KM</span></li>
                            <li>@if($oferta->combustivel == "Gasolina e álcool") Flex @else {{$oferta->combustivel}} @endif<span class="text-info">Combustível</span></li>
                            <li>{{$oferta->cambio}}<span class="text-info">Câmbio</span></li>
                        </ul>
                    </div>
                </div><!-- box informações do imovel -->
                <div class="box-default clearfix carrosel-fotos-imovel">
                    <div class="col-md-12" id="slider">
                        <div class="col-md-12" id="carousel-bounding-box">
                            <div id="carrouselImovel" class="carousel slide">
                                <!-- main slider carousel items -->
                                <div class="carousel-inner">
                                    @if($oferta->advertVeiculo->images()->count() >0)
                                        <?php $j = 0 ?>
                                        @foreach($oferta->advertVeiculo->images()->get() as $images)
                                            <div class="<?php if($j==0){echo 'active';}?> item srle" data-slide-number="<?=$j?>">
                                                <?php
                                                $pos = strpos($images->extension, "imoveis/site/");

                                                $url1 = "";
                                                if ($pos === false) {
                                                $url1 = $images->extension;

                                                ?>

                                                <a href="{{url($url1)}}" data-lightbox="roadtrip" data-title="Imagem da oferta">
                                                    <img src="{{$url1}}" class="img-responsive">
                                                </a>

                                                <?php
                                                }else{
                                                $url1 = "galeria/".$images->extension;
                                                ?>
                                                <a href="{{url($url1)}}" data-lightbox="roadtrip" data-title="Imagem da oferta">
                                                    <img src="{{url($url1)}}" class="img-responsive">
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php $j++?>
                                        @endforeach
                                    @else
                                        <div class="active item srle" data-slide-number="1">
                                            <img src="{{url('images/noimage2.jpg')}}" class="img-responsive">
                                        </div>
                                    @endif

                                </div>
                                <!-- main slider carousel nav controls -->
                                <a class="carousel-control left" href="#carrouselImovel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="carousel-control right" href="#carrouselImovel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>

                    </div>
                    <!--/main slider carousel-->

                    <!-- thumb navigation carousel -->
                    <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">

                        <!-- thumb navigation carousel items -->
                        <ul class="list-inline mt10">
                            @if($oferta->advertVeiculo->images()->count() >0)

                                <?php $i=0?>
                                @foreach($oferta->advertVeiculo->images()->get() as $images)
                                    <li>
                                        <a  id="carousel-selector-<?=$i?>" class="<?php if($i==0){echo 'selected';}?>">
                                            <?php
                                            $pos = strpos($images->extension, "imoveis/site/");
                                            $url1 = "";
                                            if ($pos === false) {
                                            $url1 = $images->extension;

                                            ?>
                                            <img src="{{$url1}}" width="80" height="60" class="img-responsive">

                                            <?php
                                            }else{
                                            $url1 = "galeria/".$images->extension;


                                            ?>
                                            <img src="{{url($url1)}}" width="80" height="60" class="img-responsive">
                                            <?php }?>
                                        </a>
                                    </li>
                                    <?php $i++ ?>
                                @endforeach
                            @else
                                <li>
                                    <a id="carousel-selector-1" class="selected">
                                        <img src="{{url('images/noimage2.jpg')}}" width="80" height="60" class="img-responsive">
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="box-default clearfix box-descricao-caract">
                    <h3>Descrição</h3>
                    <div id="descricaoOferta">
                        <p>
                            {{$oferta->advertVeiculo->anuncio_descricao}}
                        </p>
                    </div>
                    <h3>Características</h3>
                    <div id="caracteristicaOferta">

                        @if($oferta->advertVeiculo->features()->count() > 0)
                            <p></p>
                            <p>
                                <strong>Características:</strong>

                                @foreach($oferta->advertVeiculo->features()->get() as $feature)
                                    {{$feature->name}},
                                @endforeach
                                @else
                                    <strong>Não há característica cadastradas.</strong>
                                @endif

                                @if(!empty($oferta->opcionais))
                                    <strong>Opcionais do carro: </strong>
                                    {{$oferta->opcionais}}
                                @endif
                            </p>
                    </div>
                    @if(!auth()->guest())
                        @if(auth()->user()->id == $oferta->advertVeiculo->user->id || auth()->user()->typeuser_id == 1)
                            <div id="codigoAnuncio">
                                <p><strong>Número de visitas do anúncio: </strong> {{$oferta->advertVeiculo->advert_count}}</p>
                            </div>
                        @endif
                    @endif
                    <p></p>
                    <div id="codigoAnuncio">
                        <p><strong>Código da oferta: </strong> {{$oferta->advertVeiculo->id}}</p>
                    </div>
                </div>
                <div class="box-default clearfix">
                    <ul class="unstyled bar-actions no-padding">

                        <li>
                            <div class="share-social clearfix">
                                <span class="pull-left">Compartilhar</span>

                                <a href="#emailModal" class="icone-social icone-e-mail" data-target="#emailModal" data-toggle="modal" title="Enviar por e-mail"></a>
                                <a href="" class="icone-social icone-twitter" role="button" target="_blank"  title="Compartilhar no Twitter"></a>
                                <a href="http://www.facebook.com/sharer.php?u={{Request::url()}}" class="share-facebook icone-social icone-facebook" role="button" target="_blank" title="Compartilhar no Facebook">

                                </a>
                            </div>
                        </li>
                        <li><a href="#denuncieModal" id="modalDenuncieAbrir" class="modal-denuncie icone-alerta-reportar" data-toggle="modal" data-target="#denuncieModal">Reportar erro ou denunciar essa oferta</a></li>
                    </ul>
                </div>
            </div><!-- fim area esquerda -->
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="side-right">
                <div class="box-default area-oferta">
                    <div class="lance-total">
                        <div class="lance-descricao">
                            <div class="lance-online lance-borda">
                                @if(!empty($leilao))
                                    <span id="nomeParticipante" class="status usuario-vencendo">Participante Vencendo: <span class="nome-vencendo">{{strstr($leilao->userleilao->name, ' ', true)}}</span></span>
                                @else
                                    <span id="nomeParticipante" class="status usuario-vencendo ">Participante Vencendo: <span class="nome-vencendo">Seja o primeiro!</span></span>
                                @endif
                            </div>
                            <div class="lance-online">
                                @if(Request::is('auth/login'))
                                    <span class="status">
                                     Você precisa está logado para participar
                                    </span>
                                @endif
                            </div>

                        </div>
                        <hr />
                        <div class="lance-botao">
                            <div class="abas-botoes-lance ultimo-lance">
                                <h3>Lances</h3>
                            </div>
                        </div>
                        <div id="lance" class="box-leilao">
                            @if(empty(auth()->user()->id))
                                Não tá logado ;/
                            @else
                                <div id="area-botao">
                                    @for($i = 0;$i<9;$i++)
                                        <div class="col-md-4 col-lg-4 col-sm-6">
                                            @if(!empty($leilao))
                                                @if(($leilao->valor > 0))
                                                    <?php
                                                    $leilao->valor = $leilao->valor + $oferta->variancia;
                                                    ?>
                                                    <a href="#"  data-value="{{$leilao->valor}}" data-id="{{$oferta->id}}" data-user="{{auth()->user()->id}}" class="botoes-lance">

                                                        <b style="font-size: 13px;">{{number_format($leilao->valor,2,",",".")}}</b><br>Dar Lance!
                                                    </a>
                                                @endif
                                            @else
                                                <?php
                                                $oferta->preco_min = $oferta->preco_min + $oferta->variancia;
                                                ?>
                                                <a href="#" data-value="{{$oferta->preco_min}}" class="botoes-lance">
                                                    <b style="font-size: 13px;">{{number_format($oferta->preco_min,2,",",".")}}</b><br>Dar Lance!
                                                </a>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            @endif
                            <br clear="all" />
                        </div>
                    </div>
                    @if(auth()->guest())
                        @if(!Request::is('auth/login'))
                            <a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="pull-left">Adicionar à minha lista</span></a>
                        @endif
                    @else
                        <a href="#" id="modalLogin" class=""><span class="pull-left">Adicionar à minha lista</span></a>

                    @endif


                    <div class="clearfix"></div>
                </div><!-- fim contratar anunciante -->
                <!-- top 5 leilao -->
                <aside class="box-default clearfix ultimo-lance">
                    @if(!$leilao)

                        <h3 class="mt10">Não há lances cadastrado seja o primeiro!</h3>
                    @else
                        <h3>Últimos 5 lances</h3>
                        <div class="top5">
                            <table id="tabelaLance" class="table table-hover table-striped table-responsive">
                                <thead>
                                <th>Nº do lance</th>
                                <th>Lance(R$)</th>
                                <th>Lance+5%(R$)</th>
                                <th>Usuário</th>
                                </thead>
                                <tbody>
                                @foreach($top5 as $usuario)

                                    <tr>

                                        <td>{{$usuario->numero_lance}}</td>
                                        <td>{{number_format((float)$usuario->valor,2,",",".")}}</td>
                                        <?php
                                        $usuario->valor = ($usuario->valor * 0.05) + $usuario->valor;
                                        ?>
                                        <td>{{number_format((float)$usuario->valor,2,",",".")}}</td>
                                        <td>{{strstr($usuario->userleilao->name, ' ', true)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </aside>
                <!-- área anúncio site -->
                <aside class="box-default clearfix outras-informacoes height240px">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- bloco anuncio 3 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:320px;height:200px"
                         data-ad-client="ca-pub-9276435422488602"
                         data-ad-slot="7485561574"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </aside>
                <aside class="box-default clearfix outras-informacoes">

                </aside>
                <aside class="box-default clearfix outras-informacoes">

                </aside>

            </div>
        </div>
    </div>

    <!-- modal email -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Enviar essa oferta para um amigo</h4>
                </div>
                <div class="modal-body">
                    <div class="hide-body">
                        <center>

                            <img class="img-responsive center-block borda-image" width="140" height="140" src="<?php if($oferta->advertVeiculo->images()->count() > 0):
                                echo asset($url1); endif?>" />


                            <small>Sob consulta</small>
                            <br />

                            <span><strong>Características: </strong></span>
                            @foreach($oferta->advertVeiculo->features()->get() as $feature)
                                <span class="label label-success">{{$feature->name}}</span>
                            @endforeach
                        </center>
                        <br />
                    </div>
                    <form id="emailAmigo" action="" >
                        <input type="hidden" name="user_id" value="{{$oferta->advertVeiculo->user->id}}" />

                        <input type="hidden" name="url_site" value="{{Request::url()}}" />
                        <input id="txtNomeAmigo" required="required" name="nome_amigo"class="input input-block-level" type="text" placeholder="Nome do seu amigo">

                        <input id="txtEmailAmigo" required="required" name="email_amigo"class="input input-block-level" type="email" placeholder="Email do seu amigo">
                        <input id="txtNomeRemetente" required="required" name="nome_anuncio" class="input input-block-level" type="text" placeholder="Seu nome">
                        <input id="txtEmailRemetente" required="required" name="email_anuncio" class="input input-block-level" type="email" placeholder="Seu email">
                        <textarea id="txtConteudo" required="required" name="assunto_anuncio"class="input-block-level" rows="2" placeholder="Mensagem"></textarea>
                        <button class="btn-link" data-dismiss="modal">Cancelar</button>
                        <button id="btnCompartilharOfertaEmail" type="submit" class="btn btn-zap">Enviar</button>
                    </form>
                    <!-- Sucesso -->
                    <div id="divSucessoAmigo" class="sucesso-modal tab-pane tab-absolute">
                        <div class="text-center">
                            <p>Anúncio enviado com sucesso!<br /><br /> Aproveite e veja outros anúncios</p>
                            <div id="btnFecharDenuncie" data-dismiss="modal" class="center-button btn-fechar-denuncie">
                                <a href="#" class="btn btn-zap">Fechar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    Ao enviar, você concorda com os <a href="#" target="_blank">Termos de Uso</a> e a <a href="" target="_blank">Política de Privacidade</a> do Sempre da negócio.
                </div>
            </div>
        </div>
    </div>
    <!-- modal denuncia -->
    <div class="modal fade denuncie-modal" id="denuncieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Denunciar Oferta</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">

                        <div class="tab-pane active">
                            <div class="text">
                                <p>Descreva qual foi o problema encontrado na oferta:</p>

                            </div>
                            <form class="denuncie-form" action="" id="denunciaForm">
                                <input type="hidden" name="user_id" value="{{$oferta->advertVeiculo->user->id}}" />
                                <input type="hidden" name="url_site" value="{{Request::url()}}" />
                                <select id="selTipoProblema" name="motivo" class="input-block-level"><option selected="selected" value="">Tipo de problema</option><option value="Anúncio já comercializado">Anúncio já comercializado</option><option value="Preço incorreto">Preço incorreto</option><option value="Sem retorno do anunciante">Sem retorno do anunciante</option><option value="Telefone não atende">Telefone não atende</option><option value="Foto incorreta">Foto incorreta</option><option value="Endereço/mapa incorreto">Endereço/mapa incorreto</option><option value="Não respondeu o e-mail em 48h">Não respondeu o e-mail em 48h</option><option value="Detalhe do anúncio incorreto">Detalhe do empreendimento incorreto</option>><option value="Anúncio inexistente">Imóvel inexistente</option><option value="Oferta repetida">Oferta repetida</option><option value="Qualidade do atendimento recebido">Qualidade do atendimento recebido</option><option value="Publicação sem autorização">Publicação sem autorização</option></select>
                                <br />
                                <p id="msgTipoProblema" class="text-error" style="display: none;">* Selecione o Tipo de problema</p>

                                <textarea id="txtDescricaoProblema"  name="descricao" class="input-block-level" rows="4" placeholder="Descrição do problema"></textarea>
                                <p id="1_error" class="text-error" style="display: none;">* Digite a Descrição do problema</p>

                                <input id="txtNomeDenuncie" required name='nome' class="input-block-level" type="text" placeholder="Nome">
                                <p id="2_error" class="text-error" style="display: none;">* Digite seu Nome</p>

                                <input id="txtEmailDenuncie" required class="input-block-level" type="email" name="email" placeholder="E-mail">
                                <p id="3_error" class="text-error" style="display: none;">* Digite um E-mail válido</p>

                                <div class="center-button" id="divEnviarDenuncie">
                                    <button id="btnCancelar" class="btn-link" data-dismiss="modal">Cancelar</button>
                                    <button id="btnEnviar" type="submit" class="btn btn-zap">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <div id="divSucessoDenuncie" class="sucesso-modal tab-pane tab-absolute">
                            <div class="text-center">
                                <p>Denúncia enviada com sucesso.<br> Vamos analisar a informação que você nos encaminhou.</p>
                                <div id="btnFecharDenuncie" data-dismiss="modal" class="center-button btn-fechar-denuncie">
                                    <a href="#" class="btn btn-zap">Fechar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer tl">
                    <strong class="text-error">ATENÇÃO: </strong>Se você for o anunciante desta oferta e deseja alterar os dados deste anúncio, entre em contato com nosso atendimento online.
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Acessar Sempre da Negócio</h4>
                </div>
                <div class="modal-body">

                    <span id="mensagemLoginSalvarBusca" class="alerta-zero alerta-imput-busca alerta-login-busca" style="display: block;">Realize seu login para adicionar o imóvel à sua lista de imóveis preferidos.</span>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Houve um erro ao cadastrar e logar no sistema.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="login" class="login">

                        <div id="divLogin" class="login-box">
                            <p class="titulo">Já sou cadastrado</p>
                            <p id="mensagemPadrao" class="desc">Se você já é um usuário do Sempre da Negócio, pode fazer seu login abaixo.</p>
                            <div class="rel">
                                <form class="form-horizontal mt43res" role="form" method="POST" action="{{ url('/auth/login') }}">
                                    {!! csrf_field() !!}
                                    <input type="email" name="email" value="{{ old('email') }}" id="txtEmailUsuarioLogin" class="input input-block-level" placeholder="E-mail" title="Este campo deve ser preenchido" autocapitalize="off" />

                            </div>

                            <input type="password" id="txtSenhaUsuario" name="password" class="input input-block-level mb60res" placeholder="Senha" data-toggle="tooltip" title="Este campo deve ser preenchido">

                            <div class="forgot-pass">
                                <a href="{{ url('/password/email') }}" id="lnkEsqueciSenhaLogin" class="" onclick="">Esqueci minha senha</a>
                            </div>
                            <button type="submit" id="btnLogin"  class="btn btn-zap pull-right">Entrar</button>
                            </form>
                            <div id="senhaInvalida" class="error-distance hide">
                                <div class="message">
                                    <span class="icone-fechar-modal"></span>
                                    <span class="text">E-mail ou senha inválidos.<br> Tente novamente.</span>
                                </div>
                            </div>

                            <div id="erroLogin" class="error-distance hide">
                                <div class="message">
                                    <span class="icone-fechar-modal"></span>
                                    <span class="text">Não foi possível logar.<br> Tente mais tarde.</span>
                                </div>
                            </div>

                            <div class="auth-loading hide">
                                <div class="message">
                                    <img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Autenticando...">
                                    <span>Autenticando…<br> Aguarde!</span>
                                </div>
                            </div>
                        </div>

                        <div id="divRecuperacaoSenha" class="login-box hide" style="display: none;">
                            <p class="titulo">Recuperar senha</p>
                            <p class="desc">Digite o e-mail cadastrado para receber o lembrete de senha.</p>

                            <div class="rel">
                                <input type="email" id="txtEmailEnviar" onkeyup="EnterRecuperacao(event);" class="input input-block-level" placeholder="E-mail" autocapitalize="off">
                                <img id="imgLoadingRecuperarSenha" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                            </div>

                            <div class="forgot-pass">
                                <a href="#" id="lnkEsqueciSenhaRecuperacao" class="" onclick="ExibirLogin();">« Voltar para login</a>
                            </div>
                            <button id="btnRecuperarSenha" onclick="EnviarEsqueciMinhaSenha();" class="btn btn-zap pull-right">Enviar</button>

                            <div class="auth-loading hide">
                                <div class="message">
                                    <img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Enviando…">
                                    <span>Enviando…<br> Aguarde!</span>
                                </div>
                            </div>

                            <div class="error-distance hide">
                                <div class="message">
                                    <span class="icone-fechar-modal"></span>
                                    <span class="text">Não foi possível<br> enviar sua senha.</span>
                                </div>
                            </div>

                            <div class="saved-distance hide">
                                <div class="message">
                                    <span class="icone-check"></span>
                                    <span class="text">Senha enviada ao<br> e-mail cadastrado.</span>
                                </div>
                            </div>

                        </div>

                        <div id="divMiniCadastro" class="cadastro-box no-show">
                            <p class="titulo">Não sou cadastrado</p>
                            <p class="desc">Preencha os campos abaixo para iniciar o cadastro.</p>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                                {!! csrf_field() !!}
                                <input type="text" class="form-control" class="input input-block-level span3" placeholder="Informe seu Nome" name="name" value="{{ old('name') }}">
                                <input id="txtNomeUsuarioCadastro" name="email" class="input input-block-level span3" type="email" placeholder="Informe seu email" value="{{old('email')}}">

                                <div class="rel">
                                    <input type="password" name='password' id="txtEmailUsuarioCadastro"  class="input input-block-level span3" placeholder="Informe a senha" autocapitalize="off">

                                </div>
                                <div class="rel">
                                    <input type="password" id="txtEmailUsuarioCadastro"  name="password_confirmation" class="input input-block-level span3" placeholder="Confirma a senha" autocapitalize="off">

                                </div>
                                <button href="javascript:void(0);" type="submit" id="btnCadastrar" class="btn btn-zap pull-right mb8res">Cadastrar</button>

                        </div>
                        </form>
                    </div>

                    <div id="cadastro" class="cadastro" style="display: none;">
                        <p class="desc">Preencha as informações para criar seu cadastro no Sempre da Negócio e ter acesso a sua conta</p>

                        <p class="aviso">O email informado não está cadastrado no Sempre da Negócio. Faça seu cadastro no formulário abaixo ou tente fazer <a href="#" onclick="ExibirLogin();">login novamente</a>.</p>

                        <input id="txtNomeCadastro" class="input input-block-level span4" type="text" placeholder="Nome e sobrenome" maxlength="100">
                        <div class="rel">
                            <input type="email" id="txtEmailCadastro" class="input input-block-level span4" placeholder="Seu e-mail" maxlength="100" autocapitalize="off">
                            <img id="imgLoadingCadastro" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                        </div>
                        <input type="email" id="txtConfirmaEmailCadastro" class="input input-block-level span4" placeholder="Confirme o seu e-mail" maxlength="100" autocapitalize="off">

                        <p class="input-group">
                            <input id="txtSenhaCadastro" class="input input-block-level span4" type="password" placeholder="Senha" maxlength="12">
                            <span>A senha deve conter entre 6 e 12 caracteres.</span>
                        </p>

                        <input id="txtConfirmaSenhaCadastro" onkeyup="EnterCadastro(event);" class="input input-block-level span4" type="password" placeholder="Confirme a senha" maxlength="12">

                        <label class="checkbox clear">
                            <input id="chkNovidades" type="checkbox" checked="checked" value="">Desejo receber novidades</label>

                        <p class="mt10 text-right">
                            <button id="btnCancelarCadastro" onclick="CancelarCadastro();" class="btn-link">Cancelar</button>
                            <button id="btnConfirmarCadastro" class="btn btn-zap">Finalizar Cadastro</button>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer modal-footer-login">
                    <div class="btn-facebook" id="imgFacebook">
                        <a href="{{ route('social.login', ['facebook']) }}"> <span class="icone-facebook">Login com Facebook</span></a>
                    </div>

                    <span class="text">Você pode utilizar sua conta do Facebook para acessar com mais <strong>rapidez</strong> e <strong>praticidade</strong>.</span>
                </div>
                <div class="modal-footer modal-footer-cadastro text-center">
                    Ao me cadastrar confirmo que li e concordo com os <a href="" target="_blank">Termos de Uso</a>
                </div>
            </div>
        </div>
    </div>
@endsection
