<?php

require_once "class/Desconto.php";

class SemDesconto implements Desconto{

	public function desconto(Orcamento $orcamento){
		return 0;
	}

	public function setProximo(Desconto $proximo){
		//faz nada
	}
	
	
}