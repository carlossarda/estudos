<?php 

	date_default_timezone_set("Brazil/East");

	spl_autoload_register(function($nomeDaClasse) {
        
		if (file_exists('class/'.$nomeDaClasse.'.php')){
        	require_once('class/'.$nomeDaClasse.".php");
		}
	});


	$compra = new Compra(3000,'sao paulo');

	$calculadora = new CalculadoraDePrecos(new TabelaDePrecoPadrao(), new Transportadora());

	echo $calculadora->calcula($compra);



 ?>