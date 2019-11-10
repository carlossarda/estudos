<?php

spl_autoload_register(function($nomeDaClasse) {
        
	if (file_exists($nomeDaClasse.'.php')){
        require_once($nomeDaClasse.".php");
	}
});

$pedido1 = new Pedido("Marcelo", 200);
$pedido2 = new Pedido("Bianca", 350);
$pedido3 = new Pedido("Alura", 450);
$pedido4 = new Pedido("Carlos", 670);
$pedido5 = new Pedido("Caelum", 500);

$fila = new FilaDeExecucao();
$fila->add(new ComandoPagar($pedido1));
$fila->add(new ComandoPagar($pedido2));
$fila->add(new ComandoPagar($pedido3));
$fila->add(new ComandoPagar($pedido4));
$fila->add(new ComandoFinalizar($pedido5));

$fila->processa();

echo "<pre>";
print_r($pedido1);
echo "</pre>";
?>