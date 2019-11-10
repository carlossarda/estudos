<?php 
	require_once dirname(__FILE__)."\..\class\AvaliadorDeLeilao.php";
	require_once dirname(__FILE__)."\..\class\Lance.php";
	require_once dirname(__FILE__)."\..\class\Leilao.php";
	require_once dirname(__FILE__)."\..\class\Usuario.php";
	use PHPUnit\Framework\TestCase;

	class LeilaoTest extends TestCase{

		public function testNaoPermiteDoisLancesSeguidos(){

			$leilao = new Leilao("Macbook caro");

			$carlos = new Usuario("Carlos");

			$leilao->propoe(new Lance($carlos,2000));
			$leilao->propoe(new Lance($carlos,2500));

			$this->assertEquals(1,count($leilao->getLances()));
			$this->assertEquals(4000,$leilao->getLances()[0]->getValor());
		}

		public function testNaoPermiteMaisQueCincoLances(){

			$leilao = new Leilao("Macbook caro");

			$carlos = new Usuario("Carlos");
			$joao = new Usuario("Joao");

			$leilao->propoe(new Lance($carlos,2000));
			$leilao->propoe(new Lance($joao,2300));
			
			$leilao->propoe(new Lance($carlos,2500));
			$leilao->propoe(new Lance($joao,2800));

			$leilao->propoe(new Lance($carlos,2900));
			$leilao->propoe(new Lance($joao,3000));

			$leilao->propoe(new Lance($carlos,3100));
			$leilao->propoe(new Lance($joao,3300));

			$leilao->propoe(new Lance($carlos,3500));
			$leilao->propoe(new Lance($joao,3800));

			$leilao->propoe(new Lance($carlos,4100));
			$leilao->propoe(new Lance($joao,4400));

			$this->assertEquals(10,count($leilao->getLances()));
			$this->assertEquals(4000,$leilao->getLances()[0]->getValor());
			$this->assertEquals(3800,$leilao->getLances()[9]->getValor());
		}

		public function testDobrarUltimoLance(){

			$leilao = new Leilao("Macbook caro");

			$carlos = new Usuario("Carlos");
			$joao = new Usuario("Joao");
			$diego = new Usuario("Diego");

			$leilao->propoe(new Lance($carlos,2000));
			$leilao->propoe(new Lance($joao,2300));
			
			$leilao->propoe(new Lance($carlos,2500));
			$leilao->propoe(new Lance($joao,2800));
			$leilao->propoe(new Lance($diego,3000));



			$this->assertEquals(5,count($leilao->getLances()));
			$this->assertEquals(4000,$leilao->getLances()[0]->getValor());
			$this->assertEquals(4600,$leilao->getLances()[1]->getValor());
			$this->assertEquals(2500,$leilao->getLances()[2]->getValor());
			$this->assertEquals(2800,$leilao->getLances()[3]->getValor());
			$this->assertEquals(6000,$leilao->getLances()[4]->getValor());
		}
	}

?>