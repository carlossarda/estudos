<?php 

	date_default_timezone_set("Brazil/East");

	spl_autoload_register(function($nomeDaClasse) {
        
		if (file_exists('class/'.$nomeDaClasse.'.php')){
        	require_once('class/'.$nomeDaClasse.".php");
		}
	});

	$fatura = new Fatura(1000);

	$geradorNota = new GeradorNotaFiscal();

	$geradorNota->addAcao(new NotaFiscalDao());
	$geradorNota->addAcao(new EnviadorDeEmail());

	$geradorNota->gera($fatura);


 ?>