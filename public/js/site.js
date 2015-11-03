$(document).ready(function(){


    $('#uf').ufs({
        onChange: function(uf){
            $('#cidade').cidades({uf: uf});
            $('#cidade').show('fast');
        }
    });
    $('#labelQuarto').mouseover(function(){
       $('#divQuartos').addClass('display-block');
    });

    $('#divQuartos').mouseleave(function(){

       $(this).removeClass('display-block');
    });

    $('#labelFaixaPreco').mouseover(function(){
        $('#divFaixaPreco').addClass('display-block');
    });

    $('#divFaixaPreco').mouseleave(function(){

        $(this).removeClass('display-block');
    });

    $('#labelSuite').mouseover(function(){
        $('#divSuite').addClass('display-block');
    });

    $('#divSuite').mouseleave(function(){

        $(this).removeClass('display-block');
    });

    $('#labelVaga').mouseover(function(){
        $('#divVaga').addClass('display-block');
    });

    $('#divVaga').mouseleave(function(){

        $(this).removeClass('display-block');
    });



 //validação formulario de contato
 /*  $('#contact-form').bootstrapValidator({
  //  live: 'enabled',
  message: 'Esse valor não é válido',
  feedbackIcons: {
  valid: 'glyphicon glyphicon-ok',
  invalid: 'glyphicon glyphicon-remove',
  validating: 'glyphicon glyphicon-refresh'
  },
  fields: {
  nome: {
  validators: {
  notEmpty: {
  message: 'O nome é requirido e não pode ser vazio'
  }
  }
  },
  email: {
  validators: {
  notEmpty: {
  message: 'O endereço de e-mail é obrigatório'
  },
  emailAddress: {
  message: 'O endereço de e-mail não é válido'
  }
  }
  },
  mensagem: {
  validators: {
  notEmpty: {
  message: 'A mensagem é requerida e não pode ser vazia.'
  }
  }
  },
  telefone: {
  validators: {
  notEmpty: {
  message: 'O telefone é requerida e não pode ser vazia.'
  }
  }
  },
  estado: {
  validators: {
  notEmpty: {
  message: 'O estado de origem é requerida e não pode ser vazia.'
  }
  }
  },
  cidade: {
  validators: {
  notEmpty: {
  message: 'A cidade é requerida e não pode ser vazia.'
  }
  }
  }
  }
  }); */

 //js modal evento
 $('#list').click(function(event){event.preventDefault();
  $('#products .item').addClass('list-group-item').removeClass('bloco-item');
 });
 $('#grid').click(function(event){event.preventDefault();
  $('#products .item').removeClass('list-group-item');
  $('#products .item').addClass('grid-group-item, bloco-item');
 });
 $('#nav-wrapper').height($("#nav").height());
 $('.nav').affix({offset: {top: 260} });




});