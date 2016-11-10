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
    <div class="content-top">

        <div class="single col-md-12">
            <div class="single-top">
                <h1>{{$noticiaInt->titulo}}</h1>
                <br />
                <img src="{{url('galeria/blog')}}/{{$noticiaInt->url_image}}" class="img-responsive" alt="">
                {!! $noticiaInt->descricao !!}
                <div class="artical-links">
                    <ul class="no-padding">
                        <li><small> </small><span>{{ date("d/m/Y H:i:s", strtotime($noticiaInt->created_at)) }}</span></li>
                        <li><a href="#"><small class="admin"> </small><span>Maurício Crivellin</span></a></li>

                        <li><a href="#"><small class="posts"> </small><span>10 pessoas viram o post</span></a></li>

                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

</div>
<br><br><br><br><br><br>
    @endsection