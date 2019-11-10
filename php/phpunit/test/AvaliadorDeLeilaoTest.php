<?php 
	require_once dirname(__FILE__)."\..\class\AvaliadorDeLeilao.php";
	require_once dirname(__FILE__)."\..\class\ConstrutorDeLeilao.php";

	use PHPUnit\Framework\TestCase;



	class AvaliadorDeLeilaoTest extends TestCase{
		private $leiloeiro;

		public function SetUp(){
			$this->leiloeiro = new AvaliadorDeLeilao();
			var_dump("inicializando teste!");
		}

		public function tearDown() {
			var_dump("fim");
		}

		public static function setUpBeforeClass() {
			var_dump("before class");
		}

		public static function tearDownAfterClass() {
			var_dump("after class");
		}

		public function testDecrescente(){

			// $leilao = new Leilao('videogame');

			$carlos = new Usuario('Carlos');
			$tiago = new Usuario('Tiago');
			$diego = new Usuario('Diego');

			// $leilao->propoe(new Lance($carlos, 400));
			// $leilao->propoe(new Lance($tiago, 350));
			// $leilao->propoe(new Lance($diego, 250));

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,400)->propoe($tiago,350)->propoe($diego,250);

			$this->leiloeiro->avalia($construtor->constroi());

			$maiorLanceEsperado = 400;
			$menorLanceEsperado = 250;


			$this->assertEquals($maiorLanceEsperado, $this->leiloeiro->getMaiorLance());
			echo "<br>";
			$this->assertEquals($menorLanceEsperado, $this->leiloeiro->getMenorLance());
		}

		public function testLancesAleatorios(){

			// $leilao = new Leilao('videogame');

			$carlos = new Usuario('Carlos');
			$tiago = new Usuario('Tiago');
			$diego = new Usuario('Diego');

			// $leilao->propoe(new Lance($carlos, 400));
			// $leilao->propoe(new Lance($tiago, 350));
			// $leilao->propoe(new Lance($diego, 250));
			// $leilao->propoe(new Lance($carlos, 450));
			// $leilao->propoe(new Lance($tiago, 150));
			// $leilao->propoe(new Lance($diego, 650));

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,400)->propoe($tiago,350)->propoe($diego,250)->propoe($carlos,450)->propoe($tiago,150)->propoe($diego,650);

			$this->leiloeiro->avalia($construtor->constroi());

			$maiorLanceEsperado = 650;
			$menorLanceEsperado = 150;


			$this->assertEquals($maiorLanceEsperado, $this->leiloeiro->getMaiorLance());
			echo "<br>";
			$this->assertEquals($menorLanceEsperado, $this->leiloeiro->getMenorLance());
		}

		public function testNumerosMaioresCrescentes(){

			// $leilao = new Leilao('videogame');

			$carlos = new Usuario('Carlos');
			$tiago = new Usuario('Tiago');
			$diego = new Usuario('Diego');

			// $leilao->propoe(new Lance($carlos, 1000));
			// $leilao->propoe(new Lance($tiago, 2500));
			// $leilao->propoe(new Lance($diego, 3500));

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,1000)->propoe($tiago,2500)->propoe($diego,3500);

			$this->leiloeiro->avalia($construtor->constroi());

			$maiorLanceEsperado = 3500;
			$menorLanceEsperado = 1000;


			$this->assertEquals($maiorLanceEsperado, $this->leiloeiro->getMaiorLance());
			echo "<br>";
			$this->assertEquals($menorLanceEsperado, $this->leiloeiro->getMenorLance());
		}

		public function testUmLance(){

			// $leilao = new Leilao('videogame');

			$carlos = new Usuario('Carlos');
			
			// $leilao->propoe(new Lance($carlos, 1000));

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,1000);

			$this->leiloeiro->avalia($construtor->constroi());

			$maiorLanceEsperado = 1000;
			$menorLanceEsperado = 1000;


			$this->assertEquals($maiorLanceEsperado, $this->leiloeiro->getMaiorLance());
			
			$this->assertEquals($menorLanceEsperado, $this->leiloeiro->getMenorLance());
		}

		public function testTresMaioresCincoLances(){

			// $leilao = new Leilao('videogame');

			$carlos = new Usuario('Carlos');
			$tiago = new Usuario('Tiago');

			// $leilao->propoe(new Lance($carlos, 1000));
			// $leilao->propoe(new Lance($tiago, 2500));
			// $leilao->propoe(new Lance($carlos, 3500));
			// $leilao->propoe(new Lance($tiago, 4500));
			// $leilao->propoe(new Lance($carlos, 5000));

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,1000)->propoe($tiago,2500)->propoe($carlos,3500)->propoe($tiago,4500)->propoe($carlos,5000);

			$this->leiloeiro->avalia($construtor->constroi());

			$maioresEsperados = array(5000,4500,3500);

			$this->assertEquals(3, count($this->leiloeiro->getMaiores()));
			$this->assertEquals(5000, $this->leiloeiro->getMaiores()[0]->getValor() );
			$this->assertEquals(4500, $this->leiloeiro->getMaiores()[1]->getValor() );
			$this->assertEquals(3500, $this->leiloeiro->getMaiores()[2]->getValor() );
		}

		public function testTresMaioresDoisLances(){

			// $leilao = new Leilao('videogame');

			$carlos = new Usuario('Carlos');
			$tiago = new Usuario('Tiago');

			// $leilao->propoe(new Lance($carlos, 1000));
			// $leilao->propoe(new Lance($tiago, 2500));

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,1000)->propoe($tiago,2500);

			// $this->leiloeiro->avalia($leilao);
			$this->leiloeiro->avalia($construtor->constroi());

			$this->assertEquals(2, count($this->leiloeiro->getMaiores()));
			$this->assertEquals(2500, $this->leiloeiro->getMaiores()[0]->getValor() );
			$this->assertEquals(1000, $this->leiloeiro->getMaiores()[1]->getValor() );
		}

		/**
		* @expectedException InvalidArgumentException
		*/

		public function testNenhumLance(){

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame");

			$this->leiloeiro->avalia($construtor->constroi());

			$this->assertEquals(0, count($this->leiloeiro->getMaiores()));


		}

		/**
		* @expectedException InvalidArgumentException
		*/

		public function testLanceNegativo(){

			$carlos = new Usuario('Carlos');

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,-1000);

			$this->leiloeiro->avalia($construtor->constroi());

		}

		public function testLanceValorZero(){

			$carlos = new Usuario('Carlos');

			$construtor = new ConstrutorDeLeilao();

			$construtor->para("videogame")->propoe($carlos,-0);

			$this->leiloeiro->avalia($construtor->constroi());

			$this->assertEquals(0, $this->leiloeiro->getMaiorLance());

		}
	}

 ?>