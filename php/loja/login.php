 <?php 

 require_once ("conecta.php");
 #include("conecta.php"); passado para o banco_*
 // require_once ("banco_usuario.php");
 require_once ("logica_usuario.php");
 require_once ("class/UsuarioDao.php");
 
 $usuarioDao = new UsuarioDao($conexao);

 $usuario = $usuarioDao->buscaUsuario($_POST["email"],$_POST["senha"]);
 
 #var_dump ($usuario);
 
 if($usuario == null){
	$_SESSION["danger"] = "Usuário ou senha inválido"; 
	#header("Location: index.php?login=0");
	header("Location: index.php");
	 
} else {
	 
	logaUsuario($usuario["email"]);
	// $_SESSION["success"] = "Usuário logado com sucesso"; 
	#header("Location: index.php?login=1");
	header("Location: index.php");
	 
 }
 die();