<?php

require_once 'global.php';

try{
	$produto = new Produto();

	$tipo_roupa = ['Blusa', 'Camisa', 'Camiseta', 'Bermuda', 'Calça', 'Jaqueta'];
	$sexo_roupa = ['Masculina', 'Feminina'];
	$cor_roupa  = ['Preta', 'Vermelha', 'Azul', 'Amarela', 'Verde', 'Branca', 'Marrom', 'Rosa'];

	$i = 0;

	while ( $i<11 ){
		
		$tipo_index = rand(0, 5);
		$sexo_index = rand(0, 1);
		$cor_index  = rand(0, 7);
		$preco_index = rand(99,180);
		$quantidade_index = rand(1,4);

		$roupa = $tipo_roupa[$tipo_index] . ' ' . $sexo_roupa[$sexo_index] . ' ' . $cor_roupa[$cor_index];
		
		$querry = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) VALUES (:nome, :preco, :quantidade, :categoria_id)";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($querry);
		$stmt->bindValue(':nome', $roupa);
		$stmt->bindValue(':preco', $preco_index);
		$stmt->bindValue(':quantidade', $quantidade_index);
		$stmt->bindValue(':categoria_id', 7);
		$stmt->execute();

		echo "$roupa";
		echo "<br>";
		$i++;
	}
}catch(Exception $e){
	Erro::trataErro();
}