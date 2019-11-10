<?php

class ComandoPagar implements Comando{
	private $pedido;

	function __construct($pedido)
	{
		$this->pedido = $pedido;
	}

	public function executa()
	{
		echo "Pagando o pedido do cliente ".$this->pedido->getCliente();
		echo "<br>";
		$this->pedido->pagar();
	}
}