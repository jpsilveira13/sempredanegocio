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
    })

    $('.removerImage').on('click', function () {
        var id = $(this).data('id');
        var url = '/apagar-imagem';
        console.log(url);
        $.get(url, {'id':id}, function(data)
        {
            console.log(data);
           console.log('deu certo');

        });

    })
});