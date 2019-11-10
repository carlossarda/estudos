<?php 

	class AnoBissexto{
		// private $ano;

		// public function __construct($ano){
		// 	$this->ano = $ano;
		// }

		public function eBissexto($ano){
			if ($ano % 400 == 0){
				return true;
			}
			if ($ano % 100 == 0){
				return false;
			}

			if ($ano % 4 == 0){
				return true;
			}
			if($this->diasNoAno($ano)){
				return true;
			}

			return false;
		}

		public function diasNoAno($ano){
			
			$ultimo_dia = date('d', mktime(0, 0, 0, 3, 0, $ano));

			return $ultimo_dia == 29 ? true:false;
		}

	}


?>