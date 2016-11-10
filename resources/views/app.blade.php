<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Sistema Sempre da Negócio</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('admin/css/sweetalert.css') }}" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <?php $i = 0 ?>
    @foreach(auth()->user()->mensagens()->get() as $contador)
    @if($contador->visto == 0)
    <?php $i++ ?>
    @endif
    @endforeach
            <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" alt="Voltar ao site" href="{{url('/')}}"><img class="img-responsive tam-logo-adm" src="{{url('images/logo312x33.png')}}" alt="Sempre da Negócio" title="Sempre da Negócio "/> </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li>
                <a class="style-menu-header" href="{{url('anuncie')}}" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></i> Anuncie</a>
            </li>
            @if(auth()->user()->typeuser_id == 1)
                <li class="dropdown">
                    <a href="{{route('leilao')}}" class="dropdown-toggle style-menu-header"><i class="fa fa-gavel"></i><span class="badge estilo-numero">{{\Session::get('lances')}}</span></a>
                </li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle style-menu-header" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge estilo-numero">{{$i}}</span> <b class="caret"></b></a>

                <ul class="dropdown-menu message-dropdown">
                    @if(auth()->user()->mensagens()->count() >0)
                        @foreach(auth()->user()->mensagens()->get() as $mensagem)
                            <li class="message-preview">

                                <a href="{{url()}}/admin/mensagens/message/view/<?=$mensagem->id?>">
                                    <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">

                                            <h5 class="media-heading"><strong></strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> {{ date("d/m/Y H:i:s", strtotime($mensagem->created_at)) }}</p>
                                            <p>{{str_limit($mensagem->mensagem,15)}}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        <li class="message-footer">
                            <a href="{{url('admin/mensagens')}}">Ver todas mensagens</a>
                        </li>
                    @else
                        <li class="message-footer">
                            <a href="#">Não há mensagens cadastradas</a>
                        </li>
                    @endif
                </ul>
            </li>
            <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle style-menu-header" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
          -->

            <li class="dropdown">

                @if(!auth()->user()->avatar)
                    <a style="padding: 16px 15px 19px;" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{auth()->user()->name}}<b class="caret"></b></a>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="user-menu-icon" style="background-image: url('<?=auth()->user()->avatar?>');"></span>
                        <span class="align-div-menu">{{auth()->user()->name}}</span>

                        <b class="caret mt18neg"></b>
                    </a>
                @endif
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Mensagens</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Opções</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{url('auth/logout')}}"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="{{url('/admin/home')}}"><i class="fa fa-fw fa-dashboard"></i> Painel Principal</a>
                </li>

                <li>
                    @if(auth()->user()->typeuser_id == '1')
                        <a href="{{route('anuncios')}}"><i class="fa fa-tag"></i> Gerenciar Anúncios</a>
                    @else
                        <a href="{{route('anuncios')}}"><i class="fa fa-tag"></i> Meus Anúncios</a>
                    @endif


                </li>
                <li>
                    <a href="{{route('mensagens')}}"><i class="fa fa-fw fa-comments"></i> Mensagens</a>
                </li>
                <li>
                    @if(auth()->user()->typeuser_id == '1')
                        <a href="{{route('adm')}}"><i class="fa fa-tag"></i> Painel ADM</a>
                        <a href="{{route('leads')}}"><i class="fa fa-tag"></i> Leads</a>
                    @endif
                </li>

                <!--
     <li>
         <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
         <ul id="demo" class="collapse">
             <li>
                 <a href="#">Dropdown Item</a>
             </li>
             <li>
                 <a href="#">Dropdown Item</a>
             </li>
         </ul>
     </li>-->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <!-- /#page-wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

</div>
<!-- /#wrapper -->

<!-- Scripts -->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/dropzone.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/js/admin.js') }}"></script>
<script src="{{asset('admin/js/sweetalert.min.js')}}"></script>
</body>
</html>
