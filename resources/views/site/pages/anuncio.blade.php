@extends('site.layout')

@section('content')

    <div class="clearfix" style="margin-bottom: 10px"></div>
    @if(!auth()->guest())
        @if(auth()->user()->id == $advert->user->id)
            <section class="container col-md-12 col-lg-12 no-show ">
                <a href="{{url("/admin/anuncios/editar")}}/{{$advert->id}}" style="margin-bottom: 10px" class="btn btn-zap">Editar Anúncio</a>
            </section>
        @endif

    @endif
    <p></p>
    <div class="container no-padding">
        <div class="col-md-12 col-lg-8 ">
            <div class="side-left">
                <div class="box-default clearfix imovel-area-detalhe">
                    <h1 class="pull-left">
                        <span class="subtitle">{{$advert->subcategory->name}} {{$advert->tipo_anuncio}}</span>

                        @if($advert->active == 0)
                            {{$advert->rua}} - @if($advert->numero == 0)  @else{{$advert->numero}} @endif
                            <br />
                            <span class="logradouro">{{$advert->bairro}}, {{$advert->cidade}} - {{$advert->estado}}</span>
                        @else
                            <span class="logradouro">{{$advert->bairro}}, {{$advert->cidade}} - {{$advert->estado}}</span>

                        @endif
                    </h1>
                    <div class="pull-right posvalue-imovel">
                        <span class="value-ficha">
                                <span class="subtitle">@if($advert->tipo_anuncio == 'aluga')Valor de Locação @else Valor de Venda @endif</span>
                            @if($advert->preco == 0)
                                --
                            @else
                                R$ {{number_format((float)$advert->preco,2,",",".")}}
                            @endif
                        </span>
                    </div>
                </div><!-- box informações endereço -->
                <div class="box-default informacoes-imovel clearfix">
                    <div class="pull-left">
                        <ul class="unstyled no-padding">
                            <li>@if($advert->numero_quarto == 0) -- @else{{$advert->numero_quarto}}@endif<span class="text-info">quarto</span></li>
                            <li>@if($advert->numero_suite == 0) -- @else{{$advert->numero_suite}}@endif<span class="text-info">Banheiros</span></li>
                            <li>@if($advert->area_construida == 0) -- @else{{$advert->area_construida}}@endif<span class="text-info">Área Útil (m²)</span></li>
                            <li>@if($advert->numero_garagem == 0) -- @else{{$advert->numero_garagem}}@endif<span class="text-info">Número de Garagem</span></li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <ul class="unstyled no-padding">
                            <li>
                                @if($advert->valor_iptu == 0) -- @else{{number_format((float)$advert->valor_iptu,2,",",".")}}@endif
                                <span class="text-info">IPTU</span>
                            </li>
                            <li>
                                @if($advert->valor_condominio == 0) -- @else{{number_format((float)$advert->valor_condominio,2,",",".")}}@endif
                                <span class="text-info">Condomínio</span>
                            </li>
                        </ul>
                    </div>
                </div><!-- box informações do imovel -->
                <div class="box-default clearfix carrosel-fotos-imovel">
                    <div class="col-md-12" id="slider">
                        <div class="col-md-12" id="carousel-bounding-box">
                            <div id="carrouselImovel" class="carousel slide">
                                <!-- main slider carousel items -->
                                <div class="carousel-inner">
                                    @if($advert->images()->count() >0)
                                        <?php $j = 0 ?>
                                        @foreach($advert->images()->get() as $images)
                                            <div class="<?php if($j==0){echo 'active';}?> item srle" data-slide-number="<?=$j?>">
                                                <?php
                                                $pos = strpos($images->extension, "imoveis/img");

                                                $url1 = "";
                                                if ($pos === false) {
                                                    $url1 = 'gallery/'.$images->extension;
                                                } else {
                                                    $url1 = "galeria/".$images->extension;
                                                }


                                                ?>
                                                <a href="{{url($url1)}}" data-lightbox="roadtrip" data-title="Imagem do imóvel">
                                                    <img src="{{url($url1)}}" class="img-responsive">
                                                </a>
                                            </div>
                                            <?php $j++?>
                                        @endforeach
                                    @else
                                        <div class="active item srle" data-slide-number="1">
                                            <img src="{{url('images/noimage2.jpg')}}" class="img-responsive">
                                        </div>
                                    @endif
                                </div>
                                <!-- main slider carousel nav controls -->
                                <a class="carousel-control left" href="#carrouselImovel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="carousel-control right" href="#carrouselImovel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>

                    </div>
                    <!--/main slider carousel-->

                    <!-- thumb navigation carousel -->
                    <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">

                        <!-- thumb navigation carousel items -->
                        <ul class="list-inline mt10">
                            @if($advert->images()->count() >0)
                                <?php $i=0?>
                                @foreach($advert->images()->get() as $images)
                                    <li>
                                        <a  id="carousel-selector-<?=$i?>" class="<?php if($i==0){echo 'selected';}?>">
                                            <?php
                                            $pos = strpos($images->extension, "imoveis/img");

                                            $url2 = "";
                                            if ($pos === false) {
                                                $url2 = 'gallery/'.$images->extension;
                                            } else {
                                                $url2 = "galeria/".$images->extension;
                                            }

                                            ?>
                                            <img src="{{url($url2)}}" width="80" height="60" class="img-responsive">
                                        </a>
                                    </li>
                                    <?php $i++ ?>
                                @endforeach
                            @else
                                <li>
                                    <a id="carousel-selector-1" class="selected">
                                        <img src="{{url('images/noimage2.jpg')}}" width="80" height="60" class="img-responsive">
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
                <div class="box-default clearfix box-descricao-caract">
                    <h3>Descrição</h3>
                    <div id="descricaoOferta">
                        <p>
                            {{$advert->anuncio_descricao}}
                        </p>
                    </div>
                    <h3>Características</h3>

                    <div id="caracteristicaOferta">

                        @if($advert->features()->count() > 0)
                            <p></p>
                            <p>
                                <strong>Características do Imóvel:</strong>

                                @foreach($advert->features()->get() as $feature)
                                    {{$feature->name}},
                                @endforeach
                                @else
                                    <strong>Não há característica cadastradas.</strong>
                                @endif

                            </p>
                    </div>
                    <p></p>
                    <div id="codigoAnuncio">
                        <p><strong>Código do anúncio: </strong> {{$advert->id}}</p>
                    </div>
                </div>
                <div class="box-default clearfix">
                    <ul class="unstyled bar-actions no-padding">

                        <li>
                            <div class="share-social clearfix">
                                <span class="pull-left">Compartilhar</span>

                                <a href="#emailModal" class="icone-social icone-e-mail" data-target="#emailModal" data-toggle="modal" title="Enviar por e-mail"></a>
                                <a href="" class="icone-social icone-twitter" role="button" target="_blank"  title="Compartilhar no Twitter"></a>
                                <a href="" class="icone-social icone-facebook" role="button" target="_blank"  title="Compartilhar no Facebook"></a>

                            </div>
                        </li>
                        <li><a href="#denuncieModal" id="modalDenuncieAbrir" class="modal-denuncie icone-alerta-reportar" data-toggle="modal" data-target="#denuncieModal">Reportar erro ou denunciar essa oferta</a></li>
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
                                    <a href="#phone" class="icone-telefone btn-zap btn" data-toggle="tab"> Ver telefone</a>
                                </li>
                            </ul>
                            <!-- telefone contato -->


                            <div id="phone" class="tab-phone tab-pane hide active" style="display: block;">
                                <p class="text-aoligar">Ao ligar, diga que você viu esse anúncio no Sempre da Negócio.</p>
                                <span id="number_tel" class="number tc">@if(count($advert->user->phone) > 0){{$advert->user->phone}}@else -- @endif</span>
                            </div>
                            <!-- mensagem -->
                            <div class="content-floaters">
                                <div class="tab-mensagem active" id="email">
                                    <form id="emailAnuncio" action="" class="form-mensagem clearfix">
                                        <input type="hidden" name="id_user" value="{{$advert->user->id}}" />
                                        <input type="hidden" name="url_site"  value="{{Request::url()}}" />
                                        <input type="hidden" name="nome_usuario" value="@if(count($advert->user->name) > 0){{$advert->user->name}}@else -- @endif" />
                                        <input type="hidden" name="email_usuario"  value="@if(count($advert->user->email) > 0){{$advert->user->email}}@else -- @endif" />

                                        <input type="hidden" name="telefone_usuario" value="@if(count($advert->user->phone) > 0){{$advert->user->phone}}@else -- @endif" />
                                        <input id="txtNome" required name="nome" class="input input-block-level" type="text" placeholder="Nome" value="">
                                        <input id="txtEmail" required name="email" class="input input-block-level" type="email" placeholder="E-mail" value="">
                                        <input id="txtDDD" required name="codigo_area" class="input input-block-level span1" type="text" placeholder="DDD" maxlength="2"  value="">
                                        <input id="txtTelefone" required name="telefone" class="input input-block-level span2" type="text" placeholder="Telefone" maxlength="9" value="">
                                        <textarea name="mensagem" id="txtMensagem" class="input-block-level" rows="5">
Olá, Gostaria de ter mais informações sobre o  imóvel {{$advert->subcategory->name}} à {{$advert->tipo_anuncio}}, R$ {{$advert->preco}}, em {{$advert->cidade}} - {{$advert->estado}}, que encontrei no Sempre da Negócio. Aguardo seu contato, obrigado.

                                        </textarea>
                                        <!--<div class="check-ofertas pull-left mt10">
                                            <label>Desejo receber notícias e ofertas do Sempre dá negócio e de seus parceiros</label>
                                        </div> -->
                                        <br />
                                        <input type="reset" class="btn-link" value="Limpar" id="btnLimpar">
                                        <button  type="submit" id="lnkEnviarMensagem" class="pull-right btn btn-zap contact icone-e-mail">Enviar e-mail</button>
                                    </form>
                                    <div id="divSucessoAnuncio" class="tab-floater tab-pane">
                                        <p class="text-success mt10">A mensagem foi enviada com sucesso!</p>
                                        <p class="mt30">Em breve você receberá uma cópia dessa mensagem em seu endereço de e-mail.</p>
                                        <p class="subline mt30">Não faça depósitos sem a certeza da existência e das condições do imóvel anunciado. Certifique-se da idoneidade do anunciante.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- fim contratar ficha -->
                    <div class="btn-fav-ficha add hand btnFavorito11102">
                        <div class="iconeFavorito addicon pull-left icone-favoritada"></div>
                        <!--<img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="" class="favbar-load pull-left" width="25" height="25"> -->
                        @if(auth()->guest())
                            @if(!Request::is('auth/login'))
                                <a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="pull-left">Adicionar à minha lista</span></a>
                            @endif
                        @else
                            <a href="#" id="modalLogin" class=""><span class="pull-left">Adicionar à minha lista</span></a>

                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div><!-- fim contratar anunciante -->

                <aside class="box-default clearfix outras-informacoes">
                    <span class="title">Mapa do Imóvel</span>
                    <div class="anuncio-area-mapa larMapa center-block">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60081.57254231143!2d-47.93496225!3d-19.750978449999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1447264947839" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>
                </aside>
                <aside class="box-default clearfix outras-informacoes">
                    <span class="title">Outras informações</span>

                    <!-- Atualizado há 16 dias -->
                    <div class="pull-left content-anunciante">
                        <a href="#" class="pull-left logo">
                            <img src="{{$advert->user->avatar}}" alt="{{$advert->user->name}}" width="88" height="52">
                        </a>
                        <div class="pull-left anunciante">
                            <a href="{{url('/')}}/{{$advert->user->id}}/{{$advert->user->url_name}}" class="fontsize13px">Outras ofertas de: {{$advert->user->name}}</a>
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
    <!-- modal email -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Enviar esse anúncio a um amigo</h4>
                </div>
                <div class="modal-body">
                    <div class="hide-body">
                        <center>

                            <img class="img-responsive center-block borda-image" width="140" height="140" src="<?php if($advert->images()->count() > 0):
                                echo asset($url1); endif?>" />
                            {{$advert->rua}}, {{$advert->bairro}}, {{$advert->cidade}} - {{$advert->estado}}

                            <small>Sob consulta</small>
                            <br />

                            <span><strong>Características: </strong></span>
                            @foreach($advert->features()->get() as $feature)
                                <span class="label label-success">{{$feature->name}}</span>
                            @endforeach
                        </center>
                        <br />
                    </div>
                    <form id="emailAmigo" action="" >
                        <input type="hidden" name="user_id" value="{{$advert->id}}" />

                        <input type="hidden" name="url_site" value="{{Request::url()}}" />
                        <input id="txtNomeAmigo" required="required" name="nome_amigo"class="input input-block-level" type="text" placeholder="Nome do seu amigo">

                        <input id="txtEmailAmigo" required="required" name="email_amigo"class="input input-block-level" type="email" placeholder="Email do seu amigo">
                        <input id="txtNomeRemetente" required="required" name="nome_anuncio" class="input input-block-level" type="text" placeholder="Seu nome">
                        <input id="txtEmailRemetente" required="required" name="email_anuncio" class="input input-block-level" type="email" placeholder="Seu email">
                        <textarea id="txtConteudo" required="required" name="assunto_anuncio"class="input-block-level" rows="2" placeholder="Mensagem"></textarea>
                        <button class="btn-link" data-dismiss="modal">Cancelar</button>
                        <button id="btnCompartilharOfertaEmail" type="submit" class="btn btn-zap">Enviar</button>
                    </form>
                    <!-- Sucesso -->
                    <div id="divSucessoAmigo" class="sucesso-modal tab-pane tab-absolute">
                        <div class="text-center">
                            <p>Anúncio enviado com sucesso!<br /><br /> Aproveite e veja outros anúncios</p>
                            <div id="btnFecharDenuncie" data-dismiss="modal" class="center-button btn-fechar-denuncie">
                                <a href="#" class="btn btn-zap">Fechar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    Ao enviar, você concorda com os <a href="#" target="_blank">Termos de Uso</a> e a <a href="" target="_blank">Política de Privacidade</a> do Sempre da negócio.
                </div>
            </div>
        </div>
    </div>
    <!-- modal denuncia -->
    <div class="modal fade denuncie-modal" id="denuncieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Denunciar Oferta</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">

                        <div class="tab-pane active">
                            <div class="text">
                                <p>Descreva qual foi o problema encontrado na oferta:</p>
                                <p>{{$advert->subcategory->name}}, @if($advert->numero_quarto > 0) {{$advert->numero_quarto}} quartos @endif, {{$advert->tipo_anuncio}}, {{$advert->rua}}<br><span class="logradouro">{{$advert->cidade}}, {{$advert->estado}}</span></p>
                            </div>

                            <form class="denuncie-form" action="" id="denunciaForm">
                                <input type="hidden" name="user_id" value="{{$advert->id}}" />
                                <input type="hidden" name="url_site" value="{{Request::url()}}" />
                                <select id="selTipoProblema" name="motivo" class="input-block-level"><option selected="selected" value="">Tipo de problema</option><option value="Imóvel já comercializado">Imóvel já comercializado</option><option value="Preço incorreto">Preço incorreto</option><option value="Sem retorno do anunciante">Sem retorno do anunciante</option><option value="Telefone não atende">Telefone não atende</option><option value="Foto incorreta">Foto incorreta</option><option value="Endereço/mapa incorreto">Endereço/mapa incorreto</option><option value="Não respondeu o e-mail em 48h">Não respondeu o e-mail em 48h</option><option value="Detalhe do empreendimento incorreto">Detalhe do empreendimento incorreto</option><option value="Imóvel em construção">Imóvel em construção</option><option value="Imóvel inexistente">Imóvel inexistente</option><option value="Oferta repetida">Oferta repetida</option><option value="Qualidade do atendimento recebido">Qualidade do atendimento recebido</option><option value="Publicação sem autorização">Publicação sem autorização</option></select>
                                <br />
                                <p id="msgTipoProblema" class="text-error" style="display: none;">* Selecione o Tipo de problema</p>

                                <textarea id="txtDescricaoProblema"  name="descricao" class="input-block-level" rows="4" placeholder="Descrição do problema"></textarea>
                                <p id="1_error" class="text-error" style="display: none;">* Digite a Descrição do problema</p>

                                <input id="txtNomeDenuncie" required name='nome' class="input-block-level" type="text" placeholder="Nome">
                                <p id="2_error" class="text-error" style="display: none;">* Digite seu Nome</p>

                                <input id="txtEmailDenuncie" required class="input-block-level" type="email" name="email" placeholder="E-mail">
                                <p id="3_error" class="text-error" style="display: none;">* Digite um E-mail válido</p>

                                <div class="center-button" id="divEnviarDenuncie">
                                    <button id="btnCancelar" class="btn-link" data-dismiss="modal">Cancelar</button>
                                    <button id="btnEnviar" type="submit" class="btn btn-zap">Enviar</button>
                                </div>
                            </form>
                        </div>

                        <!-- Tela Enviando -->
                        <!-- <div id="divEnviandoDenuncie" class="tab-pane tab-absolute">
                             <div class="text-center">
                                 ENVIANDO MENSAGEM...
                                 <div class="loader"></div>
                             </div>
                         </div> -->

                        <!-- Sucesso -->
                        <div id="divSucessoDenuncie" class="sucesso-modal tab-pane tab-absolute">
                            <div class="text-center">
                                <p>Denúncia enviada com sucesso.<br> Vamos analisar a informação que você nos encaminhou.</p>
                                <div id="btnFecharDenuncie" data-dismiss="modal" class="center-button btn-fechar-denuncie">
                                    <a href="#" class="btn btn-zap">Fechar</a>
                                </div>
                            </div>
                        </div>

                        <!-- Erro -->
                        <!--<div id="divErroDenuncie" class="tab-pane tab-absolute">
                            <div class="need-info text-center">
                                <span class="text text-error"><strong>Mensagem não enviada!</strong></span>
                                <p>Infelizmente não conseguimos enviar sua mensagem.</p>
                                <p>O que você deseja fazer?</p>

                                <div class="center-button">
                                    <a id="btnTentarNovamenteDenuncie" class="btn btn-zap">Tentar novamente</a>
                                    <a data-dismiss="modal" class="btn btn-zap btn-fechar-denuncie">Fechar</a>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer tl">
                    <strong class="text-error">ATENÇÃO: </strong>Se você for o anunciante desta oferta e deseja alterar os dados deste anúncio, entre em contato com nosso atendimento online.
                </div>
            </div>
        </div>
    </div>

@endsection