<?php

require_once "class/RetornaConta.php";
require_once "class/Resposta.php";
require_once "class/Requisicao.php";
require_once "class/Formato.php";
require_once "class/Conta.php";

$nome = "Carlos Augusto";
$saldo = "2000";
$conta = new Conta($nome,$saldo);
$retornaConta = new RetornaConta();

$tipoReq = Formato::$CSV;
echo "<br>";

$req = new Requisicao($tipoReq);

echo $retornaConta->retorna($req,$conta);

echo "<br>";

$nome = "Joao";
$saldo = "2500";
$conta = new Conta($nome,$saldo);

$tipoReq = Formato::$PORCENTO;
echo "<br>";

$req = new Requisicao($tipoReq);

echo $retornaConta->retorna($req,$conta);

echo "<br>";

$nome = "Celia";
$saldo = "-1500";
$conta = new Conta($nome,$saldo);

$tipoReq = Formato::$XML;
echo "<br>";

$req = new Requisicao($tipoReq);

echo $retornaConta->retorna($req,$conta);

echo "<br>";

$nome = "Maria";
$saldo = "1000";
$conta = new Conta($nome,$saldo);

$tipoReq = ".";
echo "<br>";

$req = new Requisicao($tipoReq);

echo $retornaConta->retorna($req,$conta);

echo "<br>";

?>