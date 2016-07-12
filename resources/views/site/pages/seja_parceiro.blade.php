@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="area-anuncio-total">
                <h1 class="anuncio-titulo"><strong>Não perca tempo seja um parceiro<br /> Preencha os campos abaixo.</strong></h1>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('parceiro.form')}}"  method="POST"  role="form" class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <h2><i class="fa fa-newspaper-o"></i> Informações do contato</h2>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Nome: *</label><br />
                                <input type="text" class="form-control input-large" id='nome'  placeholder="Informe o nome" value="{{old('name')}}" name="name" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Email: *</label><br />
                                <input type="email" class="form-control input-large" id='nome'  placeholder="Informe o seu e-mail" value="{{old('email')}}" name="email" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Estado: *</label>
                                <select name="estado" class="form-control" id="estado">
                                    <option value="">Seleciona o estado</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AM">AM</option>
                                    <option value="AP">AP</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MG">MG</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="PR">PR</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="RS">RS</option>
                                    <option value="SC">SC</option>
                                    <option value="SE">SE</option>
                                    <option value="SP">SP</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Cidade: *</label><br />
                                <input type="text" class="form-control" id='nome'  placeholder="Informe a sua cidade" value="{{old('cidade')}}" name="cidade" required />
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Telefone/Celular: *</label><br />
                                <input onkeypress="mascaraCampo(this, mtel)" required type="text" class="form-control" maxlength="15" id='telefone'  placeholder="Informe o telefone" value="{{old('tel')}}" name="telefone" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <label>Assunto : *</label>
                            <textarea class="form-control" required rows="12" name="assunto" placeholder="Ex.: Informe o assunto do contato">{{old('assunto')}}</textarea>
                        </div>
                    </div>
                    <br /><br />
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <button id="btn-orange" style="display: block;" type="submit" class="btn btn-ads btn-azul center-block">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection