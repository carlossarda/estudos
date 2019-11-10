<?php 

require_once "class/Desconto.php";

class Desconto5Itens implements Desconto{
	private $proximoDesconto;

	public function desconto(Orcamento $orcamento){
		if (count($orcamento->getItens())>=5){
			return $orcamento->getValor()*0.1;
		}else{
			return  $this->proximoDesconto->desconto($orcamento);
		}
	}

	public function setProximo(Desconto $proximo){
		$this->proximoDesconto = $proximo;
	}
}

?>