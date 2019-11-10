<?php

require_once "class/Filtro.php";

class FiltroMaiorQue500MilReais extends Filtro {
      public function __construct($outroFiltro = null) {
        parent::__construct($outroFiltro);
      }

      public function filtra($contas) {
       $filtrada = Array();
        foreach($contas as $c) {
          if($c->getSaldo() > 500000) $filtrada[] = $c;
        }

       foreach($this->proximo($contas) as $c)  {
             $filtrada[] = $c;
        }
        return $filtrada;
      }
    }