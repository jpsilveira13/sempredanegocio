@extends('site.layout')

@section('content')

	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary centro">
				<div class="panel-heading">Resetar senha</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Encontramos alguns erros na sua solicitação<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						{!! csrf_field() !!}
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-mail</label>
							<div class="col-md-6">
								<input type="email" required class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirma a senha</label>
							<div class="col-md-6">
								<input type="password" required class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success btn-azul">
									Trocar a senha
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
