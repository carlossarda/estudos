<?php

	date_default_timezone_set("Brazil/East");

	spl_autoload_register(function($nomeDaClasse) {
        
		if (file_exists('class/'.$nomeDaClasse.'.php')){
        	require_once('class/'.$nomeDaClasse.".php");
		}
	});

	$funcionario = new Funcionario(new Desenvolvedor);
	$funcionario->setId(1);
	$funcionario->setNome("Carlos Augusto");
	$funcionario->setSalario(3000);

	echo $funcionario->calculaSalario();

	

	


?>