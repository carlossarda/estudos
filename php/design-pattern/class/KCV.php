<?php

require_once "TemplateDeImpostoCondicional.php";

class KCV extends TemplateDeImpostoCondicional{
		public function __construct(Imposto $imposto = null){
			parent::__construct($imposto);
		}

		public function deveUsarOMaximo(Orcamento $orcamento){
			return $orcamento->getValor() > 500 && $this->temItemMaiorQue100ReaisNo($orcamento);
		}
		
		public function taxacaoMinima(Orcamento $orcamento){
			return $orcamento->getValor()*0.1;
		}

		public function taxacaoMaxima(Orcamento $orcamento){
			return $orcamento->getValor()*0.06;
		}
		
		public function temItemMaiorQue100ReaisNo(Orcamento $orcamento) {
            
            foreach ($orcamento->getItens() as $item) {
            	if($item->getValor() > 100) {
            		return true;
            	}
            }
            return false;
    	}
}

?>