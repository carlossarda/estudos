<?php

class EmpresaFacade{
	private static $instance = null;

	///////////////singleton
	private EmpresaFacade(){};

	public static function getInstance()
	{
		if(is_null($this->instance)){
			$this->instance = new EmpresaFacade();	
		}
		return $this->instance;
	}
	/////////////////singleton
	public function criaContrato($nome,$valor)
	{
		return new Contrato($nome,$valor);
	}

	public function criaItem($nome,$valor)
	{
		return new Item($nome,$valor);
	}

	public function criaPedido($nome,$valor)
	{
		return new Pedido($nome,$valor);
	}

	public function finalizaPedido(Pedido $pedido){
		///diversas classes
	}
}