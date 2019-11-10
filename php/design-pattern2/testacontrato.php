<?php

require_once "global.ini";


$historico = new Historico();
$contrato = new Contrato("Caelum", date("Y-m-d"));

echo "<pre>";
var_dump($contrato);

echo "<br>";

$historico->addEstado($contrato->salvaEstado());
$contrato->avanca();
var_dump($contrato);
echo "<br>";
$historico->addEstado($contrato->salvaEstado());
$contrato->avanca();
var_dump($contrato);
echo "<br>";
$contratoAntigo = $historico->getEstado(0);
var_dump($contratoAntigo);
echo "<br>";
$contrato->restaura($historico->getEstado(0));

var_dump($contrato);
echo "</pre>";


?>