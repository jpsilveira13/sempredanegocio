$(document).ready(function(){

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
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    $('#nav-wrapper').height($("#nav").height());
    $('.nav').affix({offset: {top: 260} });
    $('.nav').on('affixed-top.bs.affix', function(){

    });

});