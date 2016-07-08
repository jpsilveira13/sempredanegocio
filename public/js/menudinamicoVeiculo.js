
function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
function pagination(page) {
    var filters = $('#formSearchVeiculos').serialize() + "&page=" + page;
    if(status == 0) {
        status = 1;

        $.ajax({
            url: "search-veiculos",
            type: 'GET',
            cache: false,
            data: filters,
            beforeSend: function () {
                $('#page-selection').hide();

                swal({
                    title: "Carregando dados",
                    text: "",
                    imageUrl: "../images/loadingCarro.gif",
                    showConfirmButton: false
                });
                $('html, body').animate({scrollTop: 0}, 'slow');
                $('#products').empty();
            }, success: function (data) {

                $('html, body').animate({scrollTop: 0}, 'slow');
                if(data.total== 0) {
                    $("#page-selection").hide();

                }else{
                    mostra_paginacao(data.current_page, data.last_page);
                    $("#page-selection").show();
                }
                $("#page-selection").show();
                var totalAnuncio = formatNumber(data.total);
                $('.search-results-header-counter').html(totalAnuncio);
                if (data.data.length != 0) {

                    $('#loading-page').css('display', 'block');
                    $(".before").empty();
                    $('#resultSearch').fadeTo('slow', 1);
                    var html = '';

                    var data = data.data;
                    var len = data.length;
                    $('#page').val(data.current_page);
                    //Criador do contador para os anuncios
                    var cont = 0;
                    var char = "imoveis/img";
                    var url;
                    for (var i = 0; i < len; i++) {
                        cont++;
                        if (cont > 12) {
                            cont = 0;
                            html += '<div style="margin-bottom: 20px" class="item col-xs-12 col-sm-12 col-lg-12 col-md-12 bloco-item">';
                            if(!page || page == 1){

                                html+='<a class="Anuncie aqui" target="_blank" title="Anuncie aqui" href="326135/carro-cia"> <img src="images/bannerCarroCia.png" class="img-menor img-responsive center-block" /></a>';
                            }else{
                                html += '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"style="display:block" data-ad-client="ca-pub-9276435422488602" data-ad-slot="4429425578" data-ad-format="auto"></ins>  <script> (adsbygoogle = window.adsbygoogle || []).push({}) </script>';
                            }
                            html+='</div>';
                        }
                        html += '<div class="item col-xs-12 col-sm-6 col-lg-4 col-md-4 bloco-item"><a class="item-total" href="/anuncio/' + data[i].tipo_anuncio + '/' + data[i].id + '/' + data[i].url_anuncio + '"><div class="thumbnail heigth417">';

                        //Validação se existe imagem ou nao
                        if (data[i].images[0]) {

                            if (data[i].images[0].extension.indexOf(char) > -1) {
                                url = "galeria/" + data[i].images[0].extension;
                            } else {
                                url = data[i].images[0].extension;

                            }
                            html += '<img class="group list-group-image content-img-sugestao lazy transition-img" data-original="' + url + '" width="220" height="229" alt="' + data[i].anuncio_descricao + '" />'

                        } else {
                            html += '<img class="group list-group-image content-img-sugestao lazy transition-img" src="images/no-image.jpg" alt="titulo imagem" />';
                        }
                        html += ' <div class="caption infos-suggest"> <h4 class="group inner list-group-item-heading text-bairro">' + data[i].advert_veiculo.marca + '<br />' + data[i].advert_veiculo.modelo + '</h4><p class="group inner list-group-item-text"><div class="features"><div><span><i class="spr-resultado-busca ico-year"></i>' + data[i].advert_veiculo.ano + '</span><span><i class="spr-resultado-busca ico-combustivel"></i>' + data[i].advert_veiculo.combustivel + '</span></div><div><span><i class="spr-resultado-busca ico-km"></i>' + data[i].advert_veiculo.km + '</span><span><i class="spr-resultado-busca ico-shift"></i>' + data[i].advert_veiculo.cambio + '</span></div></div> </p>';
                        html += '<div class="col-xs-12 col-md-12 list-item-nav2"><p class="lead description-anuncio">' + data[i].anuncio_descricao + '</p></div><div class="row list-group-hidden"> <div class="col-xs-12 col-md-12"><p class="lead description-anuncio">' + data[i].anuncio_descricao + '</p></div></div>';
                        html += '<div class="row mb4"><div class="col-xs-8 col-md-8 "><div class="bottom-suggest"> <span class="val-imovel">R$ ' + mvalor(data[i].preco) + ' </span>';
                        //Validar se o anúncio é venda ou compra
                        if (data[i].tipo_anuncio == 'aluga') {
                            html += '<span class="text-diaria"> / mês</span>';
                        } else {
                            html += '<span class="text-diaria"> / venda</span>';
                        }
                        html += '</div></div><div class="col-xs-4 col-md-4 fr"><div class="acoes-minifichas-sugestoes"> <span class="addicon btnFavorito4090308 icone-favoritada pull-right fvestilo"data-toggle="tooltip" data-placement="top" data-original-title="Adicionar à minha lista"></span></div></div></div></div></div></a></div>';

                    }

                    $('#products').append(html);

                    $("img.lazy").lazyload({
                        effect: "fadeIn"

                    });

                    window.history.pushState({}, null, '/anuncio?transacao=' + data[0].tipo_anuncio + '&cidade=&' + filters);
                    swal.close();

                } else {
                    swal.close();

                    $('#products').append('<h1 class="text-error-search">Nenhum resultado foi encontrado!</h1><img class="img-responsive center-block" src="../images/404erro.png" />');
                    $('#page-selection').hide();
                }
                status = 0;
            }

        });
    }
}



jQuery(".escolhaAcomodacao").change(function () {
    paginaAtual = 1;

    pagination(paginaAtual);
});

$("#listaCidades li a").livequery(function(){
    $(this).click(function(){
        $('#bairro').attr('readonly', false);
        paginaAtual = 1;

        pagination(paginaAtual);
    });

});
$("#listaBairros li a").livequery(function(){
    $(this).click(function(){
        paginaAtual = 1;
        pagination(paginaAtual);
    });

});

function mostra_paginacao(page_inicial, last_page){

    $('#page-selection').bootpag({
        total: last_page,
        page: page_inicial,
        maxVisible: 6,
        next: '>',
        prev: '<',
        leaps: true,
        firstLastUse: true,
        first: 'Início',
        last: 'Final',

    }).on("page", function(event, page){

        event.preventDefault();
        pagination(page,1);


    });
}