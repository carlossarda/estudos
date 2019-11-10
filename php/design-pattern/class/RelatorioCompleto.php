<?php

class RelatorioCompleto extends TemplateRelatorio{
	public function listaContas($contas){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		foreach ($contas as $conta) {
			echo "Titular: ".$conta->getNome()." <br> Agencia: ".$conta->getSeuBanco()->getAgencia()." <br> Numero da Conta: ". $conta->getNrConta() ." <br> Saldo: R$ ".$conta->getSaldo();
			echo "<br>";
			echo "<br>";
		}
			
	}
	public function cabecalho(Banco $banco){
		return $banco->getNome()."<br>". $banco->getEndereco() ."<br>".$banco->getTelefone();
	}

	public function rodape(Banco $banco){
		echo "<br>";
		echo "<br>";
		echo "Contato: " . $banco->getEmail() ." ". date("d-m-Y");
		echo "<br>";
		return;
	}
	
}