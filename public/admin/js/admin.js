//funçoes mascaras
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

function mascSoNumeros(v){
    return v.replace(/\D/g,"")
}

function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares

    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var photo_counter = 0;
    Dropzone.options.realDropzone = {

        uploadMultiple: false,
        parallelUploads: 100,
        maxFilesize: 8,
        previewsContainer: '#dropzonePreview',
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        addRemoveLinks: true,
        dictRemoveFile: 'Remover',
        dictFileTooBig: 'Image is bigger than 8MB',

        // The setting up of the dropzone
        init:function() {

            this.on("removedfile", function(file) {
                url = "/admin/anuncios/destroy-image/"+id;
                $.ajax({
                    type: 'POST',
                    url: 'url',
                    data: {id: file.name, _token: $('#csrf-token').val()},
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        if(rep.code == 200)
                        {
                            photo_counter--;
                            $("#photoCounter").text( "(" + photo_counter + ")");
                        }

                    }
                });

            } );
        },
        error: function(file, response) {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },
        success: function(file,done) {
            console.log(file);
            photo_counter++;
            $("#photoCounter").text( "(" + photo_counter + ")");
        }
    }

        // instantiate the uploader

    $('#imoveisSearch').on('click', function () {
        $.get('/get-veiculos', function(data){

            console.log(data);

            $('#tipo-busca').html('');
            $.each(data, function(index, veiculosObj){
                alert('teste')
                console.log(veiculosObj);
                $('#subcategory').append('<option value="'+veiculosObj.id+'" id="'+veiculosObj.id+'" >'+veiculosObj.id+'</option>');
            });

        });
    });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(this).attr('href');

        $(target).css('left','-'+$(window).width()+'px');
        var left = $(target).offset().left;
        $(target).css({left:left}).animate({"left":"0px"}, "10");
    });

    $('.removerImage').on('click', function (e) {

        var id = $(this).data('id');

        swal({
            title: "Você tem certeza?",
            text: "Não tem como recuperar depois de deletado!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, deleta!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm){
            url = "/admin/anuncios/destroy-image/"+id;
            $.ajax({
                url: url,
                type: "GET",
                data: id,
                success: function (msg) {

                    if (msg.status === 'success') {
                        swal("Pronto!", "Sua imagem foi deletada com sucesso!", "success");
                    }
                    $('#imagem'+id).fadeOut(2000);
                }
            });
            }else{
                swal("Cancelado", "Imagem não foi deletada", "error");
            }

        });

    });

    $('.capaImagem').on('click', function (e) {

        var id = $(this).data('id');

        swal({
            title: "Você tem certeza?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, Atualizar!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;

            url = "/admin/anuncios/capa-image/"+id;
            $.ajax({
                url: url,
                type: "GET",
                data: id,
                success: function () {

                        swal("Pronto!", "Capa selecionada!", "success");


                    $('#imagem'+id).css('opacity','1');

                }
            });

        });

    });
});



