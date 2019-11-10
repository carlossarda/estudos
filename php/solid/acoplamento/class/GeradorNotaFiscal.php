<?php 

class GeradorNotaFiscal {
	private $acao;

    public function __construct() {
        $this->acao = array();
    }

    public function gera(Fatura $fatura) {

        $valor = $fatura->getValorMensal();

        $nf = new NotaFiscal($valor,$this->impostoSobreValor($valor));

        foreach ($this->acao as $acao ) {
        	$acao->executa($nf);
        	echo "<br>";
        }

    }

    private function impostoSobreValor($valor) {
        return $valor * 0.06;
    }

    public function addAcao(AcaoGerarNota $acao){
    	$this->acao[] = $acao;
    }

}

 ?>