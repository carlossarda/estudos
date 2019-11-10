<?php

require_once "TemplateDeImpostoCondicional.php";

class IHIT extends TemplateDeImpostoCondicional{

	public function __construct(Imposto $imposto = null){
			parent::__construct($imposto);
	}

	public function deveUsarOMaximo(Orcamento $orcamento){
		$produtoNoOrcamento = Array();

       	foreach ($orcamento->getItens() as $item) {
        	if(in_array($item->getNome(), $produtoNoOrcamento)) {
        		return true;
    		}else{
				$produtoNoOrcamento[] = $item->getNome();    			
    		}
    	}
   		return false;
	}

	public function taxacaoMinima(Orcamento $orcamento){
		return $orcamento->getValor()*(0.01*count($orcamento->getItens()));
	}

	public function taxacaoMaxima(Orcamento $orcamento){
		return $orcamento->getValor()*0.13+100;
	}

}