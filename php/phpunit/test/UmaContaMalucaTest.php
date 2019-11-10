<?php 

require_once dirname(__FILE__)."\..\class\UmaContaMaluca.php";
use PHPUnit\Framework\TestCase;

class UmaContaMalucaTest extends TestCase{

	public function testContaMaior(){
		$conta = new UmaContaMaluca();
		$this->assertEquals(160, $conta->contaMaluca(40), 0.0001);
	}

	public function testContaMedio(){
		$conta = new UmaContaMaluca();
		$this->assertEquals(60, $conta->contaMaluca(20), 0.0001);
	}

	public function testContaMenor(){
		$conta = new UmaContaMaluca();
		$this->assertEquals(10, $conta->contaMaluca(5), 0.0001);
	}

}