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

            <form action="<?=url('anuncie')?>"  method="post" class="form-group anuncio-titulo-estilo form-validation"  accept-charset="UTF-8" enctype="multipart/form-data" id="budget-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="0" name="categoria" id="categoria">
                <input type="hidden" value="0" name="subcategoria" id="subcategoria">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h2><i class="fa fa-newspaper-o"></i> Tipo de anúncio</h2>
                        <hr />
                    </div>
                </div>
                <div class="row" id="menu-anuncio">
                    <div class="col-md-3 col-lg-3 col-xs-3">

                        <ul class="nav nav-pills nav-stacked list nav-estilo-anuncio text-right">
                            @foreach($anunciecats as $anunciecat)
                                <li id="{{$anunciecat->id}}" class="item openCategoriaImoveis"><p class="text">{{$anunciecat->name}} <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                                @endforeach
                                        <!-- <li id="1" class="item openCategoriaImoveis"><p class="text">Imóveis <span class="glyphicon glyphicon-chevron-right"></span></p></li>

                            <li id="2" class="item openCategoriaVeiculos" ><p class="text">Veículos <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                            <li id="3" class="item"><p class="text openCategoriaEquipamentos">Equipamentos <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                            <li id="4" class="item openCategoriaShow"><p class="text">Festas e Eventos <span class="glyphicon glyphicon-chevron-right"></span></p></li> -->
                        </ul>
                    </div>
                    <!-- categoria veiculos -->
                    <div class="col-md-3 col-lg-3 col-xs-3 categoria-veiculos hide">
                        <ul class="nav nav-pills nav-stacked list nav-estilo-anuncio-categoria text-right">
                            <li id="20" class="item categoria-ap"><p class="text">Carros </p></li>
                            <li id="21" class="item categoria-cs"><p class="text">Caminhões, ônibus e vans</p></li>
                            <li id="22" class="item categoria-al"><p class="text">Motos</p></li>
                            <li id="23" class="item categoria-temp"><p class="text">Peças e acessórios <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                        </ul>
                    </div>
                    <!-- subcategoria veiculos -->
                    <div class="col-md-3 col-lg-3 col-xs-3 subcategoria-car hide">
                        <input type="hidden" value="" name="pecas_type" id="pecas_type">
                        <ul class="nav list nav-pills nav-stacked nav-total nav-estilo-anuncio-subcategoria text-center">
                            <li id="200" class="item"><p class="text">Carros </p></li>
                            <li id="201" class="item"><p class="text">Caminhões, ônibus e vans </p></li>
                            <li id="203" class="item"><p class="text">Motos </p></li>
                        </ul>
                    </div>
                    <!-- categoria imoveis -->
                    <div class="col-md-3 col-lg-3 col-xs-3 categoria-imoveis hide">
                        <ul class="nav nav-pills nav-stacked list nav-estilo-anuncio-categoria text-right">
                            @foreach($anunciesubcats as $anunciesubcat)
                                <li id="{{$anunciesubcat->id}}" class="item categoria-ap"><p class="text">{{$anunciesubcat->name}} <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                                @endforeach
                                        <!--
                            <li id="10" class="item categoria-ap"><p class="text">Apartamentos <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                            <li id="20" class="item categoria-cs"><p class="text">Casas <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                            <li id="30" class="item categoria-al"><p class="text">Aluguel de quartos </p></li>
                            <li id="40" class="item categoria-temp"><p class="text">Temporada <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                            <li id="50" class="item categoria-tr"><p class="text">Terrenos, sítios e fazendas <span class="glyphicon glyphicon-chevron-right"></span></p></li>
                            <li id="60" class="item categoria-lj"><p class="text">Lojas, salas e outros</p></li>
                            <li id="60" class="item categoria-lancamentos"><p class="text">Lançamentos <span class="glyphicon glyphicon-chevron-right"></span></p></li>

                            -->
                        </ul>
                    </div>
                    <!-- subcategoria imoveis apartamento -->
                    <div class="col-md-3 col-lg-3 col-xs-3 subcategoria-ap hide">
                        <input type="hidden" value="" name="apartamento_type" id="apartamento_type">
                        <ul class="nav list nav-pills nav-stacked nav-total nav-estilo-anuncio-subcategoria text-center">
                            <li id="100" class="item"><p class="text">Padrão </p></li>
                            <li id="101" class="item"><p class="text">Cobertura </p></li>
                            <li id="102" class="item"><p class="text">Duplex/Triplex </p></li>
                            <li id="103" class="item"><p class="text">Kitchenette </p></li>
                            <li id="104" class="item"><p class="text">Loft/Studio</p></li>

                        </ul>
                    </div>
                    <!-- subcategoria imoveis casa -->
                    <div class="col-md-3 col-lg-3 col-xs-3 subcategoria-cs hide">
                        <input type="hidden" value="" name="casa_type" id="casa_type">
                        <ul class="nav list nav-pills nav-stacked nav-total nav-estilo-anuncio-subcategoria text-center">
                            <li id="1" class="item "><p class="text">Rua pública </p></li>
                            <li id="2" class="item"><p class="text">Vila </p></li>
                            <li id="3" class="item"><p class="text">Condomínio fechado</p></li>
                        </ul>
                    </div>
                    <!-- subcategoria imoveis temporada -->
                    <div class="col-md-3 col-lg-3 col-xs-3 subcategoria-temp hide">
                        <input type="hidden" value="" name="temporada_type" id="temporada_type">
                        <ul class="nav list nav-pills nav-stacked nav-total nav-estilo-anuncio-subcategoria text-center">
                            <li id="1" class="item "><p class="text">Apartamento </p></li>
                            <li id="2" class="item"><p class="text">Casa </p></li>
                            <li id="3" class="item"><p class="text">Quarto</p></li>
                            <li id="3" class="item"><p class="text">Quarto Compartilhado</p></li>
                            <li id="3" class="item"><p class="text">Pousada</p></li>
                        </ul>
                    </div>
                    <!-- subcategoria imoveis terrenos e etc -->
                    <div class="col-md-3 col-lg-3 col-xs-3 subcategoria-tr hide">
                        <input type="hidden" value="" name="terreno_type" id="terreno_type">
                        <ul class="nav list nav-pills nav-stacked nav-total nav-estilo-anuncio-subcategoria text-center">
                            <li id="1" class="item "><p class="text">Terrenos e lotes</p></li>
                            <li id="2" class="item"><p class="text">Sítios e chácaras </p></li>
                            <li id="3" class="item"><p class="text">Fazendas</p></li>
                            <li id="3" class="item"><p class="text">Outros</p></li>
                        </ul>
                    </div>

                    <!-- subcategoria lançamentos -->
                    <div class="col-md-3 col-lg-3 col-xs-3 subcategoria-lancamentos hide">
                        <input type="hidden" value="" name="lancamento_type" id="lancamento_type">
                        <ul class="nav list nav-pills nav-stacked nav-total nav-estilo-anuncio-subcategoria text-center">
                            <li id="1" class="item "><p class="text">Apartamento</p></li>
                            <li id="2" class="item"><p class="text">Casas </p></li>
                            <li id="3" class="item"><p class="text">Lojas e salas comerciais</p></li>
                            <li id="3" class="item"><p class="text">Terreno e loteamentos</p></li>
                        </ul>
                    </div>
                </div>
                <h2><i class="fa fa-map-marker"></i> Sobre a localizao</h2>
                <hr />
                <div class="row">
                    <div class="col-md-6 col-lg-6 anuncio-area-localizacao">
                        <div class="form-group">
                            <label>Estado: *</label>
                            <select id="uf" class="form-control input-small" default="SP" name="estado"></select>
                        </div>
                        <div class="form-group">
                            <label>Cidade: *</label> <br />
                            <select  id="cidade" class="form-control input-large" name="cidade"></select>
                        </div>
                        <div class="form-group">
                            <label>Zona/Bairro: *</label><br />
                            <input type="text" class="form-control input-large" id="bairro" required placeholder="Nome do bairro ou zona*" name="bairro" />
                        </div>

                        <div class="form-group">
                            <label>Nome da rua: *</label><br />
                            <input type="text" class="form-control input-large" id='rua' placeholder="Ex.: Av. Paulista" name="rua" />
                        </div>
                        <div class="form-group">
                            <label>Número da casa/prédio: *</label><br />
                            <input type="text" class="form-control input-small" id="numero" placeholder="Ex.: 9999" name="numero" />
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
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Número de quartos *</label>
                            <select class="form-control" name="numero_quarto">
                                <option value="">Escolher</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 ou mais</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Vagas de garagem *</label>
                            <select class="form-control" name="numero_garagem">
                                <option value="">Escolher</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 ou mais</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Quantas suítes *</label>
                            <select class="form-control" name="numero_suite">
                                <option value="">Escolher</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 ou mais</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <label>Área Construída: *</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="Ex.: 150" type="number" required name="area_construida">
                            <div class="input-group-addon">m²</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <label>Condomínio: *</label>
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input class="form-control" placeholder="Ex.: 150" type="tel" required name="valor_condominio">

                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <label>IPTU: *</label>
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input  class="form-control" placeholder="Ex.: 150" type="number" required name="valor_iptu">
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div id="estilo-checkbox-bootstrap" class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                        <label>Características</label><br />
                        <label class="checkbox-inline">
                            <input type="checkbox" class="material_checkbox" name="caracteristicas[]"  value="Ar Condicionado">   Ar Condiconado

                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="material_checkbox" name="caracteristicas[]" value="Academia">  Academia
                        </label>
                        <label class="checkbox-inline">

                            <input type="checkbox" name="caracteristicas[]" class="material_checkbox" value="Armários Embutidos"> Armários embutidos
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="caracteristicas[]" class="material_checkbox" value="Piscina">Piscina
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="caracteristicas[]" class="material_checkbox" value="Porteiro">Porteiro 24h
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="caracteristicas[]" class="material_checkbox" value="Varanda">  Varanda
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="material_checkbox" name="caracteristicas[]" value="Área de Serviço">  Área de serviço
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="material_checkbox" name="caracteristicas[]" value="Churrasqueira">  Churrasqueira
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="material_checkbox" name="caracteristicas[]" value="Quarto da Empregada">  Quarto de Empregada
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="material_checkbox" name="caracteristicas[]" value="Salão de festa">  Salão de festa
                        </label>
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
                        <div class="form-group">
                            <label>Título : *</label>
                            <input type="text" name="anuncio_titulo" placeholder="Ex.: Vendo Apartamento" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12">
                        <div class="form-group">
                            <label>Descrição : *</label>
                            <textarea class="form-control" rows="12" name="anuncio_descricao" placeholder="Ex.: Apartamento bem equipado"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-xs-12">
                        <div class="form-group">
                            <label>Preço : *</label>
                            <input type="text" class="form-control"  name="preco" placeholder="Ex.: 150.00" />
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
                        <div class="form-group ">
                            <div class="upload-image position-relative">
                                <i class="fa fa fa-camera fa-4x mt6 ml23"></i>
                                <p class="help-block text-center">Adicionar fotos</p>
                                <input type="file" id="anuncio_images[]" multiple="true" name="anuncio_images[]" />
                            </div><br />
                            <p class="help-block">Você pode fazer o upload de 8 fotos (de até 8Mb, em formatos de jpg ou png).</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h2><i class="fa fa-user"></i> Sua conta</h2>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Nome: *</label>
                            <input type="text" name='nome-usuario' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Telefone: *</label>
                            <input type="tel" name='telefone-usuario' maxlength="15" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Email: *</label>
                            <input type="email" id="email-usuario" name='email-usuario' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Verificar email: *</label>
                            <input type="email" required id="verifica-email" name='verifica-email' class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Senha: *</label>
                            <input type="password" id="senha-usuario" name='senha-usuario' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Verificar Senha: *</label>
                            <input type="password" id="verifica-senha" name='verifica-senha' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <label>
                            <input type="checkbox" > Quero receber novidades do sempre da negócio
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Atenção:</strong> Ao publicar um anúncio você concorda e aceita os Termos de Uso do SEMPRE DA NEGÓCIO.
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <button id="btn-orange" type="submit" class="btn btn-large text-right">Publicar agora</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- fim do anuncio total -->
@endsection