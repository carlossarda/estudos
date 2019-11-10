<?php

class ContaNegativo implements EstadoConta{

	public function saque(Conta $conta, $saque){
		throw new Exception("Saldo da conta encontra-se negativo.", 1);	
	}
	
	public function deposito(Conta $conta, $deposito){
		$conta->setSaldo($conta->getSaldo() + $deposito * 0.95);
		if ($conta->getSaldo()>=0){
			$conta->setEstado(new ContaPositivo());
		}

	}
	
}