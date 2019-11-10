<?php

class Concluido implements TipoDeContrato{
 	public function avanca(Contrato $contrato){
		throw new Exception("Contrato foi finalizado", 1);
		
	}
 }