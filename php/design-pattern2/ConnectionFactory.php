<?php

class ConnectionFactory{
	public static function getConnection(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$banco = "alura";

		$conexao = false;

		$banco = parse_ini_file("config.ini");
		$banco = $banco["tipoBanco"];

		if ($banco == 'mysqli') {
			$conexao = mysqli_connect($host, $user, $pass, $banco);
		}else if ($banco == 'pg') {
			$con_string = "host=". $host . " user=" . $user . " password=" . $pass . " dbname=" . $banco;
			$conexao = pg_connect($con_string);
		}else{
			echo "Erro de driver";
		}

		return $conexao;

	}

}