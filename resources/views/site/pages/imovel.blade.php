@extends('site.layout')

@section('content')
    <div class="clearfix" style="margin-bottom: 10px"></div>

    <div class="container">
        <div class="col-md-8 col-lg-8">
            <div class="side-left">
                <div class="box-default clearfix imovel-area-detalhe">
                    <h1 class="pull-left">
                        <span class="subtitle">Flat para Alugar</span>
                        Rua Borges Lagoa
                        <br />
                        <span class="logradouro">Vl Mariana, Sao Paulo - SP</span>
                    </h1>
                    <div class="pull-right clearfix">
                        <span class="value-ficha">
                                <span class="subtitle">Valor de Locacao</span>
                                R$ 1.730
                        </span>
                    </div>
                </div><!-- box informações endereço -->

                <div class="box-default informacoes-imovel clearfix">
                    <div class="pull-left">
                        <ul class="unstyled no-padding">
                            <li> 1 <span class="text-info">quarto</span></li>
                            <li> 1 <span class="text-info">suíte</span></li>
                            <li> 30<span class="text-info">Área Útil (m²)</span></li>
                            <li> 30<span class="text-info">Área Total (m²)</span></li>
                            <li> 1 <span class="text-info">vaga</span></li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <ul class="unstyled no-padding">
                            <li>
                                R$ 1.120
                                <span class="text-info">Condomínio</span>
                            </li>
                        </ul>
                    </div>
                </div><!-- box informações do imovel -->
                <div class="box-default clearfix carrosel-fotos-imovel">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item active srle">
                                <img src="http://s28.postimg.org/4237b0cjh/image.jpg" alt="1.jpg" class="img-responsive">
                                <div class="carousel-caption">
                                    <p> 1.jpg </p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="http://s29.postimg.org/xaf064313/image.jpg" alt="2.jpg" class="img-responsive">
                                <div class="carousel-caption">
                                    <p> 2.jpg </p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="http://s17.postimg.org/sv1x15jlb/image.jpg" alt="3.jpg" class="img-responsive">
                                <div class="carousel-caption">
                                    <p> 3.jpg </p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="http://s7.postimg.org/4z602gd8b/image.jpg" alt="4.jpg" class="img-responsive">
                                <div class="carousel-caption">
                                    <p> 4.jpg </p>
                                </div>
                            </div>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                        <!-- Thumbnails -->
                        <ul class="thumbnails-carousel clearfix">
                            <li><img src="http://s2.postimg.org/h6uti3zud/1_tn.jpg" alt="1_tn.jpg"></li>
                            <li><img src="http://s27.postimg.org/n4fjr7q2n/2_tn.jpg" alt="1_tn.jpg"></li>
                            <li><img src="http://s29.postimg.org/afuhmf61f/3_tn.jpg" alt="1_tn.jpg"></li>
                            <li><img src="http://s29.postimg.org/p45dxi6hf/4_tn.jpg" alt="1_tn.jpg"></li>
                        </ul>
                    </div>
                </div>
                <div class="box-default clearfix box-descricao-caract">
                    <h3>Descrição</h3>
                    <div id="descricaoOferta">
                        <p>Localizado no bairro da Vila Clementino, a 1 km do Parque do Ibirapuera, o Travel Inn Live &amp;amp; Lodge oferece apartamentos confortáveis &amp;amp;#8203;&amp;amp;#8203;e salas para eventos com todo o apoio necessário para reuniões de negócios e conferências. O Travel Inn Live &amp;amp; Lodge também dispõe de uma academia e um restaurante. Além de um buffet de café da manhã, o Restaurante Agamat oferece pratos internacionais acompanhados de sobremesas deliciosas. Você estará a uma curta caminhada do Shopping Ibirapuera, hospitais, Aeroporto de Congonhas e o Parque do Ibirapuera. Não deixe de nos consultar!</p>
                    </div>
                    <h3>Características</h3>
                    <div id="caracteristicaOferta">
                        <p></p>
                        <p>
                            <strong>Características do Imóvel:</strong>
                            Ar Condicionado, Mobiliado, Porteira Fechada
                        </p>
                        <p>
                            <strong>Características das Áreas Comuns:</strong>
                            Piscina
                        </p>


                    </div>
                </div>
                <div class="box-default clearfix">
                    <ul class="unstyled bar-actions no-padding">

                        <li>
                            <div class="share-social clearfix">
                                <span class="pull-left">Compartilhar</span>

                                <a href="#emailModal" class="icone-social icone-e-mail" role="button" data-toggle="modal" title="Enviar por e-mail"></a>
                                <a href="" class="icone-social icone-twitter" role="button" target="_blank"  title="Compartilhar no Twitter"></a>
                                <a href="" class="icone-social icone-facebook" role="button" target="_blank"  title="Compartilhar no Facebook"></a>

                            </div>
                        </li>
                        <li><a href="#" id="modalDenuncieAbrir" class="modal-denuncie icone-alerta-reportar" data-toggle="modal" data-target="#denuncie-modal">Reportar erro ou denunciar essa oferta</a></li>
                    </ul>
                </div>
            </div><!-- fim area esquerda -->
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="side-right">
                <div class="box-default contatar-anunciante">
                    <span class="title">contatar o anunciante</span>
                    <div class="contatar-ficha">
                        <div class="modal-body no-padding" id="modalBodyContate">
                            <ul class="unstyled clearfix list-buttons mb10 no-padding">
                                <li id="liTelefone" class="pull-left">
                                    <a href="#phone" class="icone-telefone btn-zap btn" data-toggle="tab">Ver telefone</a>
                                </li>
                            </ul>
                            <!-- telefone contato -->
                            <div id="phone" class="tab-phone tab-pane active" style="display: block;">
                                <p class="text-aoligar">Ao ligar, diga que você viu esse anúncio no Sempre da Negócio.</p>
                                <span id="number_tel" class="number tc">( 11 ) 2129-2200</span>

                                <input type="hidden" id="hdnVerTelefoneAtivo" value="1">
                            </div>
                            <!-- mensagem -->
                            <div class="content-floaters">
                                <div class="tab-mensagem active" id="email">
                                    <form id="frmEnviarMensagem" class="form-mensagem clearfix">
                                        <input id="txtNome" class="input input-block-level" type="text" placeholder="Nome" value="">
                                        <input id="txtEmail" class="input input-block-level" type="email" placeholder="E-mail" value="">
                                        <input id="txtDDD" class="input input-block-level span1" type="number" placeholder="DDD" maxlength="2"  value="">
                                        <input id="txtTelefone" class="input input-block-level span2" type="tel" placeholder="Telefone" maxlength="9" value="">
                                        <textarea id="txtMensagem" class="input-block-level" rows="5"></textarea>
                                        <div class="check-ofertas pull-left mt10">
                                            <input class="pull-left" type="checkbox" id="chkNoticias" checked="checked">
                                            <label>Desejo receber notícias e ofertas do Sempre dá negócio e de seus parceiros</label>
                                        </div>
                                        <input type="reset" class="btn-link" value="Limpar" id="btnLimpar">
                                        <a href="javascript:void();" id="lnkEnviarMensagem" class="pull-right btn btn-zap contact icone-e-mail" onclick="return enviarMensagem('/FichaCampanha/Enviar');">Enviar e-mail</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- fim contratar ficha -->
                    <div class="btn-fav-ficha add hand btnFavorito11102">
                        <div class="iconeFavorito addicon pull-left icone-favoritada"></div>
                        <!--<img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="" class="favbar-load pull-left" width="25" height="25"> -->
                        <span class="pull-left">Adicionar à minha lista</span>
                    </div>
                    <div class="clearfix"></div>
                </div><!-- fim contratar anunciante -->
                <aside class="box-default clearfix outras-informacoes">
                    <span class="title">Outras informações</span>

                    Atualizado há 16 dias
                    <div class="pull-left content-anunciante">
                        <a href="#" class="pull-left logo">
                            <img src="http://img.zapcorp.com.br/201303/13/int/3597/img_421_3597_logo.jpg" alt="CAUCASO CONSTRUTORA LTDA">
                        </a>
                        <div class="pull-left anunciante">
                            <a href="#">Outras ofertas de: CAUCASO CONSTRUTORA LTDA</a>

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <section class="container col-md-12 col-lg-12  mt40 no-show ">
        <h2 class="estilo-fonte-h2">Demais resultados da sua busca</h2>
        <!-- area slider mais imoveis -->
        <div class="box-default clearfix multislide">
            Aqui será slider dos imovéis com busca parecida.
        </div>
    </section>

@endsection