<?php

	class Desenvolvedor implements Cargo {
		public function calcula(Funcionario $funcionario){
			return DezOuVintePorcento::calcula($funcionario);
		}
	}


?>