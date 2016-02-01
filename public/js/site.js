// FUNÇÕES PARA MASCARAR CAMPOS:
// adaptado por joão paulo da silveira ;D
function mascaraCampo(o,f){
    v_obj=o
    v_fun=f
    setTimeout("executaMascaraCampo()",1)
}
function executaMascaraCampo(){
    v_obj.value=v_fun(v_obj.value)
}

function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}

function mascSoNumeros(v){
    return v.replace(/\D/g,"")
}

function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que nÃ£o Ã© dÃ­gito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parÃªnteses em volta dos dois primeiros dÃ­gitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hÃ­fen entre o quarto e o quinto dÃ­gitos
    return v;
}

function mascTelefoneDDD2(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parï¿½nteses em volta dos dois primeiros dï¿½gitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hï¿½fen entre o quarto e o quinto dï¿½gitos
    return v
}

function mascTelefoneDDD3(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/^(\d\d\d)(\d)/g,"($1) $2") //Coloca parï¿½nteses em volta dos TRï¿½S primeiros dï¿½gitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hï¿½fen entre o quarto e o quinto dï¿½gitos
    return v
}
function mascTelefone(v){

    /* v=v.replace(/\D/g,"")                 //Remove tudo o que nï¿½o ï¿½ dï¿½gito
     if (v.length < 11) {
     v=v.replace(/^(\d\d\d)(\d)/g,"($1) $2") //Coloca parï¿½nteses em volta dos TRï¿½S primeiros dï¿½gitos
     v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hï¿½fen entre o quarto e o quinto dï¿½gitos
     } else {
     v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parï¿½nteses em volta dos dois primeiros dï¿½gitos
     v=v.replace(/(\d{5})(\d)/,"$1-$2")    //Coloca hï¿½fen entre o quinto e o sexto dï¿½gitos
     }
     return v*/
    v=v.replace(/\D/g,"");             //Remove tudo o que nÃ£o Ã© dÃ­gito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parÃªnteses em volta dos dois primeiros dÃ­gitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hÃ­fen entre o quarto e o quinto dÃ­gitos
    return v;
}
function mascCPF(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dï¿½gitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dï¿½gitos
                                             //de novo (para o segundo bloco de nï¿½meros)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hï¿½fen entre o terceiro e o quarto dï¿½gitos
    return v
}

function mascCEP(v){
    v=v.replace(/D/g,"")                //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2") //Esse ï¿½ tï¿½o fï¿½cil que nï¿½o merece explicaï¿½ï¿½es
    return v
}

function mascCNPJ(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dï¿½gitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dï¿½gitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dï¿½gitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hï¿½fen depois do bloco de quatro dï¿½gitos
    return v
}

function mascData(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/(\d{2})(\d)/,"$1/$2")       //Coloca uma barra entre o segundo e o terceiro dï¿½gitos
    v=v.replace(/(\d{2})(\d)/,"$1/$2")       //Coloca uma barra entre o quarto  e o quinto dï¿½gitos
                                             //de novo (para o segundo bloco de nï¿½meros)
    return v
}

function mascHora(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que nï¿½o ï¿½ dï¿½gito
    v=v.replace(/(\d{2})(\d)/,"$1:$2")       //Coloca uma barra entre o segundo e o terceiro dï¿½gitos
    v=v.replace(/(\d{2})(\d)/,"$1:$2")       //Coloca uma barra entre o quarto  e o quinto dï¿½gitos
                                             //de novo (para o segundo bloco de nï¿½meros)
    return v
}

function mascSite(v){

    //Esse sem comentarios para que vocï¿½ entenda sozinho ;-)
    v=v.replace(/^http:\/\/?/,"")
    dominio=v
    caminho=""
    if(v.indexOf("/")>-1)
        dominio=v.split("/")[0]
    caminho=v.replace(/[^\/]*/,"")
    dominio=dominio.replace(/[^\w\.\+-:@]/g,"")
    caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"")
    caminho=caminho.replace(/([\?&])=/,"$1")
    if(caminho!="")dominio=dominio.replace(/\.+$/,"")
    v="http://"+dominio+caminho
    return v
}

function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares

    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}

function mascValorPonto(v){
    v=v.replace(/[^1234567890.,]/g,""); //somente numeros, ponto e virgula
    v=v.replace(/,/,"."); //se digitar virgula transforma em ponto.
    return v;
}

function mascValorVirgula(v){
    v=v.replace(/[^1234567890.,]/g,""); //somente numeros, ponto e virgula
    v=v.replace(/\./,","); //se digitar ponto transforma em vï¿½rgula.
    return v;
}
function mascValorDoisDecimais(v){
    v=(mascSoNumeros(v));
    if (v.length > 2) {
        var i = Number(v);
        i = (i/100) ;
        return  i.toFixed(2);
    } else {
        return v
    }

}
//Começo jquery Site
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //salvar denuncia

    $( "#denunciaForm" ).submit(function( event ) {
        event.preventDefault();
        var $form = $( this ),
            data = $form.serialize(),
            url = "/form-denuncia";

        var posting = $.post( url, { formData: data } );

        posting.done(function( data ) {
            if(data.fail) {
                $.each(data.errors, function( index, value ) {
                    $('text-error').show('fast');
                });
                $('#successMessage').empty();
            }
            if(data.success) {

                $('#denunciaForm')[0].reset();

                $('#divSucessoDenuncie .denuncie-modal .tab-absolute').show('fast');
            } //success
        }); //done
    });

    /* FUNÇÃO CONTADOR SITE */

    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.text(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));
    $('.item-count').countTo({
        formatter: function (value, options) {
            return value.toFixed(options.decimals);
        },
        onUpdate: function (value) {
            console.debug(this);
        },
        onComplete: function (value) {
            console.debug(this);
        }
    });
    /* FIM CONTADOR */
    (function($) {
        "use strict"; // Start of use strict

        // jQuery for page scrolling feature - requires jQuery Easing plugin
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top - 50)
            }, 1250, 'easeInOutExpo');
            event.preventDefault();
        });

        // Highlight the top nav as scrolling occurs
        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 51
        })

        // Closes the Responsive Menu on Menu Item Click
        $('.navbar-collapse ul li a').click(function() {
            $('.navbar-toggle:visible').click();
        });

        // Fit Text Plugin for Main Header
        $("h1").fitText(
            1.2, {
                minFontSize: '35px',
                maxFontSize: '65px'
            }
        );

        // Offset for Main Navigation
        $('#mainNav').affix({
            offset: {
                top: 100
            }
        })

        // Initialize WOW.js Scrolling Animations
        new WOW().init();

    })(jQuery); // End of use strict

    var cbpAnimatedHeader = (function() {

        var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 300;

        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }

        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                classie.add( header, 'navbar-shrink' );
            }
            else {
                classie.remove( header, 'navbar-shrink' );
            }
            didScroll = false;
        }

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        init();

    })();
    $("#labelFaixaPreco").click(function () {
        //$('.formularioBusca').css('display', 'block');
        // ou pode também usar assim:
        $('#divFaixaPreco').show('fast');

    });
    $('#divFaixaPreco').on('mouseleave', function () {
        // this.style.display = 'none';
        $(this).hide('fast');
    });
    $("#labelQuarto").click(function () {
        //$('.formularioBusca').css('display', 'block');
        // ou pode também usar assim:
        $('#divQuartos').show('fast');

    });
    $('#divQuartos').on('mouseleave', function () {
        // this.style.display = 'none';
        $(this).hide('fast');
    });

    $("#labelSuite").click(function () {
        //$('.formularioBusca').css('display', 'block');
        // ou pode também usar assim:
        $('#divSuite').show('fast');

    });
    $('#divSuite').on('mouseleave', function () {
        // this.style.display = 'none';
        $(this).hide('fast');
    });
    $("#labelVaga").click(function () {
        //$('.formularioBusca').css('display', 'block');
        // ou pode também usar assim:
        $('#divVaga').show('fast');

    });
    $('#divVaga').on('mouseleave', function () {
        // this.style.display = 'none';
        $(this).hide('fast');
    });


    //$('ul.pagination').hide();

    (function(){

        var loading_options = {
            finishedMsg: "<div class='end-msg'>Não há mais anúncios!</div>",
            msgText: "<div class='carregamento-anuncio'>Carregando anúncios...</div>",
            img: "http://www.infinite-scroll.com/loading.gif"

        };
        $('#products').infinitescroll({

            loading : loading_options,
            navSelector : "ul.pagination",
            nextSelector : "ul.pagination li.active + li a",
            itemSelector : "#products .item",

        });
    })();

    //JS carregar fotos ;D
    var multiPhotoDisplay;

    $('#photos').on('change', function(e) {
        return multiPhotoDisplay(this);
    });

    this.readURL = function(input) {
        var reader;
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function(e) {
                var $preview;
                $('.image_to_upload').attr('src', e.target.result);
                $preview = $('.preview');
                if ($preview.hasClass('hide')) {
                    return $preview.toggleClass('hide');
                }
            };
            return reader.readAsDataURL(input.files[0]);
        }
    };

    //js fotos múltiplas anuncie

    multiPhotoDisplay = function(input) {


        var file, i, len, reader, ref;

        if (input.files && input.files[0]) {

            ref = input.files;

            for (i = 0, len = ref.length; i < len; i++) {
                file = ref[i];
                reader = new FileReader();
                reader.onload = function(e) {
                    var image_html;
                    image_html =
                        "<li class='ai_image'>" +
                        "<div class='image-anuncio'>" +
                        "<span></span>" +
                        "<img width=\"80\" height=\"38\" src=\"" + e.target.result + "\">" +
                        "</div>" +
                        "<div class='bts'>"+
                        "<a href='javascript:void(0)' class='bt-delete' title='excluir'></a>" +
                        "<a href='javascript:void(0)' class='bt-rotate' title='rotate'></a>" +
                        "</div>" +
                        "</li>";
                    var n = $( "#photos_clearing li" ).length;
                    if(n > 4){
                        alert('Número de upload no máximo 4');
                        return;

                    }else{
                        $('#photos_clearing').append(image_html);
                    }
                };
                reader.readAsDataURL(file);
            }
            window.post_files = input.files;
            if (window.post_files !== void 0) {
                return input.files = $.merge(window.post_files, input.files);
            }
        }
    };

    $(".bt-rotate").click(function(){
        alert('teste')
    });

    $('#carrouselImovel').carousel({
        interval: 4000
    });

    // handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
        var id_selector = $(this).attr("id");
        var id = id_selector.substr(id_selector.length -1);
        id = parseInt(id);
        $('#carrouselImovel').carousel(id);
        $('[id^=carousel-selector-]').removeClass('selected');
        $(this).addClass('selected');
    });

// when the carousel slides, auto update
    $('#carrouselImovel').on('slid', function (e) {
        var id = $('.item.active').data('slide-number');
        id = parseInt(id);
        $('[id^=carousel-selector-]').removeClass('selected');
        $('[id=carousel-selector-'+id+']').addClass('selected');
    });



    //js slider imovel
    (function(window, $, undefined) {

        var conf = {
            center: true,
            backgroundControl: false
        };

        var cache = {
            $carouselContainer: $('.thumbnails-carousel').parent(),
            $thumbnailsLi: $('.thumbnails-carousel li'),
            $controls: $('.thumbnails-carousel').parent().find('.carousel-control')
        };

        function init() {
            cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
            cache.$thumbnailsLi.first().addClass('active-thumbnail');

            if(!conf.backgroundControl) {
                cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
            }
            else {
                cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
            }

            if(conf.center) {
                cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
            }
        }

        function refreshOpacities(domEl) {
            cache.$thumbnailsLi.removeClass('active-thumbnail');
            cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
        }

        function bindUiActions() {
            cache.$carouselContainer.on('slide.bs.carousel', function(e) {
                refreshOpacities(e.relatedTarget);
            });

            cache.$thumbnailsLi.click(function(){
                cache.$carouselContainer.carousel($(this).index());
            });
        }

        $.fn.thumbnailsCarousel = function(options) {
            conf = $.extend(conf, options);

            init();
            bindUiActions();

            return this;
        }

    })(window, jQuery);

    $('#category_id').on('change',function(e){

        var cat_id = e.target.value;

        $('#divSubCategory').show('fast');
        $('#divAdvertSubcategory').hide('fast');
        $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){

                $('#subcategory').append('<option value="'+subcatObj.id+'" id="'+subcatObj.id+'" >'+subcatObj.name+'</option>');

            });

        });

    });

    $('#subcategory').on('change',function(e){
        var adv_id = e.target.value;

        $('#divAdvertSubcategory').hide('fast');
        $.get('/ajax-advcat?adv_id=' + adv_id, function(data){
            $('#advertcategory').empty();
            if(data.advert.length != 0){
                for(var i = 0, len = data.advert.length; i < len; i++) {

                    $('#advertcategory').append('<option value="' + data.advert[i].id + '" id="' + data.advert[i].id + '" >' + data.advert[i].name + '</option>');
                }
                $('#divAdvertSubcategory').show('fast');
            }

            var caractList = $('#listCaract');
            var html = '<div class="btn-group" data-toggle="buttons">';
            for(var j = 0, lenj = data.features.length;j<lenj;j++){

                html+= '<label class="btn btn-default btcaract mt10" style="width: 204px;margin-left: 47px;"><input type="checkbox" aria-required="false" class="material_checkbox" name="caracteristicas[]" value="'+data.features[j].id+'">'+data.features[j].name+'</label>'
            }
            html+='</div>';
            caractList.html(html);

        });

    });



//procurar pelo cep

    $('#cep').blur(function(){
        /* Configura a requisição AJAX */
        $.ajax({
            url : 'consultar_cep', /* URL que será chamada */
            type : 'GET', /* Tipo da requisição */
            data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function(data){
                if(data.sucesso == 1){
                    $('#rua').val(data.rua);
                    $('#bairro').val(data.bairro);
                    $('#cidade').val(data.cidade);
                    $('#estado').val(data.estado);
                    $('#numero').focus();
                    $('.localizacao').removeClass('hide').addClass('shows');
                }
                if(data.sucesso == 2){

                    $('#rua').val('').removeAttr('disabled').focus();

                    $('#bairro').val('').removeAttr('disabled');
                    $('#cidade').val(data.cidade);
                    $('#estado').val(data.estado);
                    $('.localizacao').removeClass('hide').addClass('shows');
                }
            }
        });
        return false;
    });
    $(function() {
        $( "#slider-range, #slider-range2" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });

//buscar cidade
    $('#location').on('keyup',function(e){
        var minLetras = 4;
        var textoPesquisa = $('#location').val();
        var listaCidade = $("#listaCidades");
        if(textoPesquisa.length >= minLetras ) {
            listaCidade.show('fast');
            $.get('/search-cidade/' + this.value, function (data) {
                $('#listaCidades').html('');
                $.each(data, function (index, cities) {
                    $('#listaCidades').append('<li><a value="' + cities.nome + '">' + cities.nome + ' - ' + cities.uf + '</a></li>');
                    $('#listaCidades li a').on('click',function(){
                        var locationElem = $('#location');
                        var valorCampo = $(this).attr('value');
                        locationElem.val(valorCampo);
                        locationElem.attr('value',valorCampo);
                        locationElem.focus();
                    });
                });

            });
            if(listaCidade.is(":visible")){

                $('body').on('click',function(){

                    listaCidade.fadeOut();

                });
            }
        }else{
            listaCidade.hide();
            listaCidade.html('');
        }

    });
//js area pesquisar

    $("#btn-pesquisa").on('click',function(e){
        e.preventDefault();

        $("#menu-total").fadeIn("fast");
    });

//lazyload

    $("img.lazy").lazyload({
        effect : "fadeIn"
    });
    $(window).scroll(function(){
        if ($(this).scrollTop() > 300) {
            $('#btAnuncie').fadeIn();
        } else {
            $('#btAnuncie').fadeOut();
        }
    });
//js modal evento
    $('#list').click(function(event){event.preventDefault();
        $('#products .item').addClass('list-group-item').removeClass('bloco-item');
        $('#products .list-infos').addClass('list-item-nav');
        $('#products .list-infos').addClass('list-item-nav2');

    });
    $('#grid').click(function(event){event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .list-infos').removeClass('list-item-nav');
        $('#products .list-infos').removeClass('list-item-nav2');
        $('#products .item').addClass('grid-group-item, bloco-item');
    });


//js quadrado texto

    $("#tooltip-config li").tooltip({
        placement : 'top'
    });

//js página imovel interno

    $('#liTelefone').click(function(){
        $('#phone').removeClass('hide').addClass('show');

    });

//multiple images anuncio

    $('#images').change(function(e) {
        var files = e.target.files;

        for (var i = 0; i <= files.length; i++) {

            // when i == files.length reorder and break
            if(i==files.length){
                // need timeout to reorder beacuse prepend is not done
                setTimeout(function(){ reorderImages(); }, 100);
                break;
            }

            var file = files[i];
            var reader = new FileReader();

            reader.onload = (function(file) {
                return function(event){
                    $('#sortable').prepend('<li class="ui-state-default" data-order=0 data-id="'+file.lastModified+'"><img src="' + event.target.result + '" style="width:100%;" /> <div class="order-number">0</div></li>');
                };
            })(file);

            reader.readAsDataURL(file);
        }// end for;

    });

//validação formulário anuncio

    $('#sortable').sortable();
    $('#sortable').disableSelection();

//sortable events
    $('#sortable').on('sortbeforestop',function(event){

        reorderImages();

    });

});







