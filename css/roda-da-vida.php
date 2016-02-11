<?php 
session_start();

require_once("conexao.php");


 ?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Roda da Vida</title>

<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/league-gothic.font.js" type="text/javascript"></script>
<script src="js/cufon-ativar.js" type="text/javascript"></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />


<style>

.dados{
	width:100%;
	height:80px; 
}


.dados .label{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	width:130px !important;
	padding-top:10px;
	
	float:left;
	font-weight:bold;
}
.dados input{
	float:left;
	width:300px;
	padding:5px;
	margin-bottom:10px;
}
.dados 
</style>

</head>

<body style="margin:0px; padding:0px;">
<div class="container">

<form name="frmConteudo" id="frmConteudo" target="_self" method="post">

<div id="content">
	<div class="header"></div>
    <div class="content">
	
    <div class="dados">
    	<div class="label">Insira seu nome</div>
        	<input type="text" name="txtNome" id="txtNome" class="campo">
       	<br class="clear">
        	<div class="label"> Insira seu e-mail</div>
        	<input type="text" name="txtEmail" id="txtEmail" class="campo">
    	
    </div>
    	<br class="clear">
    
    <?php
	

$conexao = conexao();
$totalPerguntas="";

$total=0;

$con = mysql_query("SELECT COUNT(GRUPO_ID) AS TOTAL FROM TBL_GRUPO",$conexao);
if($are = mysql_fetch_object($con)){
	$total = $are->TOTAL;
	//$total++;
}
$contArea=0;
$contEtapa=0;
$con = mysql_query("SELECT * FROM TBL_AREA ORDER BY AREA_ORDEM",$conexao);
while($are = mysql_fetch_object($con)){
//listar todas as áreas	
	
	echo "<div class=' area area-".$are->AREA_ID."'>";
	
	$contArea++;
	
	
	$contGrupo=0;
	$con2 = mysql_query("SELECT * FROM TBL_GRUPO WHERE AREA_ID='".$are->AREA_ID."' ORDER BY GRUPO_ORDEM", $conexao);
	while($gru = mysql_fetch_object($con2)){
	
		$contGrupo++;
		$contEtapa++;
	
		if($contEtapa > 1)
			$classAdici="hidden";
		else
			$classAdici="";
		echo"
		
		<div class='".$classAdici."' id='grupo-".$contEtapa."'>";
	
		echo "<div class='subbloco'><h2 class='league'>".utf8_encode(stripslashes($are->AREA_DESCRICAO))."</h2></div>";
		
		echo"<div class='subbloco-right'>
			<span class='nome league'>".$user_profile["name"]."</span><br>
<span class='etapa league'>ETAPA ".$contEtapa." de ".$total."</span>
		</div>";
		
		echo"<br class='clear'>";
		
		echo "<div class='subbloco-grupo' id='etapa-".$contArea."'><h3 class='title-".$contGrupo." league'>".utf8_encode(stripslashes($gru->GRUPO_DESCRICAO))."</h3>";
		
		
		$con3 = mysql_query("SELECT * FROM TBL_PERGUNTA WHERE GRUPO_ID='".$gru->GRUPO_ID."' ORDER BY PERGUNTA_ORDEM", $conexao);
		while($per = mysql_fetch_object($con3)){
			
			$totalPerguntas++;
			
			echo "<div class='quest etapa-".$contArea." league'><span>".utf8_encode(stripslashes($per->PERGUNTA_DESCRICAO))."</span><br>";
			echo"<img src='images/pergunta/pergunta-".$per->PERGUNTA_ID.".png' width='90%'>";
			echo"</div><br>
";
			echo"<div id='respostas-".$per->PERGUNTA_ID."' class=' league pb10 pl30'>
";
		
			for($i=1; $i<=10; $i++){
				//if($i == 7) $check="checked='checked'"; else $check="";
				echo "<div class='nota nota-".$i."'><label><input type='radio' class='radio' name='rdbP-".$per->PERGUNTA_ID."' id='rdbP-".$per->PERGUNTA_ID."' value='".$i."'><br>".$i."</label></div>
";	
			} 
			
			//echo"<br class='clear'>";
			echo"</div>";
			echo"<div class='hidden league escolhida' id='escolhido-".$per->PERGUNTA_ID."'></div>
";
			
			echo"<br>";
			
			
		}
		echo"<h2 class='league' style='text-align:right; color:red; font-size:18px;'>* Você só irá para a próxima etapa após responder todas as questões desta tela.</h2>";
		echo "</div> </div> 
		";
		
	}
	echo "</div>
	 ";
	
}


	$contEtapa++;
	
	echo"<div class='hidden' id='grupo-".$contEtapa."'>";
	
	echo "<div class='subbloco'><h2 class='league'>RESULTADO</h2></div>";
	
	echo"<div class='subbloco-right'>
		<span class='nome league'>".$user_profile["name"]."</span><br> 
	</div>
	
	<br class='clear'><br class='clear'><br class='clear'><br class='clear'>
	";
	
	echo"<div align='center'>
		
    	<a id=\"btnConluir\"><img src='images/btn-final.png'></a>

		
	
	</div>";
	
	echo " </div> ";
	
	?>
    <input type="hidden" name="total" id="total" value="<?=$totalPerguntas;?>" >
    <input type="hidden" name="efetuado" id="efetuado" >
	
	</div>
    <div class="footer"></div>
</div>


</form>

    
    </div>
    
</body>

	
<script>

function voltar(n){
	$("#escolhido-"+n).html("");
	$("#escolhido-"+n).css("display", "none");
	$("#respostas-"+n).fadeIn();
} 

$(document).ready(function() {
	
	
	
	
	$("[type=radio]").bind("click", function (){
	
		
		var str=$(this).attr("id");
		var n=str.substr(5);
		 
		var respostas=0;
		
		$('[type=radio]').each(function() {
			
			if ($(this).attr('checked')){
				respostas++;
			
			}
		});
		$("#efetuado").attr("value",respostas);
		
		for (var i=0;i<<?=$contEtapa;?>;i++)
		{ 
			$("#grupo-"+i).css("display", "none");
		}
		
		
		
		<?php
		$cont=1;
		//echo"TOTAL ".$totalPerguntas;
		for($i=1; $i<=$totalPerguntas;$i++){
			
			$cont++;
			
		echo'if(respostas == '.($i).' || respostas == '.($i+1).')$("#grupo-'.($cont-1).'").show();
		if(respostas == '.($i+2).'){$("#grupo-'.($cont).'").fadeIn(); FB.Canvas.setSize({height: 650, width: 760});}
		
';
			$i=$i+2;
		}
		
		?>
		
	});
	
	
	
	$("#btnConluir").bind("click", function (){
		
		
		if($("#txtNome").val() != "" && $("#txtEmail").val() != ""){
			if(parseInt($("#efetuado").val()) == parseInt($("#total").val())){
				
				var form = document.frmConteudo;
				form.action="resultado.php";
				form.submit();
				
			}else{
				alert("para ver seu teste você deve responder a todas as questões");	
			}
		}else{
				alert("Favor preencher seu nome e e-mail");	
			}
		
		
	});
	
}); 


</script>

</html>
