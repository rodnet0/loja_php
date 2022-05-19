<?php
	function autoload($nomeClasse){
		require_once("class/".$nomeClasse.".php");
	}	
	spl_autoload_register("autoload");    
?>
