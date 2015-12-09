<!DOCTYPE html>
<html lang="pt-br" ng-app="myApp">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png"/>
    <title>{{ isset($title) ? $title : 'Sempre da negócio' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}"/>


</head>

<body>
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
<header>
    <nav class="navbar navbar-default navbar-sempredanegocio navbar-static-top position-relative">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-uppercase no-padding logo-topo" href="/">
                    <img src="{{asset('images/logo.png')}}" class="img-responsive menu-logo-display" title="Sempre Da Negócio" alt="Sempre Da Negócio"/>
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->guest())
                        @if(!Request::is('auth/login'))
                            <li><a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span> Iniciar Sessão</a></li>
                            <li><a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-heart"></span> Favoritos</a></li>
                        @endif
                    @else
                        <li class="dropdown">
                            @if(auth()->user()->avatar)
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="user-menu-icon" style="background-image: url('<?=auth()->user()->avatar?>');"></span><span class="align-div-menu">{{ auth()->user()->name }}</span> <span class="caret  align-div-menu"></span></a>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="user-menu-icon glyphicon glyphicon-user"></span><span>{{ auth()->user()->name }}</span><span class="caret"></span></a>
                            @endif
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Acessar o Painel</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/auth/logout') }}">Sair</a></li>
                            </ul>
                        </li>
                        <li><a href="#" id=""><span class="user-menu-icon glyphicon glyphicon-heart"></span> Favoritos</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
<div id="menu-anuncio-fixo" class="jumbotron1 subhead <?=Request::is('anuncie') ? 'hide' : '' ?>">
    <div class="container">
        <h1>Não perca tempo!</h1>
        <p>Anuncie agora no maior portal de aluguéis do BRASIL.</p>
         <span class="label-free">
             <a href="{{asset('anuncie')}}" id="btn-orange" class="btn btn-anuncio"> Anuncie Agora </a>
         </span>
    </div>
</div>
<section>
    <div class="container">
        <div class="row no-margin">
            @yield('categories')
            @yield('content')


        </div>
    </div>
</section>

<footer>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="footer-texto text-center">
                    <p>Sempre da Negócio  © Todos os direitos reservados. Uma empresa do grupo <strong>Inovar</strong></p>

                </div>
            </div>
        </div>
    </div>
</footer>


<a href="{{url('anuncie')}}" title="Anuncie" class="btn btn-anuncio <?=Request::is('anuncie') ? 'hide' : '' ?>" id="btAnuncie">Anuncie Agora</a>

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

                <div id="login" class="login">

                    <div id="divLogin" class="login-box">
                        <p class="titulo">Já sou cadastrado</p>
                        <p id="mensagemPadrao" class="desc">Se você já é um usuário do Sempre da Negócio, pode fazer seu login abaixo.</p>
                        <p id="mensagemEmailExistente" class="aviso" style="display: none;">O email informado já está cadastrado no Sempre da Negócio Imóveis. Faça seu login abaixo.</p>
                        <div class="rel">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="email" name="email" id="txtEmailUsuarioLogin" class="input input-block-level" placeholder="E-mail" data-toggle="tooltip" title="Este campo deve ser preenchido" autocapitalize="off" />
                                <img id="imgLoadingEmail" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20" />
                        </div>

                        <input type="password" id="txtSenhaUsuario" name="password" class="input input-block-level" placeholder="Senha" data-toggle="tooltip" title="Este campo deve ser preenchido">

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

                        <input id="txtNomeUsuarioCadastro" class="input input-block-level span3" type="text" placeholder="Nome e sobrenome">
                        <div class="rel">
                            <input type="email" id="txtEmailUsuarioCadastro" onkeyup="EnterMiniCadastro(event);" class="input input-block-level span3" placeholder="E-mail" autocapitalize="off">
                            <img id="imgLoadingMiniCadastro" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                        </div>
                        <a href="javascript:void(0);" id="btnCadastrar" class="pull-right" onclick="IrParaCadastroCompleto();">Cadastrar</a>
                        <p class="info">Você será direcionado para completar seu cadastro com mais algumas informações.</p>
                    </div>
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

                    <div class="auth-loading hide">
                        <p class="message">
                            <img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading">
                            <span>Finalizando seu cadastro…<br> Aguarde!</span>
                        </p>
                    </div>

                    <div class="error-distance hide">
                        <div class="message">
                            <span class="icone-fechar-modal"></span>
                            <span class="text">Infelizmente não conseguimos<br> concluir seu cadastro.</span>
                        </div>
                    </div>

                    <div class="saved-distance hide">
                        <div class="message">
                            <span class="icone-check"></span>
                            <span class="text">Cadastro criado com sucesso!</span>
                        </div>
                    </div>

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
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/npm.js')}}"></script>

<script src="{{asset('js/nouislider.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/infinitescroll.js')}}"></script>

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAExt7vsJrLsnF3UQ7fk_ix51BderXpv6Q"
       type="text/javascript"></script> -->
<script src="/vendor/artesaos/cidades/js/scripts.js"></script>
<script src="{{asset('js/site.js')}}"></script>
@if (session('status'))
    <script>
        swal("Parabéns!", "Seu anúncio foi criado com sucesso!", "success")
    </script>
@endif
</body>
</html>


