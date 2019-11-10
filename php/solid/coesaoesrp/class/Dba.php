<?php

	class Dba implements Cargo {
		public function calcula(Funcionario $funcionario){
			return QuinzeOuVinteCincoPorcento::calcula($funcionario);
		}
	}

?>