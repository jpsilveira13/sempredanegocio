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



function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares

    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}


function mvalor2(v){
    v=v.replace(/[^1234567890],./g,""); //somente numeros, ponto e virgula
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

    $('#confirmaPagamento').livequery(function () {
        $('#confirmaPagamento').ready(function () {
            var code = $('#pagamentoCampo').val();
            PagSeguroLightbox(code);
        });
    });


    //incrementação ao clicar na div


    $('.icone-telefone').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "/get-contadortel",
            dataType: 'html',
            data: ({id:id})
        });
    });

    // Contar ao clicar nos sumuladores de financiamento 
    $('.contFinanciamento').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "/get-contadorFinanciamento",
            dataType: 'html',
            data: ({id:id})
        });
    });


    $('.btnPagamento').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "/form-pagamento",
            dataType: 'html',
            data: ({id:id}),
            beforeSend: function () {

            },
            success: function (id) {
                swal({
                    title: 'Parabéns seu perfil foi atualizado com sucesso!',
                    type: 'success',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText:
                        '<a href="http://www.sempredanegocio.com.br/admin/home">Painel Administrativo</a>',
                    cancelButtonText:
                        '<a href="http://www.sempredanegocio.com.br">Ir para Home</a>',
                })

            },
            error: function(id){
                console.log("Algo deu erro!!");
            }

        });

    });

    //js login form
//js alterar campo form
    var LoginModalController = {
        tabsElementName: ".logmod__tabs li",
        tabElementName: ".logmod__tab",
        inputElementsName: ".logmod__form .input",
        hidePasswordName: ".hide-password",

        inputElements: null,
        tabsElement: null,
        tabElement: null,
        hidePassword: null,

        activeTab: null,
        tabSelection: 0, // 0 - first, 1 - second

        findElements: function() {
            var base = this;

            base.tabsElement = $(base.tabsElementName);
            base.tabElement = $(base.tabElementName);
            base.inputElements = $(base.inputElementsName);
            base.hidePassword = $(base.hidePasswordName);

            return base;
        },

        setState: function(state) {
            var base = this,
                elem = null;

            if (!state) {
                state = 0;
            }

            if (base.tabsElement) {
                elem = $(base.tabsElement[state]);
                elem.addClass("current");
                $("." + elem.attr("data-tabtar")).addClass("show");
            }

            return base;
        },

        getActiveTab: function() {
            var base = this;

            base.tabsElement.each(function(i, el) {
                if ($(el).hasClass("current")) {
                    base.activeTab = $(el);
                }
            });

            return base;
        },

        addClickEvents: function() {
            var base = this;

            base.hidePassword.on("click", function(e) {
                var $this = $(this),
                    $pwInput = $this.prev("input");

                if ($pwInput.attr("type") == "password") {
                    $pwInput.attr("type", "text");
                    $this.text("Hide");
                } else {
                    $pwInput.attr("type", "password");
                    $this.text("Show");
                }
            });

            base.tabsElement.on("click", function(e) {
                var targetTab = $(this).attr("data-tabtar");

                e.preventDefault();
                base.activeTab.removeClass("current");
                base.activeTab = $(this);
                base.activeTab.addClass("current");

                base.tabElement.each(function(i, el) {
                    el = $(el);
                    el.removeClass("show");
                    if (el.hasClass(targetTab)) {
                        el.addClass("show");
                    }
                });
            });

            base.inputElements.find("label").on("click", function(e) {
                var $this = $(this),
                    $input = $this.next("input");

                $input.focus();
            });

            return base;
        },

        initialize: function() {
            var base = this;

            base.findElements().setState().getActiveTab().addClickEvents();
        }
    };

    LoginModalController.initialize();

//js botao ir pro topo
    $( window ).scroll(function() {
        var topo = $('#toTop');
        if($(window).scrollTop() > 700){
            topo.removeClass('hide');

        } else {

            topo.addClass('hide');
        }

    });

    $('#toTop').click(function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 1000);
    });


    $('.dropdown-toggle').dropdown();

    /*$("#campotexto").keyup(search()); */

//salvar denuncia


    $("#denunciaForm").submit(function( event ) {
        event.preventDefault();
        var formDenuncia = $('#denunciaForm');
        var $form = $( this ),
            data = $form.serialize(),
            url = "/form-denuncia";

        var posting = $.post( url, { formData: data } );

        posting.done(function( data ) {
            if(data.fail) {
                $.each(data.errors, function( index, value ) {
                    $('.text-error').show('fast');
                });
                $('#successMessage').empty();
            }
            if(data.success) {

                formDenuncia.empty();
                $('.text').empty();
                $('.modal-footer').hide();
                $('.tab-content>.tab-pane').css('display','block');
            } //success
        }); //done
    });

    $( "#emailAmigo" ).submit(function( event ) {
        var formAmigo = $('#emailAmigo');
        event.preventDefault();
        var $form = $( this ),
            data = $form.serialize(),
            url = "/form-amigo";

        var posting = $.post( url, { formData: data } );

        posting.done(function( data ) {
            if(data.fail) {

                $.each(data.errors, function( index, value ) {
                    $('text-error').show('fast');
                });
                $('#successMessage').empty();
            }
            if(data.success) {
                formAmigo.empty();
                $('.hide-body').empty();
                $('#divSucessoAmigo').css('display','block');
            } //success
        }); //done
    });
    $("#emailAnuncio").submit(function( event ) {
        var formAnuncio = $('#emailAnuncio');
        event.preventDefault();
        var $form = $( this ),
            data = $form.serialize(),
            url = "/form-message";

        var posting = $.post( url, { formData: data } );
        posting.done(function( data ) {
            if(data.fail) {
                $.each(data.errors, function( index, value ) {
                    $('text-error').show('fast');
                });
                $('#successMessage').empty();
            }
            if(data.success) {

                formAnuncio.empty();

                $('#divSucessoAnuncio').css('display','block');
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

    /* FIM CONTADOR */




//$('ul.pagination').hide();

    /*(function(){
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
     },function(arrayOfNewElems){
     //callback
     $("img.lazy").lazyload({
     effect: "fadeIn",

     });
     });
     })(); */

    $("img.lazy").lazyload({
        effect: "fadeIn",

    });

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
                    if(n > 24){
                        alert('Número de upload no máximo 4');
                        return false;

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
        $('#propriedade1').empty();
        $('#listCaract').empty();
        $('#divVeiculo').removeClass('show').addClass('hide');
        $('#divSubCategory').show('fast');
        $('#divAdvertSubcategory').hide('fast');
        $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $('#subcategory').append('<option value="" >Seleciona uma opção...</option>');
            $.each(data, function(index, subcatObj){

                $('#subcategory').append('<option value="'+subcatObj.id+'" id="'+subcatObj.id+'" >'+subcatObj.name+'</option>');

            });

        });

    });
    $('#subcategory').on('change',function(e){

        var adv_id = e.target.value;

        if(adv_id < 5) {

            $('#veiculos').empty();
            $('#divVeiculo').addClass('show');

            $('#divAdvertSubcategory').hide('fast');
            $.ajax({
                type: "GET",
                url: "get-marcatotal",
                data: "marca",

                beforeSend: function () {

                    $("#veiculos").append('<option value="" selected="selected">Selecione uma opção...</option>');


                },
                success: function (data) {
                    if (data.length > 0) {


                        for (i = 0; i < data.length; i++) {

                            $("#veiculos").append('<option id='+data[i].codigo_marca+' value=' + data[i].marca + '>' + data[i].marca + '</option>');
                        }
                    } else {

                        $("#veiculos").append("<option value=''>Nada foi encontrado</option>");
                    }

                },
                error: function () {

                }
            });
        }
        $('#divAdvertSubcategory').hide('fast');
        $.get('/ajax-advcat?adv_id=' + adv_id, function(data){


            var caractList = $('#listCaract');
            var html = '<div class="btn-group" data-toggle="buttons">';
            for(var j = 0, lenj = data.length;j<lenj;j++){

                html+= '<label class="btn btn-default btcaract mt10" style="width: 204px;margin-left: 47px;"><input type="checkbox" aria-required="false" class="material_checkbox" name="caracteristicas[]" value="'+data[j].id+'">'+data[j].name+'</label>'
            }
            html+='</div>';
            caractList.html(html);

        });

    });

    $('#veiculos').on('change',function(e){
        var marca_id = $(this).find('option:selected').attr('id');
        $('#modelo').empty();
        $('#tipo').hide('fast');

        $.get('/get-marca?marca_id=' + marca_id, function(data){
            //$('#subcategory').empty();

            $.each(data, function(index, modelObj){
                $('#modelo').append('<option id="'+modelObj.codigo_modelo+'" value="'+modelObj.modelo+'" >'+modelObj.modelo+'</option>');

            });

        });
    });
    $('#modelo').on('change',function(e){
        var modelo_id = $(this).find('option:selected').attr('id');

        $('#tipo').empty();
        $.get('/get-modelo?modelo_id=' + modelo_id, function(data){
            $.each(data, function(index, anoObj){

                $('#tipo').append('<option value="'+anoObj.ano+'" >'+anoObj.ano+'</option>');

            });
            $('#tipo').show('fast');


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

                    $('#rua').val('').removeAttr('readonly').focus();

                    $('#bairro').val('').removeAttr('readonly');
                    $('#cidade').val(data.cidade);
                    $('#estado').val(data.estado);
                    $('.localizacao').removeClass('hide').addClass('shows');
                }
            }
        });
        return false;
    });

//buscar cidade
    $('#location').on('keyup',function(e){
        var minLetras = 4;
        var textoPesquisa = $('#location').val();
        var listaCidade = $("#listaCidades");
        if(textoPesquisa.length == 0){
            $('#bairro').val('');
            $('#bairro').attr('readonly', true);
        }
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
    $('#bairro').on('keyup',function(e){
        var minLetras = 4;
        var textoPesquisa = $('#bairro').val();
        var listaBairro = $("#listaBairros");
        if(textoPesquisa.length >= minLetras ) {
            listaBairro.show('fast');
            $.get('/search-bairro/' + this.value , function (data) {

                $('#listaBairros').html('');
                $.each(data, function (index, cities) {

                    $('#listaBairros').append('<li><a value="' + cities.bairro + '">' + cities.bairro + '</a></li>');
                    $('#listaBairros li a').on('click',function(){
                        var locationElem = $('#bairro');
                        var valorCampo = $(this).attr('value');
                        locationElem.val(valorCampo);
                        locationElem.attr('value',valorCampo);
                        locationElem.focus();
                    });
                });

            });
            if(listaBairro.is(":visible")){
                $('body').on('click',function(){
                    listaBairro.fadeOut();
                });
            }
        }else{
            listaBairro.hide();
            listaBairro.html('');
        }
    });
//js area pesquisar


    var btnPesquisar = $('#btn-pesquisa');
    var menuLateral = $('#nav-lateral');
    btnPesquisar.click(function(){
        menuLateral.addClass('na-lef-pos');

    });

    $('#btn-close-nav').on('click', function () {

        menuLateral.removeClass('na-lef-pos');
    });

//menu lateral fixo
    $(function(){

        var jElement = $('.propaganda');

        $(window).scroll(function(){
            if ( $(this).scrollTop() > 1000 ){
                jElement.css({
                    'position':'fixed',
                    'top':'80px',
                    'width':'195px',
                    'z-index': '9999'
                });
            }else{
                jElement.css({
                    'position':'relative',
                    'top':'auto'
                });
            }
        });

    });
//comando lightbox

    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
//lazyload

    $(window).scroll(function(){
        if ($(this).scrollTop() > 300){
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

        }

    });
//Jquery anuncio destaque

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

//anuncie html

    $('#propriedade1').empty();

    $("#subcategory").livequery(function(){

        $(this).on('change', function (e) {
            var sub_id = e.target.value;
            $('#propriedade1').empty();

            //if verifica qual subcategoria foi escolhida

            if(sub_id == 10 || sub_id == 20 || sub_id == 60 || sub_id == 70 || sub_id == 80 || sub_id == 107 || sub_id == 108 || sub_id == 112 || sub_id == 113 || sub_id == 105 || sub_id == 107) {

                $('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback"> ' +
                    '<label>Número de quartos *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="numero_quarto"> ' +
                    '<option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option><option value="2">2</option><option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option>' +
                    '</select><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div> </div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Vagas de garagem *</label> <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem"> <option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option><option value="5">5 ou mais</option> </select> <span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div> </div> </div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"> <label>Quantos Banheiros *</label> <select required data-error="Seleciona uma opção" class="form-control" name="numero_banheiro"> <option value="">Escolher</option><option value="0">Nenhum</option> <option value="1">1</option><option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option></select> <span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div><div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Área Construída: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida"><div class="input-group-addon">m²</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Condomínio: *</label><div class="input-group"><div class="input-group-addon">R$</div><input class="form-control" maxlength="10" onkeypress="mascaraCampo(this,mvalor)"  data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text"  name="valor_condominio" id="valor_condominio"></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>IPTU: *</label><div class="input-group"><div class="input-group-addon">R$</div><input  class="form-control" maxlength="7" onkeypress="mascaraCampo(this,mvalor)" data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text"  name="valor_iptu" id="valor_iptu"></div><span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div></div></div></div>').appendTo('#propriedade1');
            }else if(sub_id == 30){
                $('<div class="row"><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Vagas de garagem *</label> <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem"> <option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option><option value="5">5 ou mais</option> </select> <span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div> </div> </div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Área Construída: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida"><div class="input-group-addon">m²</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Condomínio: *</label><div class="input-group"><div class="input-group-addon">R$</div><input class="form-control" maxlength="10" onkeypress="mascaraCampo(this,mvalor)"  data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text"  name="valor_condominio" id="valor_condominio"></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>IPTU: *</label><div class="input-group"><div class="input-group-addon">R$</div><input class="form-control" maxlength="7" onkeypress="mascaraCampo(this,mvalor)" data-error="Campo não pode ser vazio" placeholder="Ex.: 150" type="text" id="valor_iptu" name="valor_iptu"></div><span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div></div></div></div>').appendTo('#propriedade1');
            }else if(sub_id == 90 || sub_id == 50 || sub_id == 40){


                $('<div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback"> ' +
                    '<label>Número de quartos *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="numero_quarto"> ' +
                    '<option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option><option value="2">2</option><option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option>' +
                    '</select><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div> </div><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"><label>Vagas de garagem *</label> <select required data-error="Seleciona uma opção" required="required" class="form-control" name="numero_garagem"> <option value="">Escolher</option><option value="0">Nenhum</option><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option><option value="5">5 ou mais</option> </select> <span class="form-control-feedback" aria-hidden="true"></span> <div class="help-block with-errors"></div> </div> </div> <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"><div class="form-group has-feedback"> <label>Banheiros *</label> <select required data-error="Seleciona uma opção" class="form-control" name="numero_banheiro"> <option value="">Escolher</option><option value="0">Nenhum</option> <option value="1">1</option><option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5 ou mais</option></select> <span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div><div class="row"><div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Acomodações: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="2" required placeholder="Ex.: 99" type="text" data-error="Campo não pode ser vazio"  name="acomodacoes"></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div><div class="col-md-3 col-lg-3 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Área Construída: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="area_construida"><div class="input-group-addon">m²</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div>').appendTo('#propriedade1');

            }else if(sub_id == 1 || sub_id == 2 || sub_id == 3){

                $('<div class="row">' +
                    '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback"> ' +
                    '<label>Cor: *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="cor"> ' +
                    '<option value="">Escolher</option>' +
                    '<option value="indefinida">Indefinida</option>' +
                    '<option value="Amarelo">Amarelo</option>' +
                    '<option value="Azul">Azul</option>' +
                    '<option value="Bege">Bege</option> ' +
                    '<option value="Branco">Branco</option>' +
                    ' <option value="Bronze">Bronze</option>' +
                    '<option value="Cinza">Cinza</option><option value="Dourado">Dourado</option><option value="Laranja">Laranja</option><option value="Marrom">Marrom</option><option value="Prata">Prata</option><option value="Preto">Preto</option><option value="Rosa">Rosa</option><option value="Roxo">Roxo</option><option value="Verde">Verde</option><option value="Vermelho">Vermelho</option><option value="Vinho">Vinho</option>' +
                    '</select></div></div>' +
                    '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> ' +
                    '<div class="form-group has-feedback"> ' +
                    '<label>Placa: *</label> ' +
                    ' <input class="form-control" maxlength="1" required placeholder="Apenas o último dígito" type="text" data-error="Campo não pode ser vazio"  name="placa">' +
                    '<span class="form-control-feedback" aria-hidden="true"></span>' +
                    '<div class="help-block with-errors"></div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12"> <div class="form-group has-feedback"> <label>Quilometragem: *</label> <div class="input-group"> <input class="form-control" onkeypress="mascaraCampo(this, mascSoNumeros)" maxlength="7" required placeholder="Ex.: 150" type="text" data-error="Campo não pode ser vazio"  name="km"><div class="input-group-addon">KM</div></div><span class="form-control-feedback" aria-hidden="true"></span><div class="help-block with-errors"></div></div></div></div>' +
                    '<div class="row">' +
                    '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback">' +
                    '<label>Tipo de Combustível: *</label>' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="combustivel">' +
                    '<option value="">Escolher</option><option value="Gasolina">Gasolina</option><option value="Álcool">Álcool</option><option value="Diesel">Diesel</option><option value="Gás Natural">Gás Natural</option><option value="Flex">Flex</option><option value="Gasolina e Gás Natural">Gasolina e Gás Natural</option><option value="Álcool e Gás Natural">Álcool e Gás Natural</option><option value="Álcool e Gás Natural">Gasolina, Álcool e Gás Natural</option><option value="Gasolina, Álcool, Gás Natural e Benzina">Gasolina, Álcool, Gás Natural e Benzina</option><option value="Gasolina e Elétrico">Gasolina e Elétricol</option></select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback">' +
                    '<label>Portas: *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="portas">' +
                    '<option value="">Escolher</option><option value="0">0</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div></div>' +
                    '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">' +
                    '<div class="form-group has-feedback">' +
                    '<label>Câmbio: *</label> ' +
                    '<select class="form-control" required data-error="Seleciona uma opção" required="required" name="cambio">' +
                    '<option value="">Escolher</option><option value="Automático">Automático</option><option value="Manual">Manual</option></select></div></div></div></div></div>').appendTo('#propriedade1');

            }
        });
    });

});







