<?php 

class EnviaNotaEmail implements AcoesAoGerarNota{
	public function executa(NotaFiscal $nf){
		echo "Foi para o email";
	}
}