<?php  

require_once "class/TipoInvestimento.php";

class Moderado implements TipoInvestimento{
	public function calculaGanhos($investimentos){
		$chance = mt_rand(1,100);

		if ($chance>50) {
			return round($investimentos*0.025,2);
		}else{
			return round($investimentos*0.07,2);
		}
		
	}
}



?>