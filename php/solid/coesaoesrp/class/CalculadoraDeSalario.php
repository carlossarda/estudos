<?php 

    class CalculadoraDeSalario {

        public static function calcula(Funcionario $funcionario){
            return $funcionario->getCargo()->calcula($funcionario);
        }

    }

?>