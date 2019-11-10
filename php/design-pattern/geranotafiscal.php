<?php
	
	date_default_timezone_set("Brazil/East");

	// require_once "class/AcoesAoGerarNota.php";
	// require_once "class/NotaFiscalBuilder.php";
	// require_once "class/NotaFiscal.php";
	// require_once "class/ItemDaNota.php";
	// require_once "class/Item.php";
	// require_once "class/Impressora.php";
	// require_once "class/NotaFiscalDao.php";
	// require_once "class/EnviaNotaEmail.php";
	// require_once "class/Multiplicador.php";

	function carregaClasse($nomeClasse){
		require_once "class/".$nomeClasse.".php";
	}

	spl_autoload_register("carregaClasse");

	$itens= new ItemDaNota("Compra do orcamento");
	$itens->criaLista(new Item("Tijolo",25, 200));
	$itens->criaLista(new Item("Cimento",50, 8));
	$itens->criaLista(new Item("Madeira",35, 10));
	
	$lista = array(new Impressora(), new NotaFiscalDao(), new EnviaNotaEmail(), new Multiplicador(1.3));

	$geradorNotas = new NotaFiscalBuilder($lista);

	$geradorNotas->comEmpresa("Alura");
	$geradorNotas->comCnpj("1234");
	// $geradorNotas->comObservacoes("Teste geração de notas");
	$geradorNotas->pegaLista($itens);
	// $geradorNotas->naData("22/08/2018 10:00:01");
	// $geradorNotas->setListaDeAcoes(new Impressora());
	// $geradorNotas->setListaDeAcoes(new NotaFiscalDao());
	// $geradorNotas->setListaDeAcoes(new EnviaNotaEmail());
	// $geradorNotas->setListaDeAcoes(new Multiplicador(1.2));

	// $notaFiscal = new NotaFiscal("Alura", "1234", $itens, 500, $imposto, "Venda para reforma", date("Y/m/d H:i:s "));

	$notaFiscal = $geradorNotas->build();

	echo "<pre>";
	print_r($notaFiscal);
	echo "</pre>";