<?php

require_once 'global.php';

try{
	$id = $_GET['id'];

	$produto = new Produto($id);

	$produto->remover();

	header("Location:produtos.php");

}catch(Exception $e){
    Erro::trataErro($e);

}


?>