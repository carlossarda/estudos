<?php 

require_once "Relatorio.php";
require_once "Conta.php";

abstract class TemplateRelatorio implements Relatorio{
	public function listaContas($contas){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		foreach ($contas as $conta) {
			echo "Nome: ".$conta->getNome()."------------------Saldo: R$ ".$conta->getSaldo();
			echo "<br>";
			echo "<br>";
		}
			
	}

	public abstract function cabecalho(Banco $banco);

	public abstract function rodape(Banco $banco);

}