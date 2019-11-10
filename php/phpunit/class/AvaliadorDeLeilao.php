<?php 

class AvaliadorDeLeilao{
	private $maiorLance = -INF;
	private $menorLance = INF;
	private $maiores;
	
	public function avalia(Leilao $leilao){
		if(count($leilao->getLances())==0){
			throw new InvalidArgumentException("O leilao prescisa ter ao menos um lance");
			
		}
		foreach ($leilao->getLances() as $lances) {
			if($lances->getValor()>$this->maiorLance){
				$this->maiorLance = $lances->getValor();
			}

			if($lances->getValor()<$this->menorLance){
				$this->menorLance = $lances->getValor();
			}
		}

		$this->tresMais($leilao);

	}

	public function getMaiorLance(){
		return $this->maiorLance;
	}

	public function getMenorLance(){
		return $this->menorLance;
	}

	public function getMaiores(){
		return $this->maiores;
	}

	public function tresMais(Leilao $leilao){
		$lances = $leilao->getLances();

		usort($lances, function($a, $b){
			if($a->getValor() == $b->getValor()) return 0;
			return $a->getValor() < $b->getValor() ? 1 : -1;
		});
		$this->maiores = array_slice($lances, 0,3);
	}
	
}


 ?>