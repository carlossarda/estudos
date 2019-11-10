<?php

	class Tester implements Cargo {
		public function calcula(Funcionario $funcionario){
			return QuinzeOuVinteCincoPorcento::calcula($funcionario);
		}
	}

?>