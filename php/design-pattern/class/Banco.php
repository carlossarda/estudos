<?php


class Banco{
	private $nome;
	private $telefone;
	private $endereco;
	private $email;

	public function __construct($nome, $agencia, $telefone, $endereco, $email){
		$this->nome = $nome;
		$this->agencia = $agencia;
		$this->telefone = $telefone;
		$this->endereco = $endereco;
		$this->email = $email;

	}

	public function getNome(){
		return $this->nome;
	}

	public function getAgencia(){
		return $this->agencia;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function getEmail(){
		return $this->email;
	}
}