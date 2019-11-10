<?php 

class EnviadorDeEmail implements AcaoGerarNota{

    public function executa(NotaFiscal $nf) {
         echo "email enviado";
    }
}

 ?>