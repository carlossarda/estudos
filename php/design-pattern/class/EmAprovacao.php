<?php

class EmAprovacao implements EstadoDeUmOrcamento{
	private $descontoAplicado = false;

	public function aplica(Orcamento $orcamento){
		if ($this->descontoAplicado == false){
			$orcamento->setValor($orcamento->getValor() - round($orcamento->getValor()*0.05),2);
			$this->descontoAplicado = true;
		}else{
			throw new Exception("Desconto já aplicado.", 1);
			
		}
	}

	public function aprova(Orcamento $orcamento){
		$orcamento->setEstado(new Aprovado());
		
	}

	public function reprova(Orcamento $orcamento){
		$orcamento->setEstado(new Reprovado());
		
	}

	public function finaliza(Orcamento $orcamento){
		throw new Exception("Este orçamento deve ser aprovado antes de ser finalizado", 1);
	}
}