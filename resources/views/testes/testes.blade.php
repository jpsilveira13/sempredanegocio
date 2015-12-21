@extends('site.layout')

@section('content')


    <input type="text" id="testando"value="">
    <br />
   <ul id="teste">
       <li><a value="teste">Testando</a></li>
       <li><a value="teste2">Testando2</a></li>
       <li><a value="teste3">Testando3</a></li>
       <li><a value="teste4">Testando4</a></li>
       <li><a value="teste5">Testand5</a></li>
   </ul>


    <script>
        alert('teste123');
        $('#teste li a').click(function () {
            var locationElemTeste = $('#testando');
            var valorCampoTeste = $(this).attr('value');
            locationElemTeste.val(valorCampoTeste);
            locationElemTeste.attr('value',valorCampoTeste);
            locationElemTeste.focus();
        });
    </script>
@endsection