<?php

require_once "class/Resposta.php";
require_once "class/Formato.php";
require_once "class/Requisicao.php";
require_once "class/Conta.php";

class ContaXML implements Resposta{
	private $proximaResposta;

	public function __construct(Resposta $resposta){
			$this->proximaResposta = $resposta;
	}
	
	public function responde(Requisicao $req, Conta $conta){
		if ( $req->getFormato() == Formato::$XML){
			$teste = "<conta><titular>".$conta->getNome()."</titular><saldo>".$conta->getSaldo()."</saldo></conta>";
			return highlight_string($teste, true);

		}else{
			$this->proximaResposta->responde($req, $conta);
		}
	}
}