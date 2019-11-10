<?php

require_once "class/Requisicao.php";
require_once "class/ContaXML.php";
require_once "class/ContaCSV.php";
require_once "class/ContaPorcento.php";
require_once "class/ContaSemTipo.php";
require_once "class/Conta.php";

class RetornaConta{
	
	public function retorna(Requisicao $req, Conta $conta){

		$contaSemTipo = new ContaSemTipo();
		$contaPorcento = new ContaPorcento($contaSemTipo);
		$contaCsv = new ContaCSV($contaPorcento);
		$contaXml = new ContaXML($contaCsv);
		
		$respostaFormato = $contaXml->responde($req, $conta);

		return $respostaFormato;

	}

}