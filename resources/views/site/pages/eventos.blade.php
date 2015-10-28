@extends('site.layout')

@section('content')
    <div class="instrutor-fundo-imagem">
        <div class="container contato-margem-bottom">
            <div class="col-lg-12 no-padding pagina-titulo">
                <h2>Eventos</h2>
            </div>
        </div>
        <div class="container evento-tab-estilo">
            <div class="panel with-nav-tabs panel-primary center-block div-half">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1primary" data-toggle="tab">Eventos Principais</a></li>
                        <li><a href="#tab2primary" data-toggle="tab">Treinamento Instrutor</a></li>
                        <li><a href="#tab3primary" data-toggle="tab">Eventos Coorporativos</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            @for($i = 0;$i<14;$i++)
                                <div class="row contato-margem-bottom">
                                    <div class="col-md-4 contato-margem-bottom">
                                        <img src="{{asset('images/eventoteste.jpg')}}" class="center-block img-thumbnail img-responsive" width="140" height="140" class="img-thumbnail img-responsive" />
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <p class="evento-titulo-estilo">Empowerment Coach and Firewalk Instructor Certification (FIT): Delaware</p>
                                        <p class="evento-data-estilo">September 23,2015 - September 26,2015 <br /> INSTRUTOR: João Ferreira</p>
                                        <a class="btn btn-primary btn-cor-verde" data-toggle="modal" data-target="#contact" data-original-title>
                                            Inscreva-se
                                        </a>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                            @for($i = 0;$i<14;$i++)
                                <div class="row contato-margem-bottom">
                                    <div class="col-md-4 contato-margem-bottom">
                                        <img src="{{asset('images/eventoteste.jpg')}}" class="center-block img-thumbnail img-responsive" width="140" height="140" class="img-thumbnail img-responsive" />
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <p>Empowerment Coach and Firewalk Instructor Certification (FIT): Delaware</p>
                                        <p>September 23,2015 - September 26,2015</p>
                                        <p>INSTRUCTOR: João Ferreira</p>
                                        <a class="btn btn-primary btn-cor-verde" data-toggle="modal" data-target="#contact" data-original-title>
                                            Inscreva-se
                                        </a>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="tab-pane fade" id="tab3primary">
                            @for($i = 0;$i<14;$i++)
                                <div class="row contato-margem-bottom">
                                    <div class="col-md-4 contato-margem-bottom">
                                        <img src="{{asset('images/eventoteste.jpg')}}" class="center-block img-thumbnail img-responsive" width="140" height="140" class="img-thumbnail img-responsive" />
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <p>Empowerment Coach and Firewalk Instructor Certification (FIT): Delaware</p>
                                        <p>September 23,2015 - September 26,2015</p>
                                        <p>INSTRUCTOR: João Ferreira</p>
                                        <a class="btn btn-primary btn-cor-verde" data-toggle="modal" data-target="#contact" data-original-title>
                                            Inscreva-se
                                        </a>
                                    </div>
                                </div>
                            @endfor
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span>O que está esperando? Inscreva-se já.</h4>
                </div>
                <form action="#" method="post" accept-charset="utf-8">
                    <div class="modal-body" style="padding: 5px;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <input class="form-control" name="primeironome" placeholder="Primeiro nome" type="text" required autofocus />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <input class="form-control" name="ultimonome" placeholder="Último nome" type="text" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <input class="form-control" name="email" placeholder="E-mail" type="text" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <input class="form-control" name="assunto" placeholder="Assunto" type="text" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea style="resize:vertical;" class="form-control" placeholder="Mensagem..." rows="6" name="mensagem" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="margin-bottom:-14px;">
                        <input type="submit" class="btn btn-success" value="Enviar"/>
                        <!--<span class="glyphicon glyphicon-ok"></span>-->
                        <input type="reset" class="btn btn-danger" value="Limpar" />
                        <!--<span class="glyphicon glyphicon-remove"></span>-->
                        <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Fechar</button>
                    </div>
            </div>
        </div>
    </div>
    </div>

@endsection