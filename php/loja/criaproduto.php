 <?php
 
	require_once("class/produto.php");
 
	$livro = new Produto();
	
	$livro->nome = "Livro de php e OO";
	
	var_dump($livro);
 
 
 ?>