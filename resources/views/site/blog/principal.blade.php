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
                            <li>
                                <img src="images/1.jpg" class="img-responsive" alt="">
                                <div class="caption">
                                    <h3>Maecenas malesuada elit lectus felis</h3>
                                    <p>Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus.</p>
                                </div>
                            </li>
                            <li>
                                <img src="images/4.jpg" class="img-responsive" alt="">
                                <div class="caption">
                                    <h3>Curabitur et ligula. Ut molestie </h3>
                                    <p>Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulu. </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/5.jpg" class="img-responsive" alt="">
                                <div class="caption">
                                    <h3>Etiam ullamcorper. Suspendisse</h3>
                                    <p>Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/6.jpg" class="img-responsive" alt="">
                                <div class="caption">
                                    <h3>Suspendisse a pellentesque dui</h3>
                                    <p>Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada .</p>
                                </div>
                            </li>
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
                    <a href="#"><img src="{{url('galeria/blog')}}/{{$noticia->url_image}}" class="img-responsive" alt=""></a>
                    <h3><a href="#">{{str_limit($noticia->titulo,100)}}</a></h3>
                    <p>{{str_limit($noticia->descricao,150)}}</p>
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
            <div class="blog-grids">
                <div class="blog-grid-left">
                    <a href="single.html"><img src="images/1b.jpg" class="img-responsive" alt=""></a>
                </div>
                <div class="blog-grid-right">
                    <h4><a href="single.html">Lorem Ipsum </a></h4>
                    <p>pellentesque dui, non felis. Maecenas male </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="blog-grids">
                <div class="blog-grid-left">
                    <a href="single.html"><img src="images/2b.jpg" class="img-responsive" alt=""></a>
                </div>
                <div class="blog-grid-right">
                    <h4><a href="single.html">Little Invaders </a></h4>
                    <p>pellentesque dui, non felis. Maecenas male </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="blog-grids">
                <div class="blog-grid-left">
                    <a href=""><img src="images/3b.jpg" class="img-responsive" alt=""></a>
                </div>
                <div class="blog-grid-right">
                    <h4><a href="single.html">Little Invaders </a></h4>
                    <p>pellentesque dui, non felis. Maecenas male </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <h3>Categories</h3>
        <div class="blo-top">
            <li><a href="#">||   Lorem Ipsum passage</a></li>
            <li><a href="#">||   Finibus Bonorum et</a></li>
            <li><a href="#">||   Treatise on the theory</a></li>
            <li><a href="#">||   Characteristic words</a></li>
            <li><a href="#">||   combined with a handful</a></li>
            <li><a href="#">||   which looks reasonable</a></li>
        </div>
        <h3>Newsletter</h3>

        <div class="blo-top">
            <div class="name">
                <form>
                    <input type="text" placeholder="email" required="">
                </form>
            </div>
            <div class="button">
                <form>
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <div class="fle-xsel">
        <ul id="flexiselDemo3">
            <li>
                <a href="#">
                    <div class="banner-1">
                        <img src="images/6.jpg" class="img-responsive" alt="">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="banner-1">
                        <img src="images/5.jpg" class="img-responsive" alt="">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="banner-1">
                        <img src="images/1.jpg" class="img-responsive" alt="">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="banner-1">
                        <img src="images/4.jpg" class="img-responsive" alt="">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="banner-1">
                        <img src="images/6.jpg" class="img-responsive" alt="">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="banner-1">
                        <img src="images/1.jpg" class="img-responsive" alt="">
                    </div>
                </a>
            </li>
        </ul>

        <div class="clearfix"> </div>
    </div>

</div>

@endsection