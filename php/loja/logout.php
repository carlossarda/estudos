 <?php
 require_once("logica_usuario.php");
 	
 	if($_SESSION!=null){
	logout();
	$_SESSION["success"] = "Deslogado com sucesso.";
	#header("Location: index.php?logout=true");
	header("Location: index.php");
	die();
 		
 	}else{
 		$_SESSION["danger"] = "Você não está logado.";
 		header("Location: index.php");
 		die();
 	}