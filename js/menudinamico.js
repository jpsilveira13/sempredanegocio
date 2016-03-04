var paginaAtual = 1;
var temMaisUma = true;
var continuaScroll = true;

function scrollPagina(page) {
    page = paginaAtual;
    if (continuaScroll) {
        if(page){
            var filters = $('#formSearchImoveis').serialize() + "&page=" + page;
        }else{
            var filters = $('#formSearchImoveis').serialize();

        }

        continuaScroll = false;

        $.ajax ({
            url : "search-imoveis",
            type: 'GET',
            cache: false,
            data: filters,
            beforeSend: function(data){

                if(page == 1 ){
                    $('#resultSearch').fadeTo('slow',0.5);
                    $('#products').empty();
                    $("html, body").animate({scrollTop: 0}, "slow");
                    $('.before').show().append('<img class="img-responsive" src="../images/loadingSearch.gif" />');

                }

            },
            success: function(data) {
               // console.log(data.data);
                if (data.data.length != 0) {
                    $('#loading-page').css('display','block');
                    continuaScroll = true;

                    $(".before").empty();
                    $('#resultSearch').fadeTo('slow', 1);
                    var html = '';
                    var totalAnuncio = data.total;
                    var data = data.data;

                    var len = data.length;

                    $('.search-results-header-counter').html(totalAnuncio);
                    for (var i = 0; i < len; i++) {
                        html += '<div class="item col-xs-12 col-sm-6 col-lg-4 col-md-4 bloco-item"><a class="item-total" href="/anuncio/' + data[i].tipo_anuncio + '/' + data[i].id + '/' + data[i].url_anuncio + '"><div class="thumbnail">';
                        //Validação se existe imagem ou nao
                        if (data[i].images[0]) {
                            html += '<img class="group list-group-image content-img-sugestao lazy transition-img" data-original="gallery/' + data[i].images[0].extension + '" width="220" height="229" alt="titulo imagem" />'

                        } else {
                            html += '<img class="group list-group-image content-img-sugestao lazy transition-img" src="images/no-image.jpg" alt="titulo imagem" />';
                        }
                        html += ' <div class="caption infos-suggest"> <h4 class="group inner list-group-item-heading text-bairro">' + data[i].cidade + '<br />' + data[i].estado + '</h4><p class="group inner list-group-item-text"><ul class="list-infos unstyled clearfix no-padding" id="tooltip-config"><li class="icone-quartos zaptip" data-original-title="Quantidade de quartos" data-toggle="tooltip">' + data[i].numero_quarto + '</li><li class="icone-suites zaptip" data-original-title="Quantidade de suítes" data-toggle="tooltip">' + data[i].numero_suite + '</li><li class="icone-vagas zaptip" data-original-title="Quantidade de vagas" data-toggle="tooltip">' + data[i].numero_garagem + '</li></ul>';
                        html += '<div class="col-xs-12 col-md-12 list-item-nav2"><p class="lead description-anuncio">' + data[i].anuncio_descricao + '</p></div><div class="row list-group-hidden"> <div class="col-xs-12 col-md-12"><p class="lead description-anuncio">' + data[i].anuncio_descricao + '</p></div></div>';
                        html += '<div class="row mb4"><div class="col-xs-8 col-md-8 "><div class="bottom-suggest"> <span class="val-imovel">R$ ' + mvalor(data[i].preco) + ' </span>';
                        //Validar se o anúncio é venda ou compra
                        if (data[i].tipo_anuncio == 'aluga') {
                            html += '<span class="text-diaria"> / mês</span>';
                        } else {
                            html += '<span class="text-diaria"></span>';
                        }
                        html += '</div></div><div class="col-xs-4 col-md-4 fr"><div class="acoes-minifichas-sugestoes"> <span class="addicon btnFavorito4090308 icone-favoritada pull-right fvestilo"data-toggle="tooltip" data-placement="top" data-original-title="Adicionar à minha lista"></span></div></div></div></div></div></a></div>';

                    }

                    $('#products').append(html);

                    $("img.lazy").lazyload({
                        effect: "fadeIn",

                    });
                    paginaAtual++;

                }else {

                    continuaScroll = false;
                    $('#loading-page').css('display','none');
                    $('#products').append('<p style="clear:both; text-align:center"><br /><br />FIM DE ANÚNCIOS ;/</p>');
                }
            }

        });

    }
}


$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height()){
        if(temMaisUma){
            paginaAtual = 0;
            temMaisUma = false;
            scrollPagina(paginaAtual);
        }

        if(paginaAtual == 0){
            temMaisuma = false;
            paginaAtual++;
        }
        scrollPagina(paginaAtual);
    }
});

jQuery(".escolhaAcomodacao").change(function () {
    paginaAtual = 1;
    continuaScroll = true;
    scrollPagina();
});
