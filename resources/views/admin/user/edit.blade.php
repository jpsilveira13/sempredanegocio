@extends('app')

@section('content')
        @include('errors._check')
        <div class="row">
                <div class="col-lg-12">
                        <h1 class="page-header adminFontTitulo">
                                Alterar Dados Usuário
                        </h1>

                        <ol class="breadcrumbProduct">
                                <li class="activeProduct">
                                        <i class="fa fa-dashboard"></i> Painel administrativo > Editar usuário
                                </li>
                        </ol>
                </div>
        </div>
        {!! Form::open(['route'=>['usuarios.update',$user->id],'method'=>'put']) !!}
        <div class="row">
                <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                                {!! Form::label('name','Nome:')!!}
                                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'nome']) !!}
                        </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                                {!! Form::label('email','Email:')!!}
                                {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'e-mail']) !!}
                        </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                                {!! Form::label('phone','Telefone:')!!}
                                {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'telefone']) !!}
                        </div>
                </div>
        </div>
        <div class="row">
                <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                                {!! Form::label('state', 'Seleciona um Estado:', ['class' => '']) !!}
                                {!! Form::select('state', $states, $user->uf, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                        <div class="form-group">
                                {!! Form::label('city', 'Informe a cidade:', ['class' => '']) !!}
                                {!! Form::text('city', $user->city, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>
                </div>
        </div>
        <div class="row">
                <div class="form-group">
                        {!! Form::submit('Salvar',['class'=>'btn btn-primary'])!!}
                </div>
        </div>
        {!! Form::close() !!}
@endsection