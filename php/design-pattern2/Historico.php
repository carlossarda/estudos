<?php

class Historico{
	private $estadoDoContrato;

	function __construct()
	{
		$this->estadoDoContrato = array();
	}

	public function getEstado($index)
	{
		return $this->estadoDoContrato[$index];
	}

	public function addEstado(Estado $estado)
	{
		$this->estadoDoContrato[] = $estado;
	}

}

