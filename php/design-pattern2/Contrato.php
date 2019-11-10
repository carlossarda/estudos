<?php

class Contrato{
	private $nome;
	private $dataEmissao;
	private $tipo;

	function __construct($nome, $dataEmissao, $tipo = null)
	{
		$this->nome = $nome;
		$this->dataEmissao = $dataEmissao;
		if(!is_null($tipo)){
			$this->tipo = $tipo;
		}else{
			$this->tipo = new Novo();
		}
	}

	public function setTipo(TipoDeContrato $novoTipo)
	{
		$this->tipo = $novoTipo;
	}

	public function avanca()
	{
		$this->tipo->avanca($this);
	}

	public function salvaEstado()
	{
		return new Estado(new Contrato($this->nome,$this->dataEmissao, $this->tipo));
	}

	public function getDataEmissao()
	{
		return $this->dataEmissao;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function restaura(Estado $estado)
	{
		$this->data = $estado->getContrato()->getDataEmissao();
        $this->cliente = $estado->getContrato()->getNome();
        $this->tipo = $estado->getContrato()->getTipo();
	}

}