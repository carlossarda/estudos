<?php

class UsuarioDao{

	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function buscaUsuario($email, $senha){
		$senhaMD5 = md5($senha);
		$email = mysqli_real_escape_string($this->conexao, $email); #tornar seguro contra sql injection, dado mudança de de tipo no envio do email na hora de logar;
		$query = "select * from usuarios where email = '{$email}' and senha = '{$senhaMD5}'";
		$resultado = mysqli_query ($this->conexao, $query);
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
		 
	}


}


?>