@extends('site.layout')

@section('content')
</div><!-- fechamento da div row que esta dentro do layout -->
</div><!-- fechamento da container  que esta dentro do layout -->

<div class="container-fluid container-filtros">
    <ul class="filtros-principais clearfix">
        <li>
            <label id="labelTipo" class="icone-tipo-temporada filtro" data-label="QUAL O TIPO?">
                <select id="tipo" class="tipo-imovel-temporada">
                    <option value="Qual o tipo?"> Qual o tipo?</option>
                    <optgroup label="Todos">
                        <option value=Todos os imóveis>Todos os imóveis</option>
                    </optgroup>
                    <optgroup label="Residencial">
                        <option value="Apartamento Padrão" data-nomeamigavel="Apartamento Padrão">Apartamento Padrão</option>
                        <option value="Casa de Condomínio" data-nomeamigavel="Casa de Condomínio">Casa de Condomínio</option>
                        <option value="Casa de Vila" data-nomeamigavel="Casa de Vila">Casa de Vila</option>

                    </optgroup>
                    <optgroup label="Comercial">
                        <option value="Box/Garagem" data-nomeamigavel="Box/Garagem">Box/Garagem</option>
                        <option value="Conjunto Comercial/Sala" data-nomeamigavel="Conjunto Comercial/Sala">Conjunto Comercial/Sala</option>
                        <option value="Hotel" data-nomeamigavel="Hotel">Hotel</option>
                        <option value="Loja/Salão" data-nomeamigavel="Loja/Salão">Loja/Salão</option>
                        <option value="Pousada/Chalé" data-nomeamigavel="Pousada/Chalé">Pousada/Chalé</option>
                        <option value="Prédio Inteiro" data-nomeamigavel="Prédio Inteiro">Prédio Inteiro</option>
                        <option value="Studio" data-nomeamigavel="Studio">Studio</option>
                    </optgroup>
                    <optgroup label="Rural">
                        <option value="Chácara" data-nomeamigavel="Chácara">Chácara</option>
                        <option value="Fazenda" data-nomeamigavel="Fazenda">Fazenda</option>
                        <option value="Sítio" data-nomeamigavel="Sítio">Sítio</option>
                    </optgroup>
                </select>

            </label>
        </li>
        <li>
            <label id="labelQuarto" class="icone-quartos filtro quartos" data-label="Quartos" >
                QUARTOS
                <span class="icone-seta-light-baixo"></span>
                <div id="divQuartos" class="filtro-check check-quartos content-filtro" data-filtro="checked" >
                    <div class="titulo-check">
                        quartos
                    </div>
                    <ul class="opcoes-check no-padding">
                        <li class="option-selected" >
                            <input type="checkbox" checked value="1" id="quarto1" />
                            <label>1</label>
                        </li>
                        <li class="" >
                            <input type="checkbox" value="2" id="quarto2" />
                            <label>2</label>
                        </li>
                        <li class="" >
                            <input type="checkbox" value="3" id="quarto3" />
                            <label>3</label>
                        </li>
                        <li class="" >
                            <input type="checkbox" value="4" id="quarto4" />
                            <label>4 ou mais</label>
                        </li>


                    </ul>
                </div>
            </label>
        </li>
        <li>
            <label id="labelFaixaPreco" class="icone-faixa-preco filtro faixa-preco" data-label="Faixa de Preço" >
                FAIXA DE PREÇOS?
                <span class="icone-seta-light-baixo"></span>
            </label>
            <div class="content-slider content-filtro" id="divFaixaPreco" style="display: none" >
                <span class="titulo-slider">faixa de preço - R$</span>
                <div id="box-slider-preco" class="boxBusca">
                    <ul class="no-padding">
                        <li>
                            <input type="text" id="typePrecoMin" class="input-slider-esq" value="0" maxlength="7">
                        </li>
                        <li class="spacer-slider">
                            <span class="spacer-left"></span>
                            ATÉ
                            <span class="spacer-right"></span>
                        </li>
                        <li>
                            <input type="text" id="typePrecoMax" class="input-slider-dir" maxlength="9">
                        </li>
                    </ul>
                </div>
                <div id="slider-busca-preco" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                    <div class="noUi-base">
                        <div class="noUi-origin noUi-connect" style="left: 0%;">
                            <div class="noUi-handle noUi-handle-lower">

                            </div>
                        </div>
                        <div class="noUi-origin noUi-background" style="left: 60%;">
                            <div class="noUi-handle noUi-handle-upper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <label id="labelSuite" class="icone-suites filtro suites" data-label="SUÍTES">SUITES
                <span class="icone-seta-light-baixo"></span>
            </label>
            <div id="divSuite" style="display: none"  class="filtro-check check-suites content-filtro" data-filtro="checked">
                <div class="titulo-check">Suítes</div>
                <ul class="opcoes-check no-padding">
                    <li><input type="checkbox" value="1" id="suite1"><label for="suite1">1</label></li>
                    <li><input type="checkbox" value="2" id="suite2"><label for="suite2">2</label></li>
                    <li><input type="checkbox" value="3" id="suite3"><label for="suite3">3</label></li>
                    <li><input type="checkbox" value="4" id="suite4"><label for="suite4">4 ou mais</label></li>
                </ul>
            </div>
        </li>
        <li>
            <label id="labelVaga" class="icone-vagas filtro vagas" data-label="VAGAS">VAGAS<span class="icone-seta-light-baixo"></span></label>
            <div id="divVaga" style="display: none" class="filtro-check check-vagas content-filtro" data-filtro="checked">
                <div class="titulo-check">Vagas</div>
                <ul class="opcoes-check no-padding">
                    <li><input type="checkbox" value="1" id="vaga1"><label for="vaga1">1</label></li>
                    <li><input type="checkbox" value="2" id="vaga2"><label for="vaga2">2</label></li>
                    <li><input type="checkbox" value="3" id="vaga3"><label for="vaga3">3</label></li>
                    <li><input type="checkbox" value="4" id="vaga4"><label for="vaga4">4 ou mais</label></li>
                </ul>
            </div>
        </li>
    </ul>

</div>
<div class="clearfix"></div>
<div class="row no-margin">
    <div class="container">
        <div class="col-md-6">
            <div class="well well-sm">
                <strong>Exibir como </strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                 </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grade</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pull-right">
            <form class="pull-right">
                <div class="select2-container pull-right " style="margin-top:9px">
                    <select class="select2-choice" id="sortby">
                        <option value="Relevancia" selected="selected">
                            Relevância

                        </option>
                        <option  value="DataAtualizacao">
                            Data Atualização

                        </option>
                        <option  value="Valor">
                            Valor

                        </option>
                        <option  value="Area">
                            Área

                        </option>
                    </select>
                </div>
                <label class="control-label pull-right sort" for="sortby">Ordenar por</label>
            </form>
        </div>
        <div class="clearfix"></div>
        <div id="products" class="row list-group">
            @for($i = 0;$i<10;$i++)
                <div class="item  col-xs-6 col-lg-4 bloco-item">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">Product title</h4>
                            <p class="group inner list-group-item-text">
                                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">$21.000</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
</div>

@endsection