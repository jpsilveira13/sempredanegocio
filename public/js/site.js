$(document).ready(function(){


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
                        "<li>" +
                        "<div class='image-anuncio'>" +
                        "<span></span>" +
                        "<img width=\"80\" height=\"38\" src=\"" + e.target.result + "\">" +
                        "</div>" +
                        "</li>";
                    $('#photos_clearing').append(image_html);
                    if ($('.pics-label.hide').length !== 0) {
                        $('.pics-label').toggle('hide').removeClass('hide');
                    }
                    return $(document).foundation('orbit','reflow');
                };
                reader.readAsDataURL(file);
            }
            window.post_files = input.files;
            if (window.post_files !== void 0) {
                return input.files = $.merge(window.post_files, input.files);
            }
        }
    };

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


    $('#category_id').on('change',function(e){

        var cat_id = e.target.value;

        $('#divSubCategory').show('fast');
        $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){

                $('#subcategory').append('<option value="'+subcatObj.id+'" id="'+subcatObj.id+'" >'+subcatObj.name+'</option>');
            });

        });

    });

    $('#subcategory').on('change',function(e){
        var adv_id = e.target.value;

        $('#divAdvertSubcategory').show('fast');
        $.get('/ajax-advcat?adv_id=' + adv_id, function(data){
            $('#advertcategory').empty();
            $.each(data, function(index, advCatObj){

                $('#advertcategory').append('<option value="'+advCatObj.id+'" id="'+advCatObj.id+'" >'+advCatObj.name+'</option>');
            });

        });

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

        var id = $(this).attr('id');
        $('#categoria').attr('value', id);
        if($('.categoria-imoveis').hasClass('hide')){
            $('.categoria-imoveis').removeClass('hide').addClass('show');

        }else{
            $('.categoria-imoveis').removeClass('show');
            $('.categoria-imoveis').addClass('hide');

        }
        //Apagando valores do input
        $('#apartmento_type').attr('value','');
        $('#casa_type').attr('value','');
        $('#terreno_type').attr('value','');
        $('#temporada_type').attr('value','');
        $('#subcategoria').attr('value', '');
        $('#pecas_type').attr('value', '');

        //removendo o efeito da categoria principal
        $('.openCategoriaImoveis').addClass('selected-menu');
        $('.openCategoriaVeiculos').removeClass('selected-menu');
    });

    $('.openCategoriaVeiculos').click(function(){

        var id = $(this).attr('id');
        $('#categoria').attr('value', id);
        if($('.categoria-veiculos').hasClass('hide')){
            $('.categoria-veiculos').removeClass('hide').addClass('show');

        }else{
            $('.categoria-veiculos').removeClass('show');
            $('.categoria-veiculos').addClass('hide');

        }
        //Cria o evento de sumir as subcategorias dos imoveis
        if($('.categoria-imoveis').hasClass('show')){
            $('.categoria-imoveis').removeClass('show').addClass('hide');

        }
        if($('.subcategoria-ap').hasClass('show')){

            $('.subcategoria-ap').removeClass('show').addClass('hide');

        }
        if($('.subcategoria-cs').hasClass('show')){

            $('.subcategoria-cs').removeClass('show').addClass('hide');

        }
        if($('.subcategoria-temp ').hasClass('show')){

            $('.subcategoria-temp ').removeClass('show').addClass('hide');

        }
        if($('.subcategoria-tr ').hasClass('show')){

            $('.subcategoria-tr ').removeClass('show').addClass('hide');

        }

        if($('.subcategoria-lancamentos ').hasClass('show')){

            $('.subcategoria-lancamentos ').removeClass('show').addClass('hide');

        }


        //Apagando valores do input
        $('#apartmento_type').attr('value','');
        $('#casa_type').attr('value','');
        $('#terreno_type').attr('value','');
        $('#temporada_type').attr('value','');
        $('#subcategoria').attr('value', '');


        //removendo o efeito da categoria principal
        $('.openCategoriaVeiculos').addClass('selected-menu');
        $('.openCategoriaImoveis').removeClass('selected-menu');


    });

    $('.subcategoria-car .item').click(function(){
        var id = $(this).attr('id');
        $('#subcategoria').attr('value', id);
        $('#pecas_type').attr('value','');


        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.subcategoria-car ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');

        }

        if($(this).hasClass('categoria-ap')){
            $('.subcategoria-ap').addClass('show').removeClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show'.addClass('hide'));
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');

        }else if($(this).hasClass('categoria-cs')){
            $('.subcategoria-cs').addClass('show').removeClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');
        } else if($(this).hasClass('categoria-al')){
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('#apartamento_type').attr('value','');
            $('#casa_type').attr('value','');
            $('#terreno_type').attr('value','');
            $('#temporada_type').attr('value','');
        }else if($(this).hasClass('categoria-tr')){
            $('.subcategoria-tr').addClass('show').removeClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');

        }else if($(this).hasClass('categoria-lj')) {
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-al').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show');
            $('#apartamento_type').attr('value','');
            $('#casa_type').attr('value','');
            $('#terreno_type').attr('value','');
            $('#temporada_type').attr('value','');

        }else if($(this).hasClass('categoria-temp')){
            $('.subcategoria-temp').addClass('show').removeClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show');
        }else if($(this).hasClass('categoria-lancamentos')) {

            $('.subcategoria-lancamentos').addClass('show').removeClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');

        }
    });

    $('.categoria-imoveis .item').click(function(){
        var id = $(this).attr('id');
        $('#subcategoria').attr('value', id);
        $('#apartamento_type').attr('value','');
        $('#casa_type').attr('value','');
        $('#terreno_type').attr('value','');
        $('#temporada_type').attr('value','');

        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.categoria-imoveis ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');

        }

        if($(this).hasClass('categoria-ap')){
            $('.subcategoria-ap').addClass('show').removeClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show'.addClass('hide'));
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');

        }else if($(this).hasClass('categoria-cs')){
            $('.subcategoria-cs').addClass('show').removeClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');
        } else if($(this).hasClass('categoria-al')){
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('#apartamento_type').attr('value','');
            $('#casa_type').attr('value','');
            $('#terreno_type').attr('value','');
            $('#temporada_type').attr('value','');
        }else if($(this).hasClass('categoria-tr')){
            $('.subcategoria-tr').addClass('show').removeClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show').addClass('hide');

        }else if($(this).hasClass('categoria-lj')) {
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');
            $('.subcategoria-al').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show');
            $('#apartamento_type').attr('value','');
            $('#casa_type').attr('value','');
            $('#terreno_type').attr('value','');
            $('#temporada_type').attr('value','');

        }else if($(this).hasClass('categoria-temp')){
            $('.subcategoria-temp').addClass('show').removeClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-lancamentos').removeClass('show');
        }else if($(this).hasClass('categoria-lancamentos')) {

            $('.subcategoria-lancamentos').addClass('show').removeClass('hide');
            $('.subcategoria-ap').removeClass('show').addClass('hide');
            $('.subcategoria-cs').removeClass('show').addClass('hide');
            $('.subcategoria-tr').removeClass('show').addClass('hide');
            $('.subcategoria-temp').removeClass('show').addClass('hide');

        }
    });

    $('.subcategoria-ap .item').click(function(){
        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.subcategoria-ap ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');
        }

        var id = $(this).attr('id');
        $('#apartamento_type').attr('value',id);

    });
    $('.subcategoria-cs .item').click(function(){
        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.subcategoria-cs ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');
        }

        var id = $(this).attr('id');
        $('#casa_type').attr('value',id);

    });
    $('.subcategoria-tr .item').click(function(){
        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.subcategoria-tr ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');
        }

        var id = $(this).attr('id');
        $('#terreno_type').attr('value',id);

    });
    $('.subcategoria-temp .item').click(function(){
        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.subcategoria-temp ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');
        }

        var id = $(this).attr('id');
        $('#temporada_type').attr('value',id);

    });
    $('.subcategoria-lancamentos .item').click(function(){
        if ( $(this).hasClass('selected-menu') ) {
            $(this).removeClass('selected-menu');
        } else {
            $('.subcategoria-lancamentos ul li.selected-menu').removeClass('selected-menu');
            $(this).addClass('selected-menu');
        }

        var id = $(this).attr('id');
        $('#lancamento_type').attr('value',id);

    });

//js página imoveis barra fixa pesquisar



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

    $('#sortable').sortable();
    $('#sortable').disableSelection();

    //sortable events
    $('#sortable').on('sortbeforestop',function(event){

        reorderImages();

    });




});







