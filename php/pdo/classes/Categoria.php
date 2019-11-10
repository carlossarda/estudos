<?php

class Categoria
{

    public $id;
    public $nome;
    public $produtos;

    function __construct($id = false){
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar(){
        $query = "SELECT id, nome FROM categorias order by nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir(){
        $query = "INSERT into categorias(nome) VALUES (:nome)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function atualizar(){
        $query = "UPDATE categorias SET nome= :nome WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function carregar(){

        // throw new Exception("Erro ao carregar categorias", 1);

        $query = "SELECT id, nome FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
    }

    public function remover(){
        $query = "DELETE from categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function carregarProdutos(){
        $this->produtos = Produto::categoriaRelacionada($this->id);
    }

    


}