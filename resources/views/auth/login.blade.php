@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 10%">
                <div class="panel panel-default">
                    <div class="panel-heading">Acesso</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Opa!</strong> Houve alguns erros digitados no campos.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-6 input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="seuemail@email.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Senha</label>
                                <div class="col-md-6 input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Sua senha aqui...">

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Entrar</button>

                                    <a class="btn btn-link" href="{{ url('/password/email') }}">Esqueci minha senha?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
