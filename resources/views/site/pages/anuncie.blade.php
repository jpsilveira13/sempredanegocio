@extends('site.layout')

@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="area-anuncio-total">
                <h1 class="anuncio-titulo"><strong>Postar o seu anúncio é GRÁTIS, rápido e fácil!</strong></h1>
                <p class="anuncio-texto-header">O seu anúncio pode ser visto todos os dias por milhares de pessoas.</p>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="<?=url('anuncie')?>" method="post" data-toggle="validator" role="form" class="form-group anuncio-titulo-estilo" accept-charset="UTF-8" enctype="multipart/form-data"  id="budget-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h2><i class="fa fa-newspaper-o"></i> Informações do anúncio</h2>
                            <hr />
                        </div>
                    </div>
                    <!-- html responsivo -->
                    <!-- category -->
                    <div class="col-xs-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group center-block width-half">
                                    <label class="radio-inline pull-right">
                                        <input type="radio" name="tipo_anuncio" required value="venda">Vendo
                                    </label>
                                    <label class="radio-inline pull-left">
                                        <input type="radio" name="tipo_anuncio" required value="aluga">Alugo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row" id="menu-anuncio-responsivo">
                            <div class="center-block col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Categoria">Seleciona a Categoria</label>
                                    <select class="form-control" id="category_id">
                                        <option>Selecione uma categoria</option>
                                        @foreach($anunciecats as $anunciecat)
                                            <option value="{{$anunciecat->id}}" @if(old('anunciecat')== $anunciecat->name) selected="selected" @endif id="{{$anunciecat->id}}">{{$anunciecat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- subcategory -->
                            <div id="divSubCategory" class="center-block col-sm-4 col-md-4 col-xs-12 teste">
                                <div class="form-group">
                                    <label for="Subcategoria">Seleciona a Subcategoria</label>
                                    <select class="form-control" id="subcategory" name="subcategories_id">
                                        <options value="">Escolha uma</options>
                                    </select>
                                </div>
                            </div>
                            <div id="divAdvertSubcategory" class="center-block col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Subcategoria">Seleciona o tipo</label>
                                    <select class="form-control" id="advertcategory">
                                        <options value="">Escolha uma</options>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fim menu responsivo -->
                    </div>
                    <h2><i class="fa fa-map-marker"></i> Sobre a Localização</h2>
                    <hr />
                    <div class="row">
                        <div class="col-md-6 col-lg-6 anuncio-area-localizacao">
                            <div class="form-group has-feedback">
                                <label>CEP: *</label><br />
                                <input type="text" onkeypress="mascaraCampo(this,mascCEP)" class="form-control input-large" id='cep' data-error="Campo não pode ser vazio" placeholder="CEP" value="{{old('cep')}}" name="cep" required maxlength="9"/>
                                <span class="form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback localizacao hide">
                                <label>Estado: *</label><br />
                                <input type="text"  data-minlength="1" class="form-control input-large" id="estado" data-error="Campo não pode ser vazio" required  name="estado" value="{{old('estado')}}" required readonly />
                                <span class="form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback localizacao hide">
                                <label>Cidade: *</label><br />
                                <input type="text"  data-minlength="1" class="form-control input-large" id="cidade" data-error="Campo não pode ser vazio" required  name="cidade" value="{{old('cidade')}}" required readonly />
                                <span class="form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback localizacao hide">
                                <label>Zona/Bairro: *</label><br />
                                <input type="text"  data-minlength="1" class="form-control input-large" id="bairro" data-error="Campo não pode ser vazio" required placeholder="Nome do bairro ou zona*" value="{{old('bairro')}}" name="bairro" required readonly />
                                <span class="form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback localizacao hide">
                                <label>Nome da rua: *</label><br />
                                <input type="text" class="form-control input-large" id='rua' value="{{old('rua')}}" data-error="Campo não pode ser vazio" placeholder="Ex.: Av. Paulista" name="rua" required readonly />
                                <span class="form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Número da casa/prédio: *</label><br />
                                <input maxlength="6" onkeypress="mascaraCampo(this, mascSoNumeros)" type="text" class="form-control input-small" id="numero" placeholder="Ex.: 9999" value="{{old('numero')}}" name="numero" required data-error="Campo não pode ser vazio" />
                                <span class="form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 hidden-sm">
                            <div class="anuncio-area-mapa center-block">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60081.57254231143!2d-47.93496225!3d-19.750978449999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1447264947839" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h2><i class="fa fa-home"></i> Propriedade</h2>
                            <hr />
                        </div>
                    </div>
                    <div id="propriedade1">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label>Número de quartos *</label>
                                    <select class="form-control" required data-error="Seleciona uma opção" required="required" name="numero_quarto">
                                        <option value="">Escolher</option>
                                        @for($i = 0; $i<5;$i++)

                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label>Vagas de garagem *</label>
                                    <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem">
                                        <option value="">Escolher</option>
                                        <option value="0">Nenhum</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5 ou mais</option>
                                    </select>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label>Quantos banheiros *</label>
                                    <select required data-error="Seleciona uma opção" class="form-control" name="numero_suite">
                                        <option value="">Escolher</option>
                                        <option value="0">Nenhum</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5 ou mais</option>
                                    </select>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label>Área Construída: *</label>

                                    <div class="input-group">
                                        <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida">
                                        <div class="input-group-addon">m²</div>

                                    </div>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label>Condomínio: *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">R$</div>
                                        <input class="form-control" maxlength="10" onkeypress="mascaraCampo(this,mvalor)"  data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text" id="valor_condomio" name="valor_condominio">
                                    </div>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="form-group has-feedback">
                                    <label>IPTU: *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">R$</div>
                                        <input class="form-control" maxlength="7" onkeypress="mascaraCampo(this,mvalor)" data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text" id="valor_iptu" name="valor_iptu">
                                    </div>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div id="estilo-checkbox-bootstrap" class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                            <label>Características</label><br />
                            <div id="listCaract"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h2><i class="fa fa-file-text-o"></i>  Seu anúncio</h2>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-xs-12">
                            <div class="form-group has-feedback">
                                <label>Título : *</label>
                                <input type="text"  pattern=".{6,70}" required data-error="Ops! Excedeu o limite do mínimo ou do máximo de caracteres" name="anuncio_titulo" placeholder="Ex.: Vendo Apartamento" class="form-control" />
                                <span class="form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                                <span class="help-block">Números de caracteres maiores que 6 e o máximo de 70.</span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <div class="form-group has-feedback">
                                <label>Descrição : *</label>
                                <textarea class="form-control" required data-error="Ops! Excedeu o limite do mínimo ou do máximo de caracteres" rows="12" name="anuncio_descricao" placeholder="Ex.: Apartamento bem equipado">{{old('anuncio_descricao')}}</textarea>
                                <span class="form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                                <span class="help-block">Campo não pode ser vazio</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-xs-12">
                            <div class="form-group has-feedback">
                                <label>Preço : *</label>
                                <input type="text" value="{{old('preco')}}" class="form-control" onkeypress="mascaraCampo(this,mvalor)" required data-error="Campo não pode ser vazio" maxlength="14" id="preco" name="preco" placeholder="Ex.: 150.00" />
                                <span class="form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 anuncio-titulo-estilo">
                            <h2><i class="fa fa-camera"></i> Fotos</h2>
                            <hr />
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="row">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>Atenção:</strong> Um anúncio com fotos é visto até 8 vezes mais que um anúncio sem foto.
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="upload-image position-relative">
                                    <i class="fa fa fa-camera fa-4x mt6 ml23"></i>
                                    <p class="help-block text-center">Adicionar fotos</p>
                                    <input type="file" multiple id="photos"  name="anuncio_images[]" />
                                </div>
                                <br />
                                <p class="help-block">Você pode fazer o upload de 4 fotos (de até 3Mb, em formatos de jpg ou png).</p>
                            </div>
                            <ul id="photos_clearing" class="clearing-thumbs upload-imagem no-padding" data-clearing></ul>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <h2><i class="fa fa-user"></i> Sua conta</h2>
                                <hr />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="row">

                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group has-feedback">
                                        <label>Nome: *</label>
                                        <input type="text" name='nome-usuario' value="{{Auth::user()->name}}" data-minlength="6" required data-error="Número de caracteres tem que ser maior que 6" class="form-control" />
                                        <span class=" form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group has-feedback">
                                        <label>Telefone: *</label>
                                        <input type="tel" name='telefone-usuario' maxlength="15" onkeypress="mascaraCampo(this, mtel)" required  data-error="Campo não pode ser vazio" maxlength="15" value="{{Auth::user()->phone}}"  class="form-control" />
                                        <span class="form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group has-feedback">
                                        <label  for="inputEmail">Email: *</label>
                                        @if(Auth::user()->email)
                                            <input type="email" id="inputEmail" value='{{Auth::user()->email}}' name='email' required  data-error="Campo não pode ser vazio" readonly class="form-control" />
                                        @else
                                            <input type="email" id="inputEmail" value='' name='email' required  data-error="Campo não pode ser vazio" class="form-control" />
                                        @endif
                                        <span class="form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label>
                                    <input type="checkbox" > Quero receber novidades do sempre da negócio
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>Atenção:</strong> Ao publicar um anúncio você concorda e aceita os Termos de Uso do SEMPRE DA NEGÓCIO.
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <button id="btn-orange" type="submit" class="btn btn-large text-right">Publicar agora</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- fim do anuncio total -->
@endsection