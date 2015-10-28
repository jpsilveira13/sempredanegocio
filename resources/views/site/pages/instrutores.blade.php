@extends('site.layout')

@section('content')
    <div class="instrutor-fundo-imagem">
        <div class="container contato-margem-bottom">
            <div class="col-lg-12 no-padding pagina-titulo">
                <h2>Instrutores</h2>
            </div>
        </div>
        <div class="container">


            <div class="col-lg-3 col-md-4 col-sm-6 instrutor-estilo-margin-bottom text-center instrutor-estilo">

                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"> <img class="img-responsive img-circle center-block img-rounded borda-image" width="200" height="200" src="{{asset('images/joaoferreira.jpg')}}" /></a>
                <h3>João Ferreira</h3>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Saiba Mais</a>

            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 instrutor-estilo-margin-bottom text-center instrutor-estilo">

                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"> <img class="img-responsive img-circle center-block img-rounded borda-image" width="200" height="200" src="{{asset('images/alcicabral.jpg')}}" /></a>
                <h3>Alci Cabral</h3>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Saiba Mais</a>

            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 instrutor-estilo-margin-bottom text-center instrutor-estilo">

                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"> <img class="img-responsive  img-circle center-block img-rounded borda-image" width="200" height="200" src="{{asset('images/joaoferreira.jpg')}}" /></a>
                <h3>João Ferreira</h3>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Saiba Mais</a>

            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 instrutor-estilo-margin-bottom text-center instrutor-estilo">

                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"> <img class="img-responsive img-circle center-block img-rounded borda-image" width="200" height="200" src="{{asset('images/joaoferreira.jpg')}}" /></a>
                <h3>João Ferreira</h3>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Saiba Mais</a>

            </div>


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="myModalLabel">Mais Sobre o João Ferreira</h4>
                        </div>
                        <div class="modal-body">
                            <center>
                                <img class="img-responsive img-circle center-block img-rounded borda-image" width="200" height="200" src="{{asset('images/joaoferreira.jpg')}}" />
                                <h3 class="media-heading">João Ferreira <small>BR</small></h3>
                                <span><strong>Habilidades: </strong></span>
                                <span class="label label-warning">HTML5/CSS</span>
                                <span class="label label-info">Adobe CS 5.5</span>
                                <span class="label label-info">Microsoft Office</span>
                                <span class="label label-success">Windows XP, Vista, 7</span>
                            </center>
                            <hr>
                            <center>
                                <p class="text-left"><strong>Bio: </strong><br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                                <br>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection