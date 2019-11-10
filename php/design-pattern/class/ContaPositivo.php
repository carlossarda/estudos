<?php

class ContaPositivo implements EstadoConta{

	public function saque(Conta $conta, $saque){
		// if($saque <= $conta->getSaldo()){
		// 	$conta->setSaldo($conta->getSaldo() - $saque);
		// }else{
		// 	throw new Exception("Saldo insuficiente.", 1);
		// }
		$conta->setSaldo($conta->getSaldo() - $saque);
		if ($conta->getSaldo()<0){
			$conta->setEstado(new ContaNegativo());
		}
	}
	
	public function deposito(Conta $conta, $deposito){
		$conta->setSaldo($conta->getSaldo() + $deposito * 0.98);

	}

}