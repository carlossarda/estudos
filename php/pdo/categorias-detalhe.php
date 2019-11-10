<?php require_once 'global.php' ?>
<?php

try{
    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->carregarProdutos();
    $lista = $categoria->produtos;
}catch(Exception $e){
    Erro::trataErro($e);
}

?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?= $categoria->id ?></dd>
    <dt>Nome</dt>
    <dd><?= $categoria->nome ?></dd>
    <dt>Produtos</dt>
    <dd>
        <?php if(count($lista)>0):?>
            <?php foreach ($lista as $linha) : ?>
                <ul>
                    <li><a href="produtos-editar.php?id=<?= $linha['id'] ?>"><?= $linha['nome'] ?></a></li>
                </ul>
            <?php endforeach ?>
            <?php else:?>
                <p>Nenhum produto a ser exibido</p>
        <?php endif ?>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
