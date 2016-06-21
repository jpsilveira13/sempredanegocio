@extends('site.layout')

@section('content')
    @include('site.pages._etapa')

    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="logmod">
            <div class="logmod__wrapper center-block">
                <div class="logmod__container">
                    <ul class="logmod__tabs">
                        <li data-tabtar="lgm-2"><a href="#">Clica aqui Entrar</a></li>
                        <li data-tabtar="lgm-1"><a href="#">Clica aqui para Registrar</a></li>
                    </ul>
                    <div class="logmod__tab-wrapper">
                        <div class="logmod__tab lgm-1">
                            <div class="logmod__heading">
                                <span class="logmod__heading-subtitle">Entra com seus dados <strong>para criar sua conta</strong></span>
                            </div>
                            <div class="logmod__form">
                                <form d="register-form" action="{{ url('/auth/register') }}" method="POST" role="form" accept-charset="utf-8"class="simform">
                                    {!! csrf_field() !!}
                                    <div class="sminputs">
                                        <div class="input full">
                                            <label class="string optional" for="Nome">Nome*</label>
                                            <input class="string optional" maxlength="255" id="user-email" name="name" placeholder="Informe seu nome" type="text" size="50" />
                                        </div>
                                    </div>
                                    <div class="sminputs">
                                        <div class="input full">
                                            <label class="string optional" for="email">Email*</label>
                                            <input class="string optional" maxlength="255" id="user-email" name="email" placeholder="Insira o email" type="email" size="50" />
                                        </div>
                                    </div>
                                    <div class="sminputs">
                                        <div class="input string optional">
                                            <label class="string optional" for="user-pw">Senha *</label>
                                            <input class="string optional" maxlength="255" name="password" id="user-pw" placeholder="Insira a senha" type="password" size="50" />
                                        </div>
                                        <div class="input string optional">
                                            <label class="string optional" for="user-pw-repeat">Confirmar a senha *</label>
                                            <input class="string optional" maxlength="255" id="user-pw-repeat" name="password_confirmation" placeholder="Confirma a senha" type="password" size="50" />
                                        </div>
                                    </div>
                                    <div class="simform__actions">
                                        <input class="sumbit" name="commit" type="submit" value="Criar Conta" />
                                        <span class="simform__actions-sidetext">Ao criar a conta você concorda com nossos <a class="special" href="#" target="_blank" role="link">Termos & Serviços</a></span>
                                    </div>
                                </form>
                            </div>
                            <div class="logmod__alter">
                                <div class="logmod__alter-container">
                                    <a href="{{ route('social.login', ['facebook']) }}" class="connect facebook">
                                        <div class="connect__icon">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <div class="connect__context">
                                            <span>Criar conta pelo <strong>Facebook</strong></span>
                                        </div>
                                    </a>

                                    <a href="#" class="connect googleplus">
                                        <div class="connect__icon">
                                            <i class="fa fa-google-plus"></i>
                                        </div>
                                        <div class="connect__context">
                                            <span>Criar conta pelo <strong>Google+</strong></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="logmod__tab lgm-2">
                            <div class="logmod__heading">
                                <span class="logmod__heading-subtitle">Entra com seu email e senha <strong>para entrar</strong></span>
                            </div>
                            <div class="logmod__form">
                                <form accept-charset="utf-8"action="{{ url('/auth/login') }}" method="POST" class="simform">
                                    {!! csrf_field() !!}
                                    <div class="sminputs">
                                        <div class="input full">
                                            <label class="string optional" for="email">Email*</label>
                                            <input class="string optional" maxlength="255" id="user-email" placeholder="Email" name="email" type="email" size="50" />
                                        </div>
                                    </div>
                                    <div class="sminputs">
                                        <div class="input full">
                                            <label class="string optional" for="user-pw">Senha *</label>
                                            <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" name="password" type="password" size="50" />
                                            <span class="hide-password">Mostrar</span>
                                        </div>
                                    </div>
                                    <div class="simform__actions">
                                        <input class="sumbit" name="commit" type="submit" value="Entrar" />
                                        <span class="simform__actions-sidetext"><a class="special" role="link" href="{{ url('/password/email') }}">Esqueceu a senha?</a></span>
                                    </div>
                                </form>
                            </div>
                            <div class="logmod__alter">
                                <div class="logmod__alter-container">
                                    <a href="{{ route('social.login', ['facebook']) }}" class="connect facebook">
                                        <div class="connect__icon">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <div class="connect__context">
                                            <span>Entrar com <strong>Facebook</strong></span>
                                        </div>
                                    </a>
                                    <a href="#" class="connect googleplus">
                                        <div class="connect__icon">
                                            <i class="fa fa-google-plus"></i>
                                        </div>
                                        <div class="connect__context">
                                            <span>Entrar com <strong>Google+</strong></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading panel-padding-style">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Registrar</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="{{ url('/auth/login') }}" method="POST" role="form" style="display: block;">
                                    {!! csrf_field() !!}
                <div class="form-group">
                    <input type="email" required name="email" id="username" tabindex="1" class="form-control" placeholder="Informe seu e-mail" value="">
                </div>
                <div class="form-group">
                    <input required type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Informe sua senha">
                </div>
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Lembrar-me</label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button type="submit"  id="login-submit" tabindex="4" class="form-control btn btn-login">Entrar</button>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    ou
                    <br /><br />
                    <div class="btn-facebook" id="imgFacebook">
                        <a href="{{ route('social.login', ['facebook']) }}"> <span class="icone-facebook"> Login com Facebook</span></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Esqueceu a senha?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="{{ url('/auth/register') }}" method="POST" role="form" style="display: none;">
                                    {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Informe seu nome" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Informe o seu email" value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Informe a sua senha" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="confirm-password" tabindex="2" name="password_confirmation" class="form-control" placeholder="Confirma a senha" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <button type="submit" id="register-submit" tabindex="4" class="form-control btn btn-register">Cadastrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
@endsection