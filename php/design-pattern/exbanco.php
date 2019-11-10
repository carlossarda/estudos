<?php

require_once "class/Banco.php";
require_once "class/Conta.php";
require_once "class/Relatorio.php";
require_once "class/TemplateRelatorio.php";
require_once "class/RelatorioSimples.php";
require_once "class/RelatorioCompleto.php";
require_once "class/Filtro.php";
require_once "class/FiltroMenorQue100Reais.php";
require_once "class/FiltroMaiorQue500MilReais.php";
require_once "class/FiltroMesmoMes.php";
require_once "class/EstadoConta.php";
require_once "class/ContaPositivo.php";
require_once "class/ContaNegativo.php";

$bradesco = new Banco("Bradesco", "1500", "3211-1234", "Rua Nova, num 3", "bradesco@bradesco.com.br");
$itau = new Banco("Itau", "1201", "3456-6543", "Rua Meia Velha, num 2", "itau@itau.com.br");
$caixa = new Banco("Caixa", "1302", "2134-4123", "Rua Velha, nume1", "caixa@caixa.gov.br");

$contas = array();

$conta1 = new Conta("Pedro A", "511318", "109876-5", $bradesco);
$conta2 = new Conta("Thiago B", "-3210", "100584-3", $bradesco);
$conta3 = new Conta("João C", "-99", "100321-2", $bradesco);
$conta4 = new Conta("Mateus D", "83", "100832-4", $bradesco);
$conta5 = new Conta("Diego E", "631", "100926-1", $bradesco);

$contas = [$conta3];
// $contas = [$conta1, $conta2, $conta3, $conta4, $conta5];


// $relatorio1 = new RelatorioSimples();

// echo $relatorio1->cabecalho($bradesco);

// echo $relatorio1->listaContas($contas);

// echo $relatorio1->rodape($bradesco);

$relatorio2 = new RelatorioCompleto();

// echo $relatorio2->cabecalho($bradesco);

echo $relatorio2->listaContas($contas);

// echo $relatorio2->rodape($bradesco);

echo get_class($conta3->getEstadoSaldo());

$conta3->deposito(321);

echo $relatorio2->listaContas($contas);
echo "<br>";
echo get_class($conta3->getEstadoSaldo());

$conta3->saque(321);

echo $relatorio2->listaContas($contas);
echo "<br>";
echo get_class($conta3->getEstadoSaldo());

$conta3->deposito(123);

echo $relatorio2->listaContas($contas);
echo "<br>";
echo get_class($conta3->getEstadoSaldo());

// $filtroM100 = new FiltroMenorQue100Reais(new FiltroMaiorQue500MilReais());


// foreach ($filtroM100->filtra($contas) as $conta) {
	
// 	echo "<br>";
// 	echo "Nome: ".$conta->getNome();
// 	echo "<br>";
// 	echo "Saldo: R$ ".$conta->getSaldo();
// 	echo "<br>";
// 	echo "Número da Conta: ".$conta->getNrConta();
// 	echo "<br>";
// 	echo "Banco:".$conta->getSeuBanco()->getNome();
// 	echo "<br>";
// 	echo "Agencia: ".$conta->getSeuBanco()->getAgencia();
// 	echo "<br>";
// 	echo "Telefone do Banco: ".$conta->getSeuBanco()->getTelefone();
// 	echo "<br>";
// 	echo "Endereço do Banco: ".$conta->getSeuBanco()->getEndereco();
// 	echo "<br>";
// }



?>