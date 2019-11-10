<?php

interface EstadoConta{
	public function saque(Conta $conta, $saque);
	
	public function deposito(Conta $conta, $deposito);

}