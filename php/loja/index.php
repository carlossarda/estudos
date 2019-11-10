<?php 
#usa o require pq se não houver o arquivo da erro, enquanto o include da só um warning.
# require_once se já houver incluido este arquivo, não inclui de novo, na pratica se usa muito o require.
require_once("cabecalho.php");
require_once("logica_usuario.php");	
#include ("mostra_alerta.php");
?>
<?php /* ----------------Substituido pelo uso de sessão

	if(isset($_GET["login"]) && $_GET["login"] == true){ ?>
	
	<p class="alert-success">Logado com sucesso</p>
	
<?php } */?>

<?php /*if(isset($_GET["logout"]) && $_GET["logout"] == true){ ?>
	
	<p class="alert-success">Usuario deslogado.</p>
	
<?php } */?>

<?php /*if(isset($_GET["login"]) && $_GET["login"] == false){ ?>
	
	<p class="alert-danger">Usuario ou senha inválida</p>
	
<?php } */?>



<?php /* ----------------Substituido pela função mostra alerta

	if(isset($_SESSION["success"])){ ?>
	
	<p class="alert-success"><?=$_SESSION["success"] ?></p>
	
<?php 
	unset($_SESSION["success"]); 
	}
?>


<?php if(isset($_SESSION["danger"])){ ?>
	
	<p class="alert-danger"><?=$_SESSION["danger"] ?></p>
	
<?php 
	unset($_SESSION["danger"]); 
	}
*/?>

<?php /* passado para o cabecalho.php
	
	mostraAlerta("success");
	
	mostraAlerta("danger");
	
	*/
?>



	<h1>Bem Vindo</h1>

<?php	

	if (usuarioEstaLogado()){
	
	?>
	<p class="alert-success">Você está logado como <?= usuarioLogado() ?></p>
<?php } else { ?>	
	<h2>Login</h2>
		<form action="login.php" method="post">
			<table class="table">
				<tr>
				<td>Email</td>
					<td><input type="email" name="email" class="form-control" ></td>
				</tr>
				<tr>
				<td>Senha</td>
					<td><input type="password" name="senha" class="form-control"></td>
				</tr>
				<tr>
					<td><button class="btn btn-primary">Login</button></td>
				</tr>
				
			</table>
		</form>
<?php	}	?>	
<?php include("rodape.php");?>
