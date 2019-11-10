<?php

require_once "class/Imposto.php";
require_once "class/Orcamento.php";
require_once "class/CalculadoraDeImpostos.php";
require_once "class/CalculadoraDeDesconto.php";
require_once "class/EstadoDeUmOrcamento.php";
require_once "class/Item.php";
require_once "class/ICMS.php";
require_once "class/ISS.php";
require_once "class/KCV.php";
require_once "class/ICCC.php";
require_once "class/IHIT.php";
require_once "class/ImpostoMuitoAlto.php";
require_once "class/EmAprovacao.php";
require_once "class/Aprovado.php";
require_once "class/Reprovado.php";
require_once "class/Finalizado.php";


$calculadora = new CalculadoraDeImpostos();
$calculaDesconto = new CalculadoraDeDesconto();

$reforma = new Orcamento(500);
// $reforma->addItens(new Item("LAPIS", 25));
// $reforma->addItens(new Item("CANETA", 25));
echo "Orçamento= R$".$reforma->getValor();
echo "<br>";

$reforma->aplicaDesconto();
echo "Valor atual em aprovação: R$ ".$reforma->getValor();
$reforma->aprova();
echo "<br>";
$reforma->aplicaDesconto();
echo "Valor orçamento aprovado: R$ ".$reforma->getValor();
echo "<br>";

$reforma->finaliza();
echo "Valor finalizado: R$ ".$reforma->getValor();

echo "<br>";
echo "<h2>Impostos</h2>";
echo "ICCC= R$ ".$calculadora->calcula($reforma, new ICCC());
echo "<br>";
echo "ISS= R$ ".$calculadora->calcula($reforma, new ISS());
echo "<br>";
echo "ICMS= R$ ".$calculadora->calcula($reforma, new ICMS());
echo "<br>";
echo "ISS+ICCC= R$ ".$calculadora->calcula($reforma, new ISS(new ICCC()));
echo "<br>";
echo "ISS+ICCC+ICMS= R$ ".$calculadora->calcula($reforma, new ISS(new ICCC(new ICMS())));
echo "<br>";
echo "IMA= R$ ".$calculadora->calcula($reforma, new ImpostoMuitoAlto());
echo "<br>";
echo "IMA+ICMS= R$ ".$calculadora->calcula($reforma, new ImpostoMuitoAlto(new ICMS()));
echo "<br>";
echo "Desconto= R$ ".$calculaDesconto->desconto($reforma);
echo "<br>";


















// $reforma = new Orcamento(1000);
// echo "<br>";
// echo "Orçamento= R$ ".$reforma->getValor();
// echo "<br>";
// echo "ICCC= R$ ".$calculadora->calcula($reforma, new ICCC());
// echo "<br>";
// echo "ISS= R$ ".$calculadora->calcula($reforma, new ISS());
// echo "<br>";
// echo "ICMS= R$ ".$calculadora->calcula($reforma, new ICMS());
// echo "<br>";
// echo "Desconto= R$ ".$calculaDesconto->desconto($reforma);
// echo "<br>";

// $reforma = new Orcamento(300);
// echo "<br>";
// echo "Orçamento= R$ ".$reforma->getValor();
// echo "<br>";
// echo "ICCC= R$ ".$calculadora->calcula($reforma, new ICCC());
// echo "<br>";
// echo "ISS= R$ ".$calculadora->calcula($reforma, new ISS());
// echo "<br>";
// echo "ICMS= R$ ".$calculadora->calcula($reforma, new ICMS());
// echo "<br>";
// echo "Desconto= R$ ".$calculaDesconto->desconto($reforma);
// echo "<br>";

// $reforma = new Orcamento(1500);
// $reforma->addItens(new Item("Tijolo", 150));
// $reforma->addItens(new Item("Cimento1", 50));
// $reforma->addItens(new Item("Cimento", 50));
// $reforma->addItens(new Item("Cimento3", 50));
// $reforma->addItens(new Item("Cimento", 50));

// // echo "<pre>";
// // print_r($reforma->getItens());
// // echo "</pre>";
// echo "<br>";
// echo "Orçamento= R$ ".$reforma->getValor();
// echo "<br>";
// echo "ICCC= R$ ".$calculadora->calcula($reforma, new ICCC());
// echo "<br>";
// echo "ISS= R$ ".$calculadora->calcula($reforma, new ISS());
// echo "<br>";
// echo "ICMS= R$ ".$calculadora->calcula($reforma, new ICMS());
// echo "<br>";
// echo "KCV= R$ ".$calculadora->calcula($reforma, new KCV());
// echo "<br>";
// echo "Desconto= R$ ".$calculaDesconto->desconto($reforma);

// echo "<br>";
// echo "IHIT= R$ ".$calculadora->calcula($reforma, new IHIT());



// ?>