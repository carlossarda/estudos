<?php

require_once "TemplateRelatorio.php";

class RelatorioSimples extends TemplateRelatorio{
	
	public function cabecalho(Banco $banco){
		return $banco->getNome()." ---------------- Telefone: ".$banco->getTelefone();
	}

	public function rodape(Banco $banco){
	
		echo "<br>";
		echo "<br>";
		return $banco->getNome()." ---------------- Telefone: ".$banco->getTelefone();
		echo "<br>";
	}
	
}