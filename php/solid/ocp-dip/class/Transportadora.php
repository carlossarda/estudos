<?php 

class Transportadora implements Transporte{
	public function para($cidade){
		if(strtolower($cidade) == "sao paulo") {
            return 5;
        }

        return 10;
	}
}

?>