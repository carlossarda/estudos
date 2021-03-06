<?php

class Impressora{

	public function visitaSoma(Soma $soma){
		echo "(";
		$soma->getEsquerda()->aceita($this);
		echo "+";
		$soma->getDireita()->aceita($this);
		echo ")";
	}

	public function visitaSubtracao(Subtracao $subtracao){
		echo "(";
		$subtracao->getEsquerda()->aceita($this);
		echo "-";
		$subtracao->getDireita()->aceita($this);
		echo ")";
	}

	public function visitaDivisao(Divisao $divisao){
		echo "(";
		$divisao->getEsquerda()->aceita($this);
		echo "/";
		$divisao->getDireita()->aceita($this);
		echo ")";
	}

	public function visitaMultiplicacao(Multiplicacao $multiplicacao){
		echo "(";
		$multiplicacao->getEsquerda()->aceita($this);
		echo "*";
		$multiplicacao->getDireita()->aceita($this);
		echo ")";
	}

	public function visitaNumero(Numero $numero){
		echo $numero->getNumero();
	}
}