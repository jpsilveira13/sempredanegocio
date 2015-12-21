@extends('site.layout')

@section('content')

    <div class="clearfix" style="margin-bottom: 10px"></div>

    <div class="container no-padding">
        <div class="col-md-12 col-lg-8 ">
            <div class="side-left">
                <div class="box-default clearfix imovel-area-detalhe">
                    <h1 class="pull-left">
                        <span class="subtitle">Flat para Alugar</span>
                        {{$advert->rua}}
                        <br />
                        <span class="logradouro">{{$advert->bairro}}, {{$advert->cidade}} - {{$advert->estado}}</span>
                    </h1>
                    <div class="pull-right posvalue-imovel">
                        <span class="value-ficha">
                                <span class="subtitle">Valor de Locacao</span>
                                R$ {{$advert->preco}}
                        </span>
                    </div>
                </div><!-- box informações endereço -->

                <div class="box-default informacoes-imovel clearfix">
                    <div class="pull-left">
                        <ul class="unstyled no-padding">
                            <li>{{$advert->numero_quarto}}<span class="text-info">quarto</span></li>
                            <li>{{$advert->numero_suite}}<span class="text-info">suíte</span></li>
                            <li>{{$advert->area_construida}}<span class="text-info">Área Útil (m²)</span></li>
                            <li>{{$advert->area_construida}}<span class="text-info">Área Total (m²)</span></li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <ul class="unstyled no-padding">
                            <li>
                                R$ {{number_format((float)$advert->valor_iptu,2)}}
                                <span class="text-info">IPTU</span>
                            </li>
                        </ul>
                    </div>
                </div><!-- box informações do imovel -->
                <div class="box-default clearfix carrosel-fotos-imovel">
                    <div class="row">
                        <div class="col-md-12" id="slider">

                            <div class="col-md-12" id="carousel-bounding-box">
                                <div id="carrouselImovel" class="carousel slide">
                                    <!-- main slider carousel items -->
                                    <div class="carousel-inner">
                                        @if($advert->images()->count() >0)
                                            <?php $j = 0 ?>
                                            @foreach($advert->images()->get() as $images)
                                                <div class="<?php if($j==0){echo 'active';}?> item srle" data-slide-number="<?=$j?>">
                                                    <img src="{{url('gallery/'.$images->extension)}}" class="img-responsive">
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
                                            <a id="carousel-selector-<?=$i?>" class="<?php if($i==0){echo 'selected';}?>">
                                                <img src="{{url('gallery/'.$images->extension)}}" width="80" height="60" class="img-responsive">
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
                        <p></p>
                        <p>
                            <strong>Características do Imóvel:</strong>

                            @foreach($advert->features()->get() as $feature)
                                {{$feature->name}},
                            @endforeach
                        </p>
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
                                        <textarea id="txtMensagem" class="input-block-level" rows="5">
Olá, Gostaria de ter mais informações sobre o imóvel Apartamento à venda, R$ {{$advert->preco}}, {{$advert->cidade}} - {{$advert->estado}}, que encontrei no Sempre da Negócio. Aguardo seu contato, obrigado.

                                        </textarea>
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
                        <a href="#loginModal" id="modalLogin" class="" data-toggle="modal" data-target="#loginModal"><span class="pull-left">Adicionar à minha lista</span></a>
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
    <!-- modal email -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Enviar esse anúncio a um amigo</h4>
                </div>
                <div class="modal-body">
                    <center>

                        <img class="img-responsive center-block borda-image" width="140" height="140" src="<?php if($advert->images()->count() > 0):
                        echo asset('gallery/'.$advert->images()->first()->extension); else: echo asset('images/noimage2.jpg'); endif?>" />
                        {{$advert->rua}}, {{$advert->bairro}}, {{$advert->cidade}} - {{$advert->estado}}

                        <small>Sob consulta</small>
                        <br />

                        <span><strong>Características: </strong></span>
                        @foreach($advert->features()->get() as $feature)
                            <span class="label label-success">{{$feature->name}}</span>
                        @endforeach
                    </center>
                    <br />
                    <form autocomplete="off">
                        <input id="txtNomeAmigo" class="input input-block-level" type="text" placeholder="Nome do seu amigo">
                        <input id="txtEmailAmigo" class="input input-block-level" type="email" placeholder="Email do seu amigo">
                        <input id="txtNomeRemetente" class="input input-block-level" type="text" placeholder="Seu nome">
                        <input id="txtEmailRemetente" class="input input-block-level" type="email" placeholder="Seu email">
                        <textarea id="txtConteudo" class="input-block-level" rows="2" placeholder="Mensagem"></textarea>
                        <button class="btn-link" data-dismiss="modal">Cancelar</button>
                        <button id="btnCompartilharOfertaEmail" type="button" class="btn btn-zap">Enviar</button>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    Ao enviar, você concorda com os <a href="#" target="_blank">Termos de Uso</a> e a <a href="" target="_blank">Política de Privacidade</a> do Sempre da negócio.
                </div>
            </div>
        </div>
    </div>
    <!-- modal login -->
    <div class="modal modal-login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Acessar Sempre da Negócio</h4>
                </div>
                <div class="modal-body">

                    <span id="mensagemLoginSalvarBusca" class="alerta-zero alerta-imput-busca alerta-login-busca" style="display: block;">Realize seu login para adicionar o imóvel à sua lista de imóveis preferidos.</span>

                    <div id="login" class="login">

                        <div id="divLogin" class="login-box">
                            <p class="titulo">Já sou cadastrado</p>
                            <p id="mensagemPadrao" class="desc">Se você já é um usuário do Sempre da Negócio, pode fazer seu login abaixo.</p>
                            <p id="mensagemEmailExistente" class="aviso" style="display: none;">O email informado já está cadastrado no Sempre da Negócio Imóveis. Faça seu login abaixo.</p>
                            <div class="rel">
                                <input type="email" id="txtEmailUsuarioLogin" class="input input-block-level" placeholder="E-mail" data-toggle="tooltip" title="Este campo deve ser preenchido" autocapitalize="off">
                                <img id="imgLoadingEmail" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                            </div>

                            <input type="password" id="txtSenhaUsuario" onkeyup="EnterLogin(event);" class="input input-block-level" placeholder="Senha" data-toggle="tooltip" title="Este campo deve ser preenchido">

                            <div class="forgot-pass">
                                <a href="#" id="lnkEsqueciSenhaLogin" class="" onclick="ExibirRecuperacaoSenha()">Esqueci minha senha</a>
                            </div>
                            <button id="btnLogin" onclick="EfetuarLogin();" class="btn btn-zap pull-right">Entrar</button>

                            <div id="senhaInvalida" class="error-distance hide">
                                <div class="message">
                                    <span class="icone-fechar-modal"></span>
                                    <span class="text">E-mail ou senha inválidos.<br> Tente novamente.</span>
                                </div>
                            </div>

                            <div id="erroLogin" class="error-distance hide">
                                <div class="message">
                                    <span class="icone-fechar-modal"></span>
                                    <span class="text">Não foi possível logar.<br> Tente mais tarde.</span>
                                </div>
                            </div>

                            <div class="auth-loading hide">
                                <div class="message">
                                    <img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Autenticando...">
                                    <span>Autenticando…<br> Aguarde!</span>
                                </div>
                            </div>
                        </div>

                        <div id="divRecuperacaoSenha" class="login-box hide" style="display: none;">
                            <p class="titulo">Recuperar senha</p>
                            <p class="desc">Digite o e-mail cadastrado para receber o lembrete de senha.</p>

                            <div class="rel">
                                <input type="email" id="txtEmailEnviar" onkeyup="EnterRecuperacao(event);" class="input input-block-level" placeholder="E-mail" autocapitalize="off">
                                <img id="imgLoadingRecuperarSenha" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                            </div>

                            <div class="forgot-pass">
                                <a href="#" id="lnkEsqueciSenhaRecuperacao" class="" onclick="ExibirLogin();">« Voltar para login</a>
                            </div>
                            <button id="btnRecuperarSenha" onclick="EnviarEsqueciMinhaSenha();" class="btn btn-zap pull-right">Enviar</button>

                            <div class="auth-loading hide">
                                <div class="message">
                                    <img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Enviando…">
                                    <span>Enviando…<br> Aguarde!</span>
                                </div>
                            </div>

                            <div class="error-distance hide">
                                <div class="message">
                                    <span class="icone-fechar-modal"></span>
                                    <span class="text">Não foi possível<br> enviar sua senha.</span>
                                </div>
                            </div>

                            <div class="saved-distance hide">
                                <div class="message">
                                    <span class="icone-check"></span>
                                    <span class="text">Senha enviada ao<br> e-mail cadastrado.</span>
                                </div>
                            </div>

                        </div>

                        <div id="divMiniCadastro" class="cadastro-box no-show">
                            <p class="titulo">Não sou cadastrado</p>
                            <p class="desc">Ainda não está no Sempre da Negócio? Preencha os campos abaixo para iniciar o cadastro.</p>

                            <input id="txtNomeUsuarioCadastro" class="input input-block-level span3" type="text" placeholder="Nome e sobrenome">
                            <div class="rel">
                                <input type="email" id="txtEmailUsuarioCadastro" onkeyup="EnterMiniCadastro(event);" class="input input-block-level span3" placeholder="E-mail" autocapitalize="off">
                                <img id="imgLoadingMiniCadastro" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                            </div>
                            <a href="javascript:void(0);" id="btnCadastrar" class="pull-right" onclick="IrParaCadastroCompleto();">Cadastrar</a>
                            <p class="info">Você será direcionado para completar seu cadastro com mais algumas informações.</p>
                        </div>
                    </div>

                    <div id="cadastro" class="cadastro" style="display: none;">
                        <p class="desc">Preencha as informações para criar seu cadastro no Sempre da Negócio e ter acesso a sua conta</p>

                        <p class="aviso">O email informado não está cadastrado no Sempre da Negócio. Faça seu cadastro no formulário abaixo ou tente fazer <a href="#" onclick="ExibirLogin();">login novamente</a>.</p>

                        <input id="txtNomeCadastro" class="input input-block-level span4" type="text" placeholder="Nome e sobrenome" maxlength="100">
                        <div class="rel">
                            <input type="email" id="txtEmailCadastro" class="input input-block-level span4" placeholder="Seu e-mail" maxlength="100" autocapitalize="off">
                            <img id="imgLoadingCadastro" src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading" class="loading hide" width="20" height="20">
                        </div>
                        <input type="email" id="txtConfirmaEmailCadastro" class="input input-block-level span4" placeholder="Confirme o seu e-mail" maxlength="100" autocapitalize="off">

                        <p class="input-group">
                            <input id="txtSenhaCadastro" class="input input-block-level span4" type="password" placeholder="Senha" maxlength="12">
                            <span>A senha deve conter entre 6 e 12 caracteres.</span>
                        </p>

                        <input id="txtConfirmaSenhaCadastro" onkeyup="EnterCadastro(event);" class="input input-block-level span4" type="password" placeholder="Confirme a senha" maxlength="12">

                        <label class="checkbox clear">
                            <input id="chkNovidades" type="checkbox" checked="checked" value="">Desejo receber novidades</label>

                        <p class="mt10 text-right">
                            <button id="btnCancelarCadastro" onclick="CancelarCadastro();" class="btn-link">Cancelar</button>
                            <button id="btnConfirmarCadastro" class="btn btn-zap">Finalizar Cadastro</button>
                        </p>

                        <div class="auth-loading hide">
                            <p class="message">
                                <img src="http://cjs.zapcorp.com.br/Content/img/loader.gif" alt="Loading">
                                <span>Finalizando seu cadastro…<br> Aguarde!</span>
                            </p>
                        </div>

                        <div class="error-distance hide">
                            <div class="message">
                                <span class="icone-fechar-modal"></span>
                                <span class="text">Infelizmente não conseguimos<br> concluir seu cadastro.</span>
                            </div>
                        </div>

                        <div class="saved-distance hide">
                            <div class="message">
                                <span class="icone-check"></span>
                                <span class="text">Cadastro criado com sucesso!</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer modal-footer-login">
                    <div class="btn-facebook" id="imgFacebook">
                        <span class="icone-facebook">Login com Facebook</span>
                    </div>

                    <span class="text">Você pode utilizar sua conta do Facebook para acessar com mais <strong>rapidez</strong> e <strong>praticidade</strong>.</span>
                </div>
                <div class="modal-footer modal-footer-cadastro text-center">
                    Ao me cadastrar confirmo que li e concordo com os <a href="" target="_blank">Termos de Uso</a>
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
                                <p>Casa, 3 quartos, Locacao, Rua Marcilio Conrado<br><span class="logradouro">Riacho Grande, Sao Bernardo do Campo - SP - 7821710</span></p>
                            </div>

                            <form class="denuncie-form">
                                <div class="hide">
                                    <span class="pull-left">Você é:</span>
                                    <input type="radio" id="denunciaAnunciante" name="tipoDenunciante" class="pull-left">
                                    <label for="denunciaAnunciante" class="pull-left lbl-radio">Anunciante</label>

                                    <input type="radio" id="denunciaConsumidor" name="tipoDenunciante" class="pull-left" checked="">
                                    <label for="denunciaConsumidor" class="pull-left lbl-radio">Consumidor</label>
                                </div>

                                <div class="toggle-mensagem hide">
                                    <p>Você gostaria de:<br> Entrar em contato com nosso <a href="#">atendimento online</a>? (das 8h às 18h)</p>
                                </div>

                                <select id="selTipoProblema" class="input-block-level"><option selected="selected" value="0">Tipo de problema</option><option value="1">Imóvel já comercializado</option><option value="2">Preço incorreto</option><option value="3">Sem retorno do anunciante</option><option value="4">Telefone não atende</option><option value="5">Foto incorreta</option><option value="6">Endereço/mapa incorreto</option><option value="7">Não respondeu o e-mail em 48h</option><option value="9">Detalhe do empreendimento incorreto</option><option value="10">Imóvel em construção</option><option value="11">Imóvel inexistente</option><option value="12">Oferta repetida</option><option value="13">Qualidade do atendimento recebido</option><option value="14">Publicação sem autorização</option></select>
                                <br />
                                <p id="msgTipoProblema" class="text-error" style="display: none;">* Selecione o Tipo de problema</p>

                                <textarea id="txtDescricaoProblema" class="input-block-level" rows="4" placeholder="Descrição do problema"></textarea>
                                <p id="msgDescricao" class="text-error" style="display: none;">* Digite a Descrição do problema</p>

                                <input id="txtNomeDenuncie" class="input-block-level" type="text" value="" placeholder="Nome">
                                <p id="msgNome" class="text-error" style="display: none;">* Digite seu Nome</p>

                                <input id="txtEmailDenuncie" class="input-block-level" type="email" value="" placeholder="E-mail">
                                <p id="msgEmailInvalido" class="text-error" style="display: none;">* Digite um E-mail válido</p>

                                <div class="center-button" id="divEnviarDenuncie">
                                    <button id="btnCancelar" class="btn-link" data-dismiss="modal">Cancelar</button>
                                    <button id="btnEnviar" type="button" class="btn btn-zap">Enviar</button>
                                </div>
                            </form>
                        </div>

                        <!-- Tela Enviando -->
                        <div id="divEnviandoDenuncie" class="tab-pane tab-absolute" style="display: none;">
                            <div class="text-center">
                                ENVIANDO MENSAGEM...
                                <div class="loader"></div>
                            </div>
                        </div>

                        <!-- Sucesso -->
                        <div id="divSucessoDenuncie" class="tab-pane tab-absolute" style="display: none;">
                            <div class="text-center">
                                <p>Denúncia enviada com sucesso.<br> Vamos analisar a informação que você nos encaminhou.</p>
                                <div id="btnFecharDenuncie" data-dismiss="modal" class="center-button btn-fechar-denuncie">
                                    <a href="#" class="btn btn-zap">Fechar</a>
                                </div>
                            </div>
                        </div>

                        <!-- Erro -->
                        <div id="divErroDenuncie" class="tab-pane tab-absolute" style="display: none;">
                            <div class="need-info text-center">
                                <span class="text text-error"><strong>Mensagem não enviada!</strong></span>
                                <p>Infelizmente não conseguimos enviar sua mensagem.</p>
                                <p>O que você deseja fazer?</p>

                                <div class="center-button">
                                    <a id="btnTentarNovamenteDenuncie" class="btn btn-zap">Tentar novamente</a>
                                    <a data-dismiss="modal" class="btn btn-zap btn-fechar-denuncie">Fechar</a>
                                </div>
                            </div>
                        </div>

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