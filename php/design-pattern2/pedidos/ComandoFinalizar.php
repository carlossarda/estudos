<?php

class ComandoFinalizar implements Comando{
	private $pedido;

	function __construct($pedido)
	{
		$this->pedido = $pedido;
	}

	public function executa()
	{
		echo "Finalizando o pedido do cliente ".$this->pedido->getCliente();
		echo "<br>";
		$this->pedido->finalizar();
	}
}