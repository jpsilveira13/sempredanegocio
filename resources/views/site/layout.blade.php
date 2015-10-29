<!DOCTYPE html>
<html lang="pt-br">
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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">

</head>

<body>
<header>

    <div class="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text-uppercase no-padding logo-topo" href="/">
                        <img src="{{asset('images/logo.png')}}" class="img-responsive menu-logo-display" title="Fire Walking Brasil" alt="Logo Fire Walking Brasil"/>

                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-header-margem" id="navigation">
                    <ul class="nav navbar-nav navbar-right position-relative">
                        <li><a href="#">Quem Somos </a></li>
                        <li><a href="{{url('eventos')}}">Eventos</a></li>

                        <li><a href="{{url('contato')}}">Contato</a></li>
                        <li><button type="button" id="btn-roxo" class="btn btn-success navbar-btn btn-circle btn-login-color" ><i class="fa fa-user"></i> Minha Conta</button></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="jumbotron1 subhead">
    <div class="container">
        <h1>Não perca tempo!</h1>
        <p>Anuncie agora no maior portal de aluguéis do BRASIL.</p>
         <span class="label-free">
                             <a href="" id="btn-orange" class="btn btn-large"> Anuncie Agora </a>
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
                    <p>Sempre da negócio  © Todos os direitos reservados.</p>

                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/npm.js') }}"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="{{asset('js/site.js')}}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
</body>
</html>