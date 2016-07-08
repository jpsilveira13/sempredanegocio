@extends('app')@section('content')        <h3>Editar Anúncio </h3>        <hr />        @include('errors._check')        <div class="row">                <ul class="nav nav-tabs">                        <li class="active"><a data-toggle="tab" href="#home">DADOS DO ANÚNCIO</a></li>                        <li><a data-toggle="tab" href="#imagens">ENVIO DE IMAGENS</a></li>                </ul>        </div>        <br />        <div class="tab-content">                <div id="home" class="tab-pane fade in active">                        <form class="form" action="{{route('admin.anuncios.update',['id'=>$advert->id])}}" method="POST">                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                                <div class="row">                                        <div class="col-md-6 col-lg-6">                                                <fieldset class="form-group">                                                        <label for="Ativar e Desativar anúncio">Ativar/Desavitar anúncio</label>                                                        <select class="form-control" required="required" name="status">                                                                <option value="">Escolha uma opção</option>                                                                <option @if($advert->status == 0) selected @endif value="0">Desativar</option>                                                                <option @if($advert->status == 1) selected @endif  value="1">Ativar</option>                                                        </select>                                                </fieldset>                                        </div>                                        <div class="col-md-6 col-lg-6">                                                <fieldset class="form-group">                                                        <label for="Ativar endereço">Ativar/Desavitar endereço</label>                                                        <select class="form-control" required="required" name="active">                                                                <option value="">Escolha uma opção</option>                                                                <option @if($advert->active == 0) selected @endif value="0">Ativar</option>                                                                <option @if($advert->active == 1) selected @endif  value="1">Desativar</option>                                                        </select>                                                </fieldset>                                        </div>                                </div>                                <div class="row">                                        <div class="col-md-4">                                                <fieldset class="form-group">                                                        <label for="bairro">Zona/Bairro </label>                                                        <input type="text" class="form-control input-large" id="bairro" name="bairro" value="{{$advert->bairro}}"/>                                                </fieldset>                                        </div>                                        <div class="col-md-4">                                                <fieldset class="form-group">                                                        <label for="cep">Nome da rua </label>                                                        <input type="text" class="form-control input-large" id="rua" name="rua" value="{{$advert->rua}}"/>                                                </fieldset>                                        </div>                                        <div class="col-md-4">                                                <fieldset class="form-group">                                                        <label for="cep">Número da casa/prédio </label>                                                        <input maxlength="6" onkeypress="mascaraCampo(this, mascSoNumeros)"  type="text" class="form-control input-small" id="numero" value="{{$advert->numero}}" name="numero"  />                                                </fieldset>                                        </div>                                </div>                                <div class="row">                                        <div class="col-md-12">                                                <fieldset class="form-group">                                                        <label for="Descrição">Descrição</label>                                                        <textarea class="form-control" name="anuncio_descricao" id="descricao" rows="6">{{$advert->anuncio_descricao}}</textarea>                                                </fieldset>                                        </div>                                </div>                                <div class="row">                                        <div class="col-md-4 col-lg-4">                                                <fieldset class="form-group">                                                        <label for="preço">Preço</label>                                                        <input maxlength="14" onkeypress="mascaraCampo(this,mvalor)" type="text" value=" {{number_format((float)$advert->preco,2,",",".")}}" name="preco" class="form-control" id="preco" placeholder="Preço">                                                </fieldset>                                        </div>                                        <div class="col-md-4 col-lg-4">                                                <fieldset class="form-group">                                                        <label for="Número de quartos">Número de quartos</label>                                                        <select class="form-control" required="required"  name="numero_quarto">                                                                <option value="">Escolher</option>                                                                @for($i = 0;$i<6;$i++)                                                                        <option @if($advert->advertImovel->numero_quarto == $i) selected @endif value="{{$i}}">@if($i == 0) Nenhum @else {{$i}} @endif</option>                                                                @endfor                                                        </select>                                                </fieldset>                                        </div>                                        <div class="col-md-4 col-lg-4">                                                <fieldset class="form-group">                                                        <label for="Número de garagem">Número de garagem</label>                                                        <select class="form-control" required="required"  name="numero_garagem">                                                                <option value="">Escolher</option>                                                                @for($i = 0;$i<6;$i++)                                                                        <option @if($advert->advertImovel->numero_garagem == $i) selected @endif value="{{$i}}">@if($i == 0) Nenhum @else {{$i}} @endif</option>                                                                @endfor                                                        </select>                                                </fieldset>                                        </div>                                </div>                                <div class="row">                                        <div class="col-md-4 col-lg-4">                                                <fieldset class="form-group">                                                        <label for="Número de banheiros">Número de banheiros</label>                                                        <select class="form-control" required="required"  name="numero_banheiro">                                                                <option value="">Escolher</option>                                                                @for($i = 0;$i<6;$i++)                                                                        <option @if($advert->advertImovel->numero_banheiro == $i) selected @endif value="{{$i}}">@if($i == 0) Nenhum @else {{$i}} @endif</option>                                                                @endfor                                                        </select>                                                </fieldset>                                        </div>                                        <div class="col-md-4 col-lg-4">                                                <fieldset class="form-group">                                                        <label for="area construida">Área construída</label>                                                        <input type="text" value="{{$advert->advertImovel->area_construida}}" name="area_construida" class="form-control" id="area_construida" placeholder="Área construída">                                                </fieldset>                                        </div>                                        <div class="col-md-4 col-lg-4">                                                <fieldset class="form-group">                                                        <label for="preço">Valor Condomínio</label>                                                        <input type="text" value="{{number_format((float)$advert->advertImovel->valor_condominio,2,",",".")}}" name="valor_condominio" class="form-control" maxlength="14" onkeypress="return mascaraCampo(this,mvalor)" id="valor_condominio" placeholder="Valor Condomínio">                                                </fieldset>                                        </div>                                </div>                                <div class="row">                                        <div class="col-md-6 col-lg-6">                                                <fieldset class="form-group">                                                        <label for="Valor Iptu">Valor IPTU</label>                                                        <input type="text" value="{{number_format((float)$advert->advertImovel->valor_iptu,2,",",".")}}" name="valor_iptu" class="form-control" maxlength="7" onkeypress="mascaraCampo(this,mvalor)"  id="iptu" placeholder="IPTU">                                                </fieldset>                                        </div>                                        <div class="col-md-6 col-lg-6">                                                <fieldset class="form-group">                                                        <label for="Acomodações">Acomodações</label>                                                        <input type="text" value="{{$advert->advertImovel->acomodacoes}}" onkeypress="mascaraCampo(this, mascSoNumeros)"  required  name="acomodacoes" class="form-control" maxlength="2" id="acomodacoes" placeholder="Acomodações">                                                </fieldset>                                        </div>                                </div>                                <div class="row">                                        <div class="col-md-12 col-lg-12">                                                <div class="btn-group" data-toggle="buttons">                                                        @foreach($features as $feature)                                                                <?php $tem = false;?>                                                                @foreach($advert->features()->get() as $fe)                                                                        @if($fe->id == $feature->id )                                                                                <?php $tem = true; ?>                                                                        @endif                                                                @endforeach                                                                <label class="btn btn-default btcaract mt10 @if($tem) active @endif"style="width: 204px;margin-left: 47px;">                                                                        <input type="checkbox" aria-required="false" @if($tem) checked="checked" @endif class="material_checkbox" name="caracteristicas[]" value="{{$feature->id}}" />{{$feature->name}}</label>                                                        @endforeach                                                </div>                                        </div>                                </div>                                <br /><br />                                <div class="row">                                        <div class="col-md-12">                                                <button type="submit" class="btn-lg btn-primary center-block">Salvar</button>                                        </div>                                </div>                        </form>                </div>                <div id="imagens" class="tab-pane fade">                        <div class="row mt10">                                <div class="col-md-12 text-center">                                        <button class="btn btn-primary btn-seleciona"><span>SELECIONAR IMAGEM</span></button>                                        <button class="btn btn-danger"><span>ENVIAR</span></button>                                </div>                        </div>                        <div class="row">                                @foreach($advert->images()->get() as $image)                                        <div id="imagem{{$image->id}}" class="img-anuncio col-md-4 mt10">                                                <?php                                                $pos = strpos($image->extension, "imoveis/site/");                                                $url1 = "";                                                if ($pos === false) {                                                $url1 = $image->extension;                                                ?>                                                <img  class="img-responsive" src="{{$image->extension}}" />                                                <?php                                                }else{                                                $url1 = "galeria/".$image->extension;                                                ?>                                                <img src="{{url($url1)}}" class="img-responsive">                                                <?php } ?>                                                <div class="col-md-12">                                                        <div class="estilo-botao-img mt10 text-center">                                                                <a class="btn btn-success capaImagem" data-id="{{$image->id}}"><i class=" fa fa-file-o" aria-hidden="true"></i> CAPA</a>                                                                <a class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> GIRAR</a>                                                                <a  class="btn btn-danger removerImage" data-id="{{$image->id}}"><i class="fa fa-trash" aria-hidden="true"> REMOVER</i></a>                                                        </div>                                                </div>                                        </div>                                @endforeach                        </div>                </div>        </div>@endsection