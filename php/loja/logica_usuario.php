<?php 	

session_start();

	function usuarioEstaLogado(){
		return isset($_SESSION["usuario_logado"]);
	}
	
	function verificaUsuario(){
		if(!usuarioEstaLogado()){
			$_SESSION["danger"] = "Usuário não logado";
			header("Location: index.php?falhadeseguranca=true");
			die();
		}
	}
	
	function usuarioLogado(){
		return $_SESSION["usuario_logado"];
	
	}

	function logaUsuario($email){
		#setcookie("usuario_logado", $email, time() + 360);
		$_SESSION["usuario_logado"]=$email;
		
	}
	
	function logout(){
		#unset $_SESSION["usuario_logado"]
		session_destroy();
		session_start();
	}
	
?>