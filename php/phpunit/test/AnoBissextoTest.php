<?php 

	require_once dirname(__FILE__)."\..\class\AnoBissexto.php";
	use PHPUnit\Framework\TestCase;

	class AnoBissextoTest extends TestCase{

		public function testEAnoBissexto(){
			
			$ano = new AnoBissexto();

			$this->assertEquals(true, $ano->eBissexto(2000));
			$this->assertEquals(false, $ano->eBissexto(2001));
			$this->assertEquals(false, $ano->eBissexto(2003));
			$this->assertEquals(false, $ano->eBissexto(1900));
			$this->assertEquals(true, $ano->eBissexto(2004));

		}
	}
?>