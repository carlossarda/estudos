<?php

require_once 'global.php';

$conexao = Conexao::pegarConexao();
$query = "SELECT nome FROM produtos";
$stmt = $conexao->prepare($query);
$stmt->execute();
$row = $stmt->fetch();

while ($row) {
    echo 'Produto:' . $row['nome'] . '<br>';
    $row = $stmt->fetch();
}

echo "<br>";
echo "<p>Outro método</p>";
echo "<br>";


$conexao = Conexao::pegarConexao();
$query = "SELECT nome FROM produtos";
$stmt = $conexao->prepare($query);
$stmt->execute();
$row = $stmt->fetchObject();

while ($row) {
    echo 'Produto:' . $row->nome . '<br>';
    $row = $stmt->fetchObject();
}

echo "<br>";
echo "<p>Retorno de insert ou update</p>";
echo "<br>";

$novo_preco = 12;

$conexao = Conexao::pegarConexao();
$query = "UPDATE produtos SET preco = :preco";
$stmt = $conexao->prepare($query);
$stmt->bindValue(':preco', $novo_preco);
// $stmt->execute();
// echo $stmt->rowCount() . ' Linhas atualizadas!';