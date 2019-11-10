<?php
require_once 'global.php';

try{
	$nome = $_POST['nome'];

	$categoria = new Categoria();
	$categoria->nome = $nome;
	$categoria->inserir();

	header("Location:categorias.php");

}catch(Exception $e){
    Erro::trataErro($e);

}

