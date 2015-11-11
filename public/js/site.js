$(document).ready(function(){

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

    //js slider imovel


    //js mudança do campo select
    $('#uf').ufs({
        onChange: function(uf){
            $('#cidade').cidades({uf: uf});
            $('#cidade').show('fast');
        }
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



    //js anuncie

    $('.openCategoriaImoveis').click(function(){

        $('.categoria-imoveis').css('display','block');
        $('.openCategoriaImoveis').addClass('selected-menu') ;
    });


    $('.subCategoriaAp').click(function(){

        $('.subcategoria-imoveis').css('display','block');
        $('.openCategoriaImoveis').addClass('selected-menu') ;
    });


    $('.openCategoriaVeiculos').click(function(event){event.preventDefault();
        $('.categoria-imoveis').css('display','block');
        $('.openCategoriaVeiculos').addClass('selected-menu');

    });



    //js página imoveis barra fixa pesquisar

    var offset = $('#barra-fixa-menu').offset().top;
    var meuMenu = $('#barra-fixa-menu');

    $(document).on('scroll', function () {
        if (offset <= $(window).scrollTop()) {
            meuMenu.addClass('fixar');

        } else {
            meuMenu.removeClass('fixar');

        }
    });



});


