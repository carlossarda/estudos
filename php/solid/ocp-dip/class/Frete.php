<?php 

class Frete implements Transporte{

    public function para($cidade) {

        if(strtoupper($cidade) == "SAO PAULO") {
            return 15;
        }

        return 30;
    }
}

?>