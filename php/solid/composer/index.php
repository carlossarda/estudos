<?php 


	date_default_timezone_set("Brazil/East");

	spl_autoload_register(function($nomeDaClasse) {
        
		if (file_exists('class/'.$nomeDaClasse.'.php')){
        	require_once('class/'.$nomeDaClasse.".php");
		}
	});

	$pinv = new ProcessadorDeInvestimentos();

	echo "<pre>";
	print_r($pinv->contasDoBanco());
	echo "</pre>";

	$pinv->processa();
	echo "<pre>";
	print_r($pinv->contasDoBanco());
	echo "</pre>";


?>