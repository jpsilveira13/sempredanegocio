@extends('site.layout')

@section('content')
    <div class="instrutor-fundo-imagem">
        <div class="container contato-margem-bottom">
            <div class="col-lg-12 no-padding pagina-titulo">
                <h2>CONTATO</h2>
            </div>
            <div class="row">
                <form role="form" id="contact-form" class="contact-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome" autocomplete="off" id="nome" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefone" autocomplete="off" id="telefone" placeholder="Telefone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">

                            <div class="form-group">
                                <input type="tel" maxlength="25" class="form-control" name="estado" autocomplete="off" id="estado" placeholder="Estado">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" maxlength="50" name="cidade" autocomplete="off" id="cidade" placeholder="Cidade">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" maxlength="100" name="endereco" autocomplete="off" id="endereco" placeholder="Endereço">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control textarea" rows="3" name="mensagem" id="mensagem" placeholder="Mensagem"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn main-btn pull-right">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-mapa">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection