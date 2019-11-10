<?php  

require_once "class/TipoInvestimento.php";

class Arrojado implements TipoInvestimento{
	public function calculaGanhos($investimentos){
		$chance = mt_rand(1,100);
		if ($chance>80) {
			return round($investimentos*0.05,2);
		}else if($chance>50 && $chance<=80){
			return round($investimentos*0.03,2);
		}else{
			return round($investimentos*0.006,2);
		}
		
	}
}

?>