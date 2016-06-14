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
});