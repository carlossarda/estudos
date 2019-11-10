<?php
	class Leilao {
		private $descricao;
		private $lances;
		
		function __construct($descricao) {
			$this->descricao = $descricao;
			$this->lances = array();
		}
		
		public function propoe(Lance $lance) {
			$this->validaLance($lance);
			if(count($this->lances) == 0 || $this->podeDarLance($lance->getUsuario()) ){
				$this->lances[] = $lance;
			}
		}

		private function validaLance(Lance $lance){
			if ($lance->getValor()<0){
				throw new InvalidArgumentException("O valor do lance prescisa ser positivo");
			}

		}

		private function consumaLance(Lance $lance){
			if ($this->verificaQuantidadeDeLances($lance->getUsuario())){
				$lance->setValor($this->dobraLance($lance));
				$this->lances[] = $lance;
			}else{
				$this->lances[] = $lance;
				
			}
		}

		private function podeDarLance(Usuario $usuario){
			
			return $this->percorreArray($usuario) < 5 && $this->pegaUltimoLanceUsuario()->getUsuario() != $usuario;
		}

		private function percorreArray(Usuario $usuario){
			$total = 0;
			foreach ($this->lances as $lance) {
				if($lance->getUsuario() == $usuario){
					$total ++;
				}
			}
			return $total;
		}

		private function dobraLance(Lance $lance){
			return $lance->getValor() * 2;

		}

		private function verificaQuantidadeDeLances(Usuario $usuario){
			
			return ($this->percorreArray($usuario)<1) ? true : false;
		}

		private function pegaUltimoLanceUsuario(){
			return $this->lances[count($this->lances)-1];
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function getLances() {
			return $this->lances;
		}
	}
?>