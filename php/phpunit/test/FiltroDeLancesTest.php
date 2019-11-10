<?php 

require_once dirname(__FILE__)."\..\class\FiltroDeLances.php";
require_once dirname(__FILE__)."\..\class\Usuario.php";
require_once dirname(__FILE__)."\..\class\Lance.php";
require_once dirname(__FILE__)."\..\class\Leilao.php";


use PHPUnit\Framework\TestCase;

class FiltroDeLancesTest extends TestCase {
    public function testDeveSelecionarLancesMaiorQue5000() {
        $joao = new Usuario("Joao");

        $filtro = new FiltroDeLances();
        $lances = [];
        $lances[] = new Lance($joao,11600);
        $lances[] = new Lance($joao,800);

        $resultado = $filtro->filtra($lances);
        $this->assertEquals(1, count($resultado));
        $this->assertEquals(11600, $resultado[0]->getValor(), 0.00001);
    }
    public function testDeveSelecionarLancesEntre1000E3000() {
        $joao = new Usuario("Joao");

        $filtro = new FiltroDeLances();
        $lances = [];
        $lances[] = new Lance($joao,2000);
        $lances[] = new Lance($joao,1000);
        $lances[] = new Lance($joao,3000);
        $lances[] = new Lance($joao,800);

        $resultado = $filtro->filtra($lances);

        $this->assertEquals(1, count($resultado));
        $this->assertEquals(2000, $resultado[0]->getValor(), 0.00001);
    }

    public function testDeveSelecionarLancesEntre500E700() {
        $joao = new Usuario("Joao");

        $filtro = new FiltroDeLances();
        $lances = [];
        $lances[] = new Lance($joao,600);
        $lances[] = new Lance($joao,500);
        $lances[] = new Lance($joao,700);
        $lances[] = new Lance($joao,800);

        $resultado = $filtro->filtra($lances);
        $this->assertEquals(1, count($resultado));
        $this->assertEquals(600, $resultado[0]->getValor(), 0.00001);
    }

    
}

?>