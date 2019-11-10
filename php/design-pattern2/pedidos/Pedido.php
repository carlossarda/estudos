<?php

class Pedido{
	private $cliente;
	private $valor;
	private $status;
	private $dataFinalizacao;

	function __construct($cliente,$valor)
	{
		$this->cliente = $cliente;
		$this->valor = $valor;
		$this->status = new Novo;

	}

	public function pagar()
	{
		$this->status = new Pago();
	}

	public function finalizar()
	{
		$this->status = new Finalizado();
	}

	public function entregue()
	{
		$this->dataFinalizacao = date("Y-m-d H:i");
		$this->status = new Entregue();
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function getDataFinalizacao()
	{
		return $this->dataFinalizacao;
	}
}