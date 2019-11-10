<?php

require_once "class/Resposta.php";
require_once "class/Requisicao.php";
require_once "class/Conta.php";

class ContaSemTipo implements Resposta{
	private $proximaResposta;
	
	public function responde(Requisicao $req, Conta $conta){
		echo "Sem tipo.";
	}

	public function setProxima(Resposta $resposta){
		
	}
}