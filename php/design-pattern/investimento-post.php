<?php 

require_once "class/RealizadorDeInvestimentos.php";
require_once "class/Conservador.php";
require_once "class/Moderado.php";
require_once "class/Arrojado.php";


	$investimento = new RealizadorDeInvestimentos($_POST['valor'], $_POST['investimento']);
	
	// $opcInv = array('CONSERVADOR', 'MODERADO', 'ARROJADO');

	// echo "<pre>";
	// print_r($opcInv);
	// echo "</pre>";
	$valor = RealizadorDeInvestimentos::calculaGanhos($_POST['valor'], new $_POST['investimento']);
	echo "Valor Investido= R$ ".$investimento->getValorInv();
	echo "<br>";
	echo "Tipo de Investimento= ".$investimento->getTipoInv();
	echo "<br>";
	echo "Retorno: R$ ".RealizadorDeInvestimentos::calculaGanhos($_POST['valor'], new $_POST['investimento']);
	echo "<br>";
	echo "Imposto sobre o lucro= R$ ".round(($valor*0.25),2);
	echo "<br>";
	echo "Lucro= R$ ".round(($valor*0.75),2);
	echo "<br>";
	echo "Lucro= R$ ".round(($investimento->getValorInv()+($valor*0.75)),2);


 ?>