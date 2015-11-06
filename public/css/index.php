<?php 
session_start();



$app_data = $_GET[app_data];


if($app_data == "clear"){ 
	session_destroy();
	 header("Location: index.php");
}


if($app_data != "clear" && trim($app_data) != ""){
	session_destroy();
	//se tiver um código de um teste, direciona o usuário para a página de resultados
	header("Location: resultado.php?app_data=".$app_data );
}
if($_SESSION[QUEST_ID] != "")
	header("Location: resultado.php");

 
 ?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Roda da Vida</title>



<style>
*{
	padding:0px;
	margin:0px;
}

body{
	background:url(images/bg.jpg) repeat-x top center;
	text-align:center;
}

.container{
	width:800px;
	margin:auto;
	
}
</style>


</head>

<body> 

<div align="center" class="container">
<img src="images/bg-1.jpg" width="80%" border="0" usemap="#Map">
<map name="Map"> 
  <area shape="rect" coords="220,507,483,555" href="roda-da-vida.php" target="_self">
</map>
</div>



</div>



</body>
</html>
