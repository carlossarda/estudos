<?php

require_once "class/Desconto.php";
require_once "class/Orcamento.php";

class DescontoPorVendaCasada implements Desconto{
	
	private $proximoDesconto;
	private $itensVenda = array('LAPIS','CANETA');

	
	private function existe($nomeDoItem, Orcamento $orcamento) {
            foreach ($orcamento->getItens() as $item) {
                if($item->getNome() == $nomeDoItem) return true;
            }
            return false;
    }

    public function desconto(Orcamento $orcamento){
		if ($this->existe($this->itensVenda[0], $orcamento) && $this->existe($this->itensVenda[1], $orcamento)) {
			return $orcamento->getValor() * 0.05;
		}else{
			return $this->proximoDesconto->desconto($orcamento);
		}
	}

	public function setProximo(Desconto $proximo){
		$this->proximoDesconto = $proximo;
	}
}