<?php

class Finalizado implements EstadoDeUmOrcamento{
	public function aplica(Orcamento $orcamento){
		throw new Exception("Orçamento já foi finalizado", 1);
	}

	public function aprova(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi finalizado", 1);
		
	}

	public function reprova(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi finalizado", 1);
		
	}

	public function finaliza(Orcamento $orcamento){
		throw new Exception("Este orçamento já foi finalizado", 1);
	}	
}