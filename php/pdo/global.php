<?php

require_once 'classes/config.php';

spl_autoload_register(function($nomeDaClasse) {
        
	if (file_exists('classes/'.$nomeDaClasse.'.php')){
        require_once("classes/".$nomeDaClasse.".php");
	}
});

