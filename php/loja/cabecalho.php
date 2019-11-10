<?php 
	
	error_reporting(E_ALL ^ E_NOTICE);



	// function carregaClasse($nomeDaClasse){
	// 	require_once("class/".$nomeDaClasse.".php");
	// }

	// spl_autoload_register("carregaClasse");
	// outro jeito
	
	spl_autoload_register(function($nomeDaClasse) {
    	require_once("class/".$nomeDaClasse.".php");
	});
	require_once("mostra_alerta.php");
	require_once("conecta.php");

?>

<html>

<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Minha Loja</title>
	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/loja.css" rel="stylesheet" />
	
</head>
<body>
	
<!--	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"> Minha Loja</a>
			</div>
			<div>
				<ul>
					<ul class="nav navbar-nav">
					<li><a href="formulario-produto.php">Adicionar produto</a></li>

				</ul>
			</div>
			<div>
				<ul>
					<ul class="nav navbar-nav">
					<li><a href="lista_produto.php">Listar produtos</a></li>
				</ul>
			</div>
		</div>
	</div>
-->
	<div class="topnav">
		<a class = "active" href="index.php">Minha Loja</a>
		<a href="formulario-produto.php">Adicionar produto</a>
		<a href="lista_produto.php">Listar produtos</a>
		<a href="formulario_categoria.php">Adicionar categoria</a>
		<a href="lista_categoria.php">Listar categorias</a>
		<a href="contato.php">Contato</a>
		<?php 


			if($_SESSION!=null && is_null($_SESSION["danger"]) ){

		 ?>
				<a style="float:right" class="logout" href="logout.php">Logout</a>

		<?php 
			}
		?>

	</div>

<!--
<ul>
 <li><a class="active" href="index.php">Minha Loja</a></li>
 <li><a href="contato.php">Contato</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Produto</a>
    <div class="dropdown-content">
      <a href="formulario-produto.php">Adicionar produto</a>
      <a href="lista_produto.php">Listar produtos</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Categoria</a>
    <div class="dropdown-content">
      <a href="formulario_categoria.php">Adicionar categoria</a>
      <a href="lista_categoria.php">Listar categorias</a>
    </div>
  </li>
  <li style="float:right"><a class="logout" href="logout.php">Logout</a></li>
</ul>

	
	
	
	<div class="leftmenu">
		<ul>
			<li><a class="active" href="#home">Home</a></li>
			<li><a href="#news">News</a></li>
			<li><a href="#contact">Contact</a></li>
			<li><a href="#about">About</a></li>
		</ul>
	</div>
	
-->
	<div class="container">

		<div class="principal">
			
				
	
<?php	
	mostraAlerta("success");
	
	mostraAlerta("danger");
?>