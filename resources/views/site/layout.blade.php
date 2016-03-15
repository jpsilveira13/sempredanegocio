<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>{{ isset($title) ? $title : 'Sempre Da Negócio - Anúncios Classificados Grátis' }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="language" content="pt-br"/>
    @if(isset($advert))
        <meta property="og:site_name" content="Sempre da Negócio">
        <meta property="og:title" content="{{$advert->anuncio_titulo}}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{url('/')}}/imovel/{{$advert->tipo_anuncio}}/{{$advert->id}}/{{$advert->url_anuncio}}">
        <meta property="og:image:width" content="484">
        <meta property="og:image:height" content="252">
        <meta property="og:image" content="<?php if($advert->images()->count() < 1): echo asset('images/no-image.jpg');
        else: echo asset('gallery/'.$advert->images()->first()->extension); endif ?>">
        <meta property="og:description" content="{{str_limit($advert->anuncio_descricao, $limit = 100, $end =" ...")}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @endif
    @if(isset($description))
        <meta name="description" content="{{$description}}">
    @endif

    <meta name="keywords" content="Classificados, Anúncios grátis, à venda, usados, Imóveis, Carros, Motos, sempredanegocio.com.br, Sempre da Negócio, sempre da negocio, apartamentos, alugar, comprar, aluguel casa, aluguel casa temporada  " />
    <meta name="robots" content="ALL" />
    <meta name="copyright" content="© 2016 Sempre da Negócio" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="google-site-verification" content="wma-4TJAj_E1sgTjCKRH5unqj224KpxXv131FaQ4xjY" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="<?=Request::is('/') ? 'pt0' : '' ?>">
<script type="text/javascript">
    (function removeFacebookAppendedHash() {
        if (!window.location.hash || window.location.hash !== '#_=_')
            return;
        if (window.history && window.history.replaceState)
            return window.history.replaceState("", document.title, window.location.pathname);
        // Prevent scrolling by storing the page's current scroll offset
        var scroll = {
            top: document.body.scrollTop,
            left: document.body.scrollLeft
        };
        window.location.hash = "";
        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scroll.top;
        document.body.scrollLeft = scroll.left;
    }());
</script>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix-top <?=Request::is('/') ? '' : 'bg-branco' ?>">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button style="margin-top: 14px" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="page-scroll" rel="home" itemprop="url"  href="{{asset('/')}}"><img class="img-responsive" src="{{url('images/logo312x33.png')}}" alt="Sempre da Negócio" title="Sempre da Negócio "/><span itemprop="title"></span> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav navbar-right">

                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li class="new-ads"><a href="#loginModal" id="modalLogin" rel="Anuncie" data-toggle="modal" data-target="#loginModal" class="btn btn-ads btn-azul"><span class="glyphicon glyphicon-file"></span> Anuncie</a></li>
                        <li><a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span> Iniciar Sessão</a></li>
                        <li><a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-heart"></span> Favoritos</a></li>
                    @endif
                @else
                    <li class="new-ads"><a href="{{url('anuncie')}}" id="modalLogin" class="btn btn-ads btn-azul"><span class="glyphicon glyphicon-file"></span> Anuncie</a></li>
                    <li class="dropdown">
                        @if(auth()->user()->avatar)
                            <a href="#" class="dropdown-toggle pt12 pb0" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="user-menu-icon" style="background-image: url('<?=auth()->user()->avatar?>');"></span>
                                <span class="align-div-menu">Olá, {{ strstr(auth()->user()->name,' ',true)  }}</span>
                                <span class="caret  align-div-menu"></span>
                            </a>
                        @else
                            <a href="#" class="dropdown-toggle pt12" data-toggle="dropdown" role="button" aria-expanded="false" ><span class="user-menu-icon glyphicon glyphicon-user"></span><span>{{ strstr(auth()->user()->name,' ',true)}}</span><span class="caret"></span></a>
                        @endif
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/admin/home') }}">Acessar o Painel</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}">Sair</a></li>
                        </ul>
                    </li>
                    <li><a href="#" id="" class="pt12"><span class="user-menu-icon glyphicon glyphicon-heart"></span> Favoritos</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="clearfix"></div>
<section>
    <div class="container">
        <div class="row no-margin">
            @yield('categories')
            @yield('content')
        </div>
    </div>
</section>
<div class="clearfix"></div>
<footer>
    <div class="row">
        <div class="container">
            <div class="col-md-12 bb-white">
                <div class="text-center footer-texto">
                    <p>Telefone para contato: <strong>(34) 99938-8993</strong> / Email: marketing@sempredanegocio.com.br </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="social-area pull-left mt15">
                    <a><i class="fa fa-facebook fa-2x"></i></a>
                    <a><i class="fa fa-twitter fa-2x"></i></a>
                    <a><i class="fa fa-instagram fa-2x"></i></a>
                    <a><i class="fa fa-whatsapp fa-2x"></i></a>
                    <a href="mailto:marketing@sempredanegocio.com.br"><i class="fa fa-envelope fa-2x"></i></a>
                </div>
                <div class="footer-texto text-right text-estilo-center">
                    <p>Copyright © 2016. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--<a href="{{url('anuncie')}}" title="Anuncie" class="btn btn-anuncio <?=Request::is('anuncie') ? 'hide' : '' ?>" id="btAnuncie">Anuncie Agora</a> -->
<a href="#" title="Ir para o topo" class="hide" id="toTop">Topo</a>
<!-- modal area site -->
<!-- modal anuncio criado -->
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
                        <p id="mensagemEmailExistente" class="aviso" style="display: none;">O email informado já está cadastrado no Sempre da Negócio Imóveis. Faça seu login abaixo.</p>
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
                            <button href="javascript:void(0);" type="submit" id="btnCadastrar" class="btn btn-zap pull-right mb8res" onclick="IrParaCadastroCompleto();">Cadastrar</button>

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
<!-- JS -->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/livequery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/infinitescroll.js')}}"></script>
<script src="{{asset('js/typeahead.min.js')}}"></script>
<script src="{{asset('js/bloodhound.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/jquery.fittext.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="/vendor/artesaos/cidades/js/scripts.js"></script>
<script src="{{asset('js/validator.min.js')}}"></script>
<script src="{{asset('js/lazyload.js')}}"></script>
<script src="{{asset('js/site.js')}}"></script>
@if(Request::is('/') || Request::is('anuncie') )
        <!--<script src="{{asset('js/menudinamico.js')}}"></script> -->
@else
    <script src="{{asset('js/menudinamico.js')}}"></script>

@endif
@if (session('status'))
    <script>
        swal("Parabéns!", "Seu anúncio foi criado com sucesso!", "success")
    </script>
@endif
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-74055821-1', 'auto');
    ga('send', 'pageview');

</script>
<script>
    $('#propriedade1').empty();
    $('#divSubCategory').on('change', function (e) {
        var sub_id = e.target.value;
        $('#propriedade1').empty();
        //if verifica qual subcategoria foi escolhida
        if(sub_id == 10 || sub_id == 20 || sub_id == 60 || sub_id == 70 || sub_id == 80) {
            $('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback"> ' +
                    '<label>Número de quartos *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="numero_quarto"> ' +
                    '<option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option><option value="2">2</option><option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option>' +
                    '</select><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div> </div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Vagas de garagem *</label> <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem"> <option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option><option value="5">5 ou mais</option> </select> <span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div> </div> </div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"> <label>Quantos Banheiros *</label> <select required data-error="Seleciona uma opção" class="form-control" name="numero_suite"> <option value="">Escolher</option><option value="0">Nenhum</option> <option value="1">1</option><option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option></select> <span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div><div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Área Construída: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida"><div class="input-group-addon">m²</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Condomínio: *</label><div class="input-group"><div class="input-group-addon">R$</div><input class="form-control" maxlength="10" onkeypress="mascaraCampo(this,mvalor)"  data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text"  name="valor_condominio" id="valor_condominio"></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>IPTU: *</label><div class="input-group"><div class="input-group-addon">R$</div><input  class="form-control" maxlength="7" onkeypress="mascaraCampo(this,mvalor)" data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text"  name="valor_iptu" id="valor_iptu"></div><span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div></div></div></div>').appendTo('#propriedade1');
        }else if(sub_id == 30 || sub_id == 40){
            $('<div class="row"><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Vagas de garagem *</label> <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem"> <option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option><option value="5">5 ou mais</option> </select> <span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div> </div> </div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Área Construída: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida"><div class="input-group-addon">m²</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Condomínio: *</label><div class="input-group"><div class="input-group-addon">R$</div><input class="form-control" maxlength="10" onkeypress="mascaraCampo(this,mvalor)"  data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text"  name="valor_condominio" id="valor_condominio"></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>IPTU: *</label><div class="input-group"><div class="input-group-addon">R$</div><input class="form-control" maxlength="7" onkeypress="mascaraCampo(this,mvalor)" data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text" id="valor_iptu" name="valor_iptu"></div><span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div></div></div></div>').appendTo('#propriedade1');
        }else if(sub_id == 90 || sub_id == 50){
            $('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback"> ' +
                    '<label>Número de quartos *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="numero_quarto"> ' +
                    '<option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option><option value="2">2</option><option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option>' +
                    '</select><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div> </div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Vagas de garagem *</label> <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem"> <option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option><option value="5">5 ou mais</option> </select> <span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div> </div> </div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"> <label>Banheiros *</label> <select required data-error="Seleciona uma opção" class="form-control" name="numero_suite"> <option value="">Escolher</option><option value="0">Nenhum</option> <option value="1">1</option><option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option></select> <span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div><div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Acomodações: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="2" required placeholder="Ex.: 99" type="text" data-error="Campo não pode ser vazio"  name="acomodacoes"></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Área Construída: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida"><div class="input-group-addon">m²</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div>').appendTo('#propriedade1');

        }
    });
</script>
</body>
</html>

