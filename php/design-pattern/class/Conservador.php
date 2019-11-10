<?php 

require_once "class/TipoInvestimento.php";

class Conservador implements TipoInvestimento{
	public function calculaGanhos($investimentos){
		return round($investimentos*0.008,2);
	}
}

 ?>