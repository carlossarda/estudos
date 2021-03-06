<?php require_once 'global.php' ?>

<?php

try{

$lista = Produto::listar();

// echo "<pre>";

// print_r($lista);

// echo "</pre>";
// exit;

}catch(Exception $e){
    Erro::trataErro($e);
}
?>

<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Criar Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if (count($lista)>0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $linha): ?>
                    <tr>

                        <td><?= $linha['id'] ?></td>
                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['preco'] ?></td>
                        <td><?= $linha['quantidade'] ?></td>
                        <td><?= $linha['categoria_nome'] ?></td>
                        <td><a href="produtos-editar.php?id=<?=$linha['id']?>" class="btn btn-info">Editar</a></td>
                        <td><a href="produtos-remover-post.php?id=<?=$linha['id']?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
                <p>Nenhum produto cadastrado.</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
