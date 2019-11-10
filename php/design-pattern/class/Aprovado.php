<?php

class Aprovado implements EstadoDeUmOrcamento{
	private $descontoAplicado = false;

	public function aplica(Orcamento $orcamento){
		if ($this->descontoAplicado == false){
			$orcamento->setValor($orcamento->getValor() - round($orcamento->getValor()*0.02),2);
			$this->descontoAplicado = true;
		}else{
			throw new Exception("Desconto já aplicado.", 1);
			
		}
	}

	public function aprova(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi aprovado", 1);
		
	}

	public function reprova(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi aprovado", 1);
		
	}

	public function finaliza(Orcamento $orcamento){
		$orcamento->setEstado(new Finalizado());
	}
}