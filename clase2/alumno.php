<?php

class alumno{

	public $nombre;
	public $apellido;

	public static function mostraralumno($alumno){
		
		$alumno->mostrar();
	}

	function mostrar(){
		
		echo $this->nombre;
		echo $this->apellido;
	}
}


?>