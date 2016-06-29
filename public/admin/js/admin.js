$(document).ready(function () {
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
});