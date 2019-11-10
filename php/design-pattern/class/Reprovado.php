<?php

class Reprovado implements EstadoDeUmOrcamento{
	public function aplica(Orcamento $orcamento){
		throw new Exception("Orçamento foi reprovado", 1);
	}

	public function aprova(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi reprovado", 1);
		
	}

	public function reprova(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi reprovado", 1);
		
	}

	public function finaliza(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi reprovado", 1);
	}	

}