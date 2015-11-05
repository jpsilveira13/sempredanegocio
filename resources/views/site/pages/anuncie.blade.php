@extends('site.layout')

@section('content')
        <!--
    <div class="conteneur">
        <h1>Implementar depois</h1>
        <div class="circle">
            <div class="point_general point1">
                <span class="texte">Ergo ergo vel videre ad eventu plebem permittunt textum</span>
            </div>
            <div class="point_general point2">
                <span class="texte">Sollemnia ita ita ita in regis imitatus</span>
            </div>
            <div class="point_general point3">
                <span class="texte">Deiectas fieri scholarum super nec iniusta</span>
            </div>
            <div class="point_general point4">
                <span class="texte">Contemnendos se contemni non extollere opere submittere</span>
            </div>
            <div class="point_general point5">
                <span class="texte">Quae quae quiete equestrium planitie vicos cohortium</span>
            </div>
            <div class="point_general point6">
                <span class="texte">Ex rebus agrestibus tranquillis et licet veteres</span>
            </div>
            <div class="point_general point7">
                <span class="texte">Seleucus plagam ab quam limes Nicator pelagi Nili regna cum</span>
            </div>
            <div class="point_general point8">
                <span class="texte">Sublimius spatiis spatiis pari palmite uberi quam ad verticibus </span>
            </div>
        </div>
    </div> -->


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="area-anuncio-total">
            <h1 class="anuncio-titulo"><strong>Postar o seu anúncio é GRÁTIS, rápido e fácil!</strong></h1>
            <p class="anuncio-texto-header">O seu anúncio pode ser visto todos os dias por milhares de pessoas.</p>
            <form action=""  method="post" class="form-group anuncio-titulo-estilo form-validation" id="budget-form">
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
                            <label class="control-label">Zona/Bairro: *</label>
                            <input type="text" class="form-control input-large" id="bairro" required placeholder="Nome do bairro ou zona*" name="bairro" />
                        </div>
                        <div class="form-group">
                            <label>Nome da rua: *</label>
                            <input type="text" class="form-control input-large" id='rua' placeholder="Ex.: Av. Paulista" name="rua" />
                        </div>
                        <div class="form-group " style="display:none">
                            <label>Número da casa/prédio: *</label>
                            <input type="text" class="form-control input-small" id="numero" placeholder="Ex.: 9999" name="numero" />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 hidden-sm anuncio-area-mapa">
                        <div class="anuncio-area-mapa"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h2><i class="fa fa-home"></i>  Propriedade</h2>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xs-12">
                        <div class="form-group">
                            <label>Tipo de moradia *</label>
                            <select class="form-control" name="tipo-moradia">
                                <option value="">Escolha uma opção</option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Casa">Casa</option>
                                <option value="Rancho">Rancho</option>
                                <option value="Chácara">Chácara</option>
                                <option value="Fazenda">Fazenda</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-12">
                        <div class="form-group">
                            <label>Número de quartos *</label>
                            <select class="form-control" name="numero-quarto">
                                <option value="">Escolher</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 ou mais</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-12">
                        <div class="form-group">
                            <label>Vagas de garagem *</label>
                            <select class="form-control" name="numero-garagem">
                                <option value="">Escolher</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 ou mais</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-12">
                        <div class="form-group">
                            <label>Quantas suítes *</label>
                            <select class="form-control" name="numero-suite">
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
                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <label>Área Construída: *</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="Ex.: 150" type="number" required name="area-construida">
                            <div class="input-group-addon">m²</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <label>Condomínio: *</label>
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input class="form-control" placeholder="Ex.: 150" type="number" required name="valor-condominio">
                            <div class="input-group-addon">,00</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <label>IPTU: *</label>
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input  class="form-control" placeholder="Ex.: 150" type="number" required name="valor-condominio">
                            <div class="input-group-addon">,00</div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div id="estilo-checkbox-bootstrap" class="col-md-12 col-lg-12 col-xs-12">
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
                            <input type="text" name="anuncio-titulo" placeholder="Ex.: Vendo Apartamento" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12">
                        <div class="form-group">
                            <label>Descrição : *</label>
                            <textarea class="form-control" rows="12" name="anuncio-descricao" placeholder="Ex.: Apartamento bem equipado"></textarea>
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
                            <input type="file" />
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
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Nome: *</label>
                            <input type="text" name='nome-usuario' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Telefone: *</label>
                            <input type="tel" name='telefone-usuario' maxlength="15" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Email: *</label>
                            <input type="email" id="email-usuario" name='email-usuario' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Verificar email: *</label>
                            <input type="text" required id="verifica-email" name='verifica-email' class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Senha: *</label>
                            <input type="password" id="senha-usuario" name='senha-usuario' class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
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