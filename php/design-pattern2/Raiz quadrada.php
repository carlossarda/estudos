<?php
function raiz($valor){
	
	$fator = 2;
	while (pow($fator,2)<$valor){
		$fator = $fator + 0.001;
		// echo $fator;
		// echo "<br>";
	}
	return round($fator,3);
}

for ($i=10; $i<=20; $i++){
	echo $i." = ".raiz($i);
	echo "<br>";
}
?>