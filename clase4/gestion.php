<?php


	$patente=$_POST['patente'];
/*	1- si es un ingreso lo guardo en ticket.txt
 	2- si es salida leo el archivo:
 	leer del archivo todos los datos, guardarlos en un array
	si la patente existe en el archivo .
	 sobreescribo el archivo con todas las patentes
	 y su horario si la patente solicitada
	... calculo el costo de estacionamiento a 
	20$ el segundo y lo muestro.
	si la patente no existe mostrar mensaje y 
	el boton que me redirija al index  
	3- guardar todo lo facturado en facturado.txt*/


	$listaestacionado= array();

	//echo $patente;
	echo "<br>";
	$accion=$_POST['estacionar'];

	$ahora=date("Y-m-d H:i:s");
	echo "<br>";

	//echo $patente;

	echo "<br>";
//var_dump($_POST);

	echo "<br>";

	if ($accion=='ingreso'){
		//proceso para ingresar un auto
		echo 'Ingresando Datos';
		
		$archivo=fopen("ticket.txt", "a");//lee archivos en modo appen

		fwrite($archivo, $patente . "|" . $ahora . "\n"); // escribe el archivo ingresando el segundo parametro concatenado con la hora y un espacio
		fclose($archivo);
	}
	else{
		//proceso para sacar el auto si existe en el estacionamiento
		$esta=false;
		$tiempo="";
		echo 'Egreso';
		echo "<br>";
		$archivo=fopen("ticket.txt", "r"); //lee archivos en modo read

		while (!feof($archivo)) { //lee el archivo mientras haya datos

			
			$renglon=fgets($archivo); // devuelve los datos en un renglon

			$auto=array();
			$auto=explode("|", $renglon); // separa el array segun el primer parametro
			//$listaestacionado[]=$auto; //agrega un auto a listaestacionado
			
			if($auto[0]==$patente){
				$esta=true;
				$tiempo=(strtotime($ahora)-strtotime($auto[1]));// strtotime: Transforma el String en Time

				//echo "Tiempo transcurrido: " . $tiempo;
			}		
			else{
				if($auto[0]!=""){

					$listaestacionado[]=$auto;	
				}
				
			}	
		}
		
		fclose($archivo);

		if($esta){
			$arch=fopen("ticket.txt","w");//abrimos el
			foreach ($listaestacionado as $autito) {
				fwrite($arch, $autito[0]. "|" . $autito[1] );
				# code...
			}
			fclose($arch);
		}

		//var_dump($listaestacionado);


		/*while(fread($archivo, $patente)==1){
			echo $patente;
		}*/

	}
			
	

?>
<br>
<br>
<a href="index.php">volver</a>