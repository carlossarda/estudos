<?php 
	error_reporting(0);
	require_once "global.ini";
	// require_once "ConnectionFactory.php";

	$conexao = ConnectionFactory::getConnection();



	$select = "select * from cursos";

	var_dump($conexao);

?>