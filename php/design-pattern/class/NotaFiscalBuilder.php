<?php

class NotaFiscalBuilder{
	private $empresa;
	private $cnpj;
	private $itens;
	private $valorBruto;
	private $valorImpostos;
	private $observacoes;
	private $dataEmissao;
	private $listaDeAcoes;

	public function __construct($listaDeAcoes){
		$this->valorImpostos = 0;
		$this->dataEmissao = date("d/m/Y H:i:s");
		$this->listaDeAcoes = $listaDeAcoes;
	}

	public function comEmpresa($empresa){
		$this->empresa = $empresa;
	}

	public function comCnpj($cnpj){
		$this->cnpj = $cnpj;
	}

	public function pegaLista(ItemDaNota $itens){
		$this->itens[] = $itens;
		$this->valorBruto += $itens->getValor();
		$this->valorImpostos += $itens->getValor() * 0.2;
		$this->observacoes = $itens->getDescricao();
	}

	
	public function naData($data){
		$this->dataEmissao = $data;
		return $this;
	}

	public function build(){

		$nf = new NotaFiscal($this->empresa, $this->cnpj, $this->itens, $this->valorBruto, $this->valorImpostos, $this->observacoes, $this->dataEmissao);

		foreach ($this->listaDeAcoes as $acao) {
			$acao->executa($nf);
		}

		return $nf;

	}

	

}