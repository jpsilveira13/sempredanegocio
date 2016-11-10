@extends('site.layout')

@section('content')

@section('csnoticia')
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('jsnoticia')
    <script src="{{asset('js/responsiveslides.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });

        $( "span.menu" ).click(function() {
            $( ".head-nav ul" ).slideToggle(300, function() {
                // Animation complete.
            });
        });
        $(window).load(function() {

            $("#flexiselDemo3").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems: 3
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });

    </script>
@endsection


<div class="container">
    <div class="col-md-9 bann-right">
        <!-- banner -->
        <div class="banner">
            <div class="header-slider">
                <div class="slider">
                    <div class="callbacks_container">
                        <ul class="rslides" id="slider">
                            @foreach($noticias as $noticia)
                                <li>
                                    <img src="{{url('galeria/blog')}}/{{$noticia->url_image}}" class="img-responsive" alt="">
                                    <div class="caption">
                                        <h3>{{str_limit($noticia->titulo,100)}}</h3>
                                        <p>{!! str_limit($noticia->descricao,150) !!}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner -->
        <!-- nam-matis -->
        <div class="nam-matis">

            @foreach($noticias as $noticia)
                <div class="col-md-6 col-sm-12 nam-matis-1">
                    <a href="{{url('blog')}}/{{$noticia->url_site}}"><img src="{{url('galeria/blog')}}/{{$noticia->url_image}}" class="img-responsive" alt=""></a>
                    <h3><a href="#">{{str_limit($noticia->titulo,100)}}</a></h3>
                    <p>{!! str_limit($noticia->descricao,150) !!}</p>
                </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
        <!-- nam-matis -->
    </div>
    <div class="col-md-3 bann-left">
        <div class="b-search">
            <form>
                <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar';}">
                <input type="submit" value="">
            </form>
        </div>
        <h3>Notícias Recentes</h3>
        <div class="blo-top">
            @foreach($noticias as $noticia)
            <div class="blog-grids">
                <div class="blog-grid-left">
                    <a href="{{url('blog')}}/{{$noticia->url_site}}"><img src="{{url('galeria/blog')}}/{{$noticia->url_image}}" class="img-responsive" alt=""></a>
                </div>
                <div class="blog-grid-right">
                    <h4><a href="{{url('blog')}}/{{$noticia->url_site}}">{{str_limit($noticia->titulo,20)}} </a></h4>
                    <p>{!! str_limit($noticia->descricao,35) !!} </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            @endforeach
        </div>
       <!-- <h3>Categories</h3>
        <div class="blo-top">
            <li><a href="#">||   Lorem Ipsum passage</a></li>
            <li><a href="#">||   Finibus Bonorum et</a></li>
            <li><a href="#">||   Treatise on the theory</a></li>
            <li><a href="#">||   Characteristic words</a></li>
            <li><a href="#">||   combined with a handful</a></li>
            <li><a href="#">||   which looks reasonable</a></li>
        </div> -->
        <h3>Receber novidades</h3>

        <div class="blo-top">
            <div class="name">
                <form>
                    <input type="text" placeholder="email" required="">
                </form>
            </div>
            <div class="button">
                <form>
                    <input type="submit" value="Receber">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <div class="fle-xsel">
        <ul id="flexiselDemo3">
            @foreach($noticias as $noticia)
            <li>
                <a href="{{url('blog')}}/{{$noticia->url_site}}"><img src="{{url('galeria/blog')}}/{{$noticia->url_image}}" class="img-responsive" alt="">{{str_limit($noticia->titulo,20)}}</a>
            </li>
            @endforeach
        </ul>

        <div class="clearfix"> </div>
    </div>

</div>

@endsection