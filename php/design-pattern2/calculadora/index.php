<?php

require_once "../global.ini";

$esquerdo =  new Soma(new Numero(2), new Numero(3));
$direito =  new Subtracao(new Numero(14), new Numero(7));

$impressora = new Impressora();


$mult = new Multiplicacao($esquerdo, $direito);

$data = new Relogio();
echo $data->getDia()."/".$data->getMes();

echo "<br>";
echo $mult->aceita($impressora)." = ". $mult->avalia();

echo "<br>";

$mapa = new MapLink();
$mapa->getMapa();

?>