<html>
<style type="text/css">
    .css_btn_class {
        font-size:16px;
        font-family:Arial;
        font-weight:bold;
        -moz-border-radius:8px;
        -webkit-border-radius:8px;
        border-radius:8px;
        border:1px solid #337fed;
        padding:9px 18px;
        text-decoration:none;
        background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
        background:-ms-linear-gradient( top, #3d94f6 5%, #1e62d0 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
        background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #3d94f6), color-stop(100%, #1e62d0) );
        background-color:#3d94f6;
        color:#ffffff;
        display:inline-block;
        text-shadow:1px 1px 0px #1570cd;
        -webkit-box-shadow:inset 1px 1px 0px 0px #97c4fe;
        -moz-box-shadow:inset 1px 1px 0px 0px #97c4fe;
        box-shadow:inset 1px 1px 0px 0px #97c4fe;
    }.css_btn_class:hover {
         background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
         background:-ms-linear-gradient( top, #1e62d0 5%, #3d94f6 100% );
         filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
         background:-webkit-gradient( linear, left top, left bottom, color-stop(5%, #1e62d0), color-stop(100%, #3d94f6) );
         background-color:#1e62d0;
     }.css_btn_class:active {
          position:relative;
          top:1px;
      }

</style>
<body>

<a class="navbar-brand" target="_blank" href="{{ url() }}"><img src="http://www.sempredanegocio.com.br/images/logo312x33.png" title="Sempre da Negócio" width="250px"></a>

<h2>Olá, recebemos sua solicitação de recuperação de senha.</h2>

<p>Para realizar o procedimento solicitado é necessário realizar o acesso em nosso site e preencher os campos solicitados.</p>

<p>Para completar sua solicitação clique no botão a seguir:</p>

<center><a href="{{ url('password/reset/'.$token) }}" class="css_btn_class">Criar uma nova senha</a></center>
<br>
<p> Desejamos bons negócios e muito sucesso,</p>
<p>Equipe Técnica Sempredanegocio.com.br<br>
    <a href="mailto:suporte@sempredanegocio.com.br"> suporte@sempredanegocio.com.br</a>
</p>

</body>
</html>