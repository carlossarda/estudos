<?php  

class Conta{
	private $nome;
	private $saldo;
	private $nrConta;
	private $seuBanco;
	private $estadoSaldo;

	public function __construct($nome, $saldo, $nrConta, Banco $banco){
		$this->nome = $nome;
		$this->saldo = $saldo;
		$this->nrConta = $nrConta;
		$this->seuBanco = $banco;
		if($this->saldo>=0){
			$this->estadoSaldo = new ContaPositivo();
		}else{
			$this->estadoSaldo = new ContaNegativo();
		}
	}

	public function getNome(){
		return $this->nome;
	}
	
	public function getSaldo(){
		return $this->saldo;
	}

	public function getNrConta(){
		return $this->nrConta;
	}

	public function getSeuBanco(){
		return $this->seuBanco;
	}

	public function setSaldo($saldo){
		$this->saldo = $saldo;
	}

	public function getEstadoSaldo(){
		return $this->estadoSaldo;
	}

	public function setEstado(EstadoConta $novoEstado){
		$this->estadoSaldo = $novoEstado;
	}

	public function saque($saque){
		$this->estadoSaldo->saque($this, $saque);
	}
	
	public function deposito($deposito){
		$this->estadoSaldo->deposito($this, $deposito);
	}

}


?>