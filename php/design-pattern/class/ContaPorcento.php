<?php

require_once "class/Resposta.php";
require_once "class/Formato.php";
require_once "class/Requisicao.php";
require_once "class/Conta.php";

class ContaPorcento implements Resposta{
	private $proximaResposta;
	
	public function __construct(Resposta $resposta){
			$this->proximaResposta = $resposta;
	}

	public function responde(Requisicao $req, Conta $conta){
		if ( $req->getFormato() == Formato::$PORCENTO){
			$teste = "%".$conta->getNome()."%".$conta->getSaldo()."%";
			return highlight_string($teste);
		}else{
			$this->proximaResposta->responde($req, $conta);
		}

	}

}