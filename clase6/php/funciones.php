<?php

//$dat="0";

class alumno
{
	var $nombre="sin nombre";
	var $Apellido="sin Apellido";
	var $Legajo="sin Legajo";
	
	public static function Guardar()
	{
		//$ii= array();

		//usar this para guardar datos
		//echo $this->nombre;
		$nombre =$_POST['nombre'];		
		$apellido =$_POST['apellido'];
		$legajo =$_POST['legajo'];
	

		$id=1;
		$archivo=fopen("archivos/dat.txt", "a");//escribe y mantiene la informacion existente		
		$ahora=date("Y-m-d H:i:s"); 
		$renglon=$id."|".$nombre."|".$apellido."|".$legajo."|".$ahora."\n";
		fwrite($archivo, $renglon); 		 
		fclose($archivo);
		
	}
	/*public function datos($nombre,$apellido,$legajo,$foto){
		$nombre=$nombre["nombre"];

	}
	public function guardar2(){

	}*/


	public function traertodos(){

		$listado=   array();
		$archivo=fopen("archivos/dat.txt", "r");//escribe y mantiene la informacion existente

			
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$dato=explode("|", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
			$dato[0]=trim($dato[0]);
			if($dato[0]!="")
				$listado[]=$dato;

		}

		fclose($archivo);
		return $listado;
	}

//fin de traer todos

	

	public static function GuardarListado($listado)
	{
		$arch=fopen("archivos/dat.txt","w");//abrimos el
			foreach ($listado as $alum) {
				fwrite($arch, $alum[0]. "|" . $alum[1] ."|". $alum[2]."|". $alum[3]."|". $alum[4] );
				echo "llego";
			}
			fclose($arch);

	
			
	 }
	//inicio borrar

	public static function borrar($legajo)
	{
		$listaAlumnos= array();
		$ahora=date("Y-m-d H:i:s");

		//proceso para sacar el auto si existe en el estacionamiento
		$esta=false;
		$tiempo="";
		$archivo=fopen("archivos/dat.txt", "r"); //lee archivos en modo read



			echo $legajo;
			echo "<br>";
		while (!feof($archivo)) { //lee el archivo mientras haya datos

			
			$renglon=fgets($archivo); // devuelve los datos en un renglon

			$alumnos=array();
			$alumnos=explode("|", $renglon); // separa el array segun el primer parametro
			//$listaestacionado[]=$auto; //agrega un auto a listaestacionado
			
			//$fot=$alumno[5];

			//echo "<br>";
			//echo $alumnos[3];
			if($alumnos[3]==$legajo){
							$esta=true;
				//	echo "hola";
				$tiempo=(strtotime($ahora)-strtotime($alumnos[4]));// strtotime: Transforma el String en Time

				//estacionamiento::Facturar($legajo,$tiempo);

				//echo "Tiempo transcurrido: " . $tiempo;
			}		
			else{
				if($alumnos[3]!=""){

					$listaAlumnos[]=$alumnos;	
				}
				
			}	
		}
		
		fclose($archivo);

		if($esta){
				echo "1232";
			alumno::GuardarListado($listaAlumnos);
				# code...
			
		}
		
	
		
	}
	//fin borrar
//ini modify

	public static function modificar($legajo)
	{
		$listaAlumnos= array();
		$ahora=date("Y-m-d H:i:s");

		//proceso para sacar el auto si existe en el estacionamiento
		$esta=false;
		$tiempo="";
		$archivo=fopen("archivos/dat.txt", "r"); //lee archivos en modo read



			echo $legajo;
			echo "<br>";
		while (!feof($archivo)) { //lee el archivo mientras haya datos

			
			$renglon=fgets($archivo); // devuelve los datos en un renglon

			$alumnos=array();
			$alumnos=explode("|", $renglon); // separa el array segun el primer parametro
			//$listaestacionado[]=$auto; //agrega un auto a listaestacionado
			
			//$fot=$alumno[5];

			//echo "<br>";
			//echo $alumnos[3];
			if($alumnos[3]==$legajo){
							$esta=true;
				//	echo "hola";
							$asd="<form method='post' action='accion.php'><table>";
							$asd=$asd . "<tr><td>Nombre:</td><td>  <input name='nombre' type='text' value='".$alumnos[1]."'></td></tr>";
							$asd=$asd . "<tr><td>Apellido:</td><td><input name='apellido' type='text' value='".$alumnos[2]."'></td></tr>";
							$asd=$asd . "<tr><td>Legajo:</td><td>  <input name='legajo' type='text' value='".$alumnos[3]."'></td></tr>";
							$asd=$asd . "<tr><td></td><td>         <input name='boton' type='submit' value='actualizar'></td></tr>";
							$asd=$asd . "</table></form>";
							echo $asd;
				$tiempo=(strtotime($ahora)-strtotime($alumnos[4]));// strtotime: Transforma el String en Time

				//estacionamiento::Facturar($legajo,$tiempo);

				//echo "Tiempo transcurrido: " . $tiempo;
			}		
			else{
				if($alumnos[3]!=""){

					$listaAlumnos[]=$alumnos;	
				}
				
			}	
		}
		
		fclose($archivo);

		if($esta){
				echo "1232";
			alumno::GuardarListado($listaAlumnos);
				# code...
			
		}
		
	
		
	}
	//fin modifi
	
		
		


// fin de la clase
}


?>