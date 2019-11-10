<?php

	require_once "class/Desconto5Itens.php";
	require_once "class/Desconto300Reais.php";
	require_once "class/Desconto500Reais.php";
	require_once "class/DescontoPorVendaCasada.php";
	require_once "class/SemDesconto.php";

class CalculadoraDeDesconto{
	public function desconto(Orcamento $orcamento){
	
		$desconto5Itens = new Desconto5Itens();
		$desconto300Reais = new Desconto300Reais();
		$desconto500Reais = new Desconto500Reais();
		$descontoVendaCasada = new DescontoPorVendaCasada();
		$semDesconto = new SemDesconto();

		$desconto5Itens->setProximo($desconto500Reais);
		$desconto500Reais->setProximo($descontoVendaCasada);
		$descontoVendaCasada->setProximo($desconto300Reais);
		$desconto300Reais->setProximo($semDesconto);

		$valorDoDesconto = $desconto5Itens->desconto($orcamento);

		return $valorDoDesconto;

	}
}

?>