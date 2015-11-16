<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comercial Milimétrica</title>
    <meta name="keywords" content="Comercial Milimétrica, Ferramentas,Materias elétricos"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link href="{{ asset('site/css/site.css') }}" rel="stylesheet">


    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body ng-app="milimetricaApp">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<header>

    <div class="row">
        <div class="container">
            <div class="col-sm-12 col-md-4 col-lg-4" id="logo">
                <h1 class="margin-bottom-img">
                    <a href="/" title="Comercial Milimétrica">
                        <img src="{{ asset('site/images/logo.png') }}" alt="Comercial Milimétrica" />
                    </a>
                </h1>
            </div>
            <!-- end area logo -->
            <div class="col-sm-12 col-md-8 col-lg-8" id="options">
                <div class="col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-xs item">
                    <a href="javascript:void(0)">
                        <i class="fa fa-phone"></i>
                        <span>(82) 3375.3087</span>
                    </a>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-xs item padding-nossa-loja">
                    <a href="{{url('institucional/nossa-loja')}}">
                        <i class="fa fa-map-marker"></i>
                        <span> Nossa loja</span>
                    </a>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-xs item padding-orcamento">
                    <a href="{{url('servicos/pedido-de-orcamento')}}">
                        <i class="fa fa-pencil-square-o"></i>
                        <span>pedir orçamento</span>
                    </a>
                </div>
                <div class="col-md-12 col-lg-12 form">
                    <form action="#" method="POST" id="search-form">
                        <input type="text" name="search"  placeholder="Digite o nome do produto que você está procurando." id="search-input" autocomplete="off" />
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <div id="listaProdutos"></div>
                    </form>
                </div>
            </div>
        </div><!-- end class container -->
    </div>
    <section id="menu">
        <div class="container">
            <nav class="navbar navbar-default no-background no-border no-margin-bottom">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed half-margin" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-menu-margin no-padding-left" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="menu-hover">
                            <li><a class="<?= Request::is('site/materiais-para-construcao')  ? '' : 'menu-active' ?>" href="{{url('materiais-para-construcao')}}">Materias de Construção <span class="sr-only">(current)</span></a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('site/hidraulica')}}">Hidráulica</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('site/eletrica')}}">Elétrica</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('epis')}}">Epi's</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('tintas')}}">Tintas</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('abrasivos')}}">Abrasivos</a></li>
                            <li class="divider"></li>

                            <li class="divider"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i> Mais categorias </a>
                                <ul class="dropdown-menu" id="menu-dropdown-list">

                                    <li><a href="{{url('maquinas')}}">Máquinas</a></li>
                                    <li role="separator" class="divider-border"></li>
                                    <!-- <li><a href="#">Cozinha e Lavanderia</a></li>
                                    <li role="separator" class="divider-border"></li>
                                    <li><a href="#">Organização e Decoração</a></li>
                                    <li role="separator" class="divider-border"></li>
                                    <li><a href="#">Portas e Janelas</a></li>
                                    <li role="separator" class="divider-border"></li>-->
                                    <li><a href="{{url('ferramentas')}}">Ferramentas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </section>
</header>

@yield('content')
<!-- newsletter -->
<section id="newsletter">
    <div class="row">
        <div class="container">
            <div class="col-md-4 col-lg-4">
                <img class="center-block img-responsive" src="{{asset('site/images/newsletter-mail.png')}}" alt="NewsLetter" />
            </div>
            <div class="col-md-7 col-lg-7 col-newsletter-right">
                <h2>
                    RECEBA AS NOVIDADES DA<br />
                    <b class="yellow">COMERCIAL MILIMÉTRICA</b>
                </h2>
                <p>Cadastre seu e-mail abaixo e fique sabendo de todas as novidades e promoções em nossas lojas.</p>
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Informe seu email" autocomplete="off" required />
                    <button>Cadastrar</button>
                </form>

            </div>

        </div>
    </div>
</section>
<section class="hidden-xs col-md-12" id="brands">
    <div class="row">
        <div class="container">
            <div class="col-lg-12 text-center" id="brand">
                <img src="{{asset('site/images/famastil.jpg')}}" alt="FAMASTIL" />
                <img src="{{asset('site/images/fame.jpg')}}" alt="FAME" />
                <img src="{{asset('site/images/lorenzetti.jpg')}}" alt="#" />
                <img src="{{asset('site/images/blackdecker.jpg')}}" alt="#" />
            </div>
        </div>
    </div>

</section>
<footer class="no-padding">
    <div class="row">
        <div class="container">
            <div class="col-sm-12 col-md-3 col-lg-3" id="columns">
                <h3 class="no-margin-bottom">Departamentos</h3>
                <ul>
                    <li><a href="{{url('materiais-para-construcao')}}">Materiais para Construção</a> </li>
                    <li><a href="{{url('hidraulica')}}">Hidráulica</a> </li>
                    <li><a href="{{url('eletrica')}}">Elétrica</a></li>
                    <li><a href="{{url('tintas')}}">Tintas</a></li>
                    <li><a href="{{url('ferramentas')}}">Ferramentas</a></li>
                    <li><a href="{{url('maquinas')}}">Máquinas</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3" id="columns">
                <h3 class="no-margin-bottom">Institucional</h3>
                <ul>
                    <li><a href="{{url('institucional/quem-somos')}}">Quem Somos</a> </li>
                    <li><a href="{{url('institucional/nossa-loja')}}">Nossas Lojas</a> </li>
                    <li><a href="">Trabalhe Conosco</a> </li>
                    <li><a href="">Regiões de Entrega</a> </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3" id="columns">
                <h3 class="no-margin-bottom">Ajuda</h3>
                <ul>
                    <li><a href="">Formas de Pagamento</a> </li>
                    <li><a href="">Política de Troca e Devoluções</a> </li>
                    <li><a href="{{url('auth/login')}}"> <i class="fa fa-user"></i>&nbsp;Acesso ao Sistema</a> </li
                </ul>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3" id="columns">
                <h3 class="no-margin-bottom">Fale Conosco</h3>
                <ul>
                    <li><i class="fa fa-phone"></i> <span>(82) 3375.3087</span> </li>
                    <li><i class="fa fa-clock-o"></i> <span>Segunda à sexta dás 07:30 às 18:00<br />  Sábado dás 07:30 às 12:30</span> </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid backgroundFundo">
            <div class="container container1000px">
                <span class="textFooter">Comercial Milimétrica ©  <?=date('Y')?> todos os direitos reservados |

                <div style="width: 25%; line-height: 28px;" class="fb-like"></div></span>
            </div>
        </div>
    </div>
    <div id="toTop"></div>
</footer>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('site/js/site.js') }}"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</body>
</html>
