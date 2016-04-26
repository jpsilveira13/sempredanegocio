
var paginaAtual = 1;
var temMaisUma = true;
var continuaScroll = true;
function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
function scrollPagina(page) {
    page = paginaAtual;
    if (continuaScroll) {
        if(page == 1){
            var filters = $('#formSearchVeiculos').serialize();


        }else{
            var filters = $('#formSearchVeiculos').serialize() + "&page=" + page;

        }
        console.log(filters);
        continuaScroll = false;
        $.ajax ({
            url : "search-veiculos",
            type: 'GET',
            cache: false,
            data: filters,
            beforeSend: function(){

                if(page == 1 ){
                    $('#resultSearch').fadeTo('slow',0.5);
                    $('#products').empty();
                    $("html, body").animate({scrollTop: 0}, "slow");
                    $('.before').show().append('<img class="img-responsive" src="../images/loadingSearch.gif" />');

                }

            },
            complete: function (data) {

                var total = data.responseJSON.total;

                if(total == 0){
                    $('.search-results-header-counter').html(total);
                    $(".before").empty();
                    $('#resultSearch').fadeTo('slow', 1);
                    $('.before').show().append('<h1 class="text-error-search">Nenhum resultado foi encontrado!</h1><img class="img-responsive" src="../images/404erro.png" />');


                }
            },
            success: function(data) {

                if (data.data.length != 0) {
                    $('#loading-page').css('display','block');
                    continuaScroll = true;

                    $(".before").empty();
                    $('#resultSearch').fadeTo('slow', 1);
                    var html = '';
                    var totalAnuncio = formatNumber(data.total);
                    console.log(data);
                    var data = data.data;
                    var len = data.length;
                    $('.search-results-header-counter').html(totalAnuncio);
                    //Criador do contador para os anuncios
                    var cont = 0;
                    var char = "imoveis/img";
                    var url;
                    console.log(data);
                    for (var i = 0; i < len; i++) {
                        cont++;
                        if(cont > 12 ){
                            cont = 0;
                            html+='<div style="margin-bottom: 20px" class="item col-xs-12 col-sm-12 col-lg-12 col-md-12 bloco-item"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"style="display:block" data-ad-client="ca-pub-9276435422488602" data-ad-slot="4429425578" data-ad-format="auto"></ins>  <script> (adsbygoogle = window.adsbygoogle || []).push({}) </script></div>';
                        }
                        html += '<div class="item col-xs-12 col-sm-6 col-lg-4 col-md-4 bloco-item"><a class="item-total" href="/anuncio/' + data[i].tipo_anuncio + '/' + data[i].id + '/' + data[i].url_anuncio + '"><div class="thumbnail heigth417">';

                        //Validação se existe imagem ou nao
                        if (data[i].images[0]) {

                            if(data[i].images[0].extension.indexOf(char) > -1){
                                url = "galeria/" + data[i].images[0].extension;
                            }else{
                                url = data[i].images[0].extension;

                            }
                            html += '<img class="group list-group-image content-img-sugestao lazy transition-img" data-original="'+url+'" width="220" height="229" alt="'+data[i].anuncio_descricao+'" />'

                        } else {
                            html += '<img class="group list-group-image content-img-sugestao lazy transition-img" src="images/no-image.jpg" alt="titulo imagem" />';
                        }
                        html += ' <div class="caption infos-suggest"> <h4 class="group inner list-group-item-heading text-bairro">' + data[i].advert_veiculo.marca + '<br />' + data[i].advert_veiculo.modelo + '</h4><p class="group inner list-group-item-text"><div class="features"><div><span><i class="spr-resultado-busca ico-year"></i>'+data[i].advert_veiculo.ano+'</span><span><i class="spr-resultado-busca ico-combustivel"></i>'+data[i].advert_veiculo.combustivel+'</span></div><div><span><i class="spr-resultado-busca ico-km"></i>'+data[i].advert_veiculo.km+'</span><span><i class="spr-resultado-busca ico-shift"></i>'+data[i].advert_veiculo.cambio+'</span></div></div> </p>';
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
                        effect: "fadeIn"

                    });
                    paginaAtual++;
                    window.history.pushState({}, null, '/anuncio?transacao='+ data[0].tipo_anuncio +'&cidade=&'+ filters);

                }else {
                    continuaScroll = false;
                    $('#loading-page').css('display','none');
                    $('#products').append('<div class="teste"> <p style="clear:both; text-align:center"><br /><br />FIM DE ANÚNCIOS ;/</p></div>');
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

$("#listaCidades li a").livequery(function(){
    $(this).click(function(){
        $('#bairro').attr('readonly', false);
        paginaAtual = 1;
        continuaScroll = true;
        scrollPagina();
    });


});
$("#listaBairros li a").livequery(function(){
    $(this).click(function(){
        paginaAtual = 1;
        continuaScroll = true;
        scrollPagina();
    });

});