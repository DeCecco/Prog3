<?php

include 'ferretefacturacion.html' ;


function sumar(){
	$html="";
	echo "SUMANDO";
var_dump($_POST); 
	foreach (isset($_POST) as $key) {

		echo $key;
	}
	return $html;

}

?>