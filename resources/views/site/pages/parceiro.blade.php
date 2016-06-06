@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="area-anuncio-total">
                <h1 class="anuncio-titulo"><strong>Seja um de nosso parceiros, preencha os campos abaixos e entra em contato conosco.</strong></h1>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('adquirir')}}" method="post"  role="form" class="form-group " accept-charset="UTF-8" id="budget-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h2><i class="fa fa-newspaper-o"></i> Informações do contato</h2>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Nome: *</label>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection