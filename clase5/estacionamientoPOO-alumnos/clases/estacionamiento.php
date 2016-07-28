<?php

class estacionamiento
{

	public static function Guardar($patente,$foto)
	{

		$archivo=fopen("archivos/estacionados.txt", "a");//escribe y mantiene la informacion existente		
		$ahora=date("Y-m-d H:i:s"); 
		$renglon=$patente."=>".$ahora."=>".$foto."\n";
		fwrite($archivo, $renglon); 		 
		fclose($archivo);

				
	}

	
	public static function Facturar($paten,$time){
		$archivo=fopen("archivos/facturacion.txt", "a");//escribe y mantiene la informacion existente		
		$ahora=date("Y-m-d H:i:s"); 
		$renglon=$paten."=>".$time."\n";
		fwrite($archivo, $renglon); 		 
		fclose($archivo);
	}
	public static function GuardarListado($listado)
	{
		$arch=fopen("archivos/estacionados.txt","w");//abrimos el
			foreach ($listado as $autito) {
				fwrite($arch, $autito[0]. "=>" . $autito[1] ."=>". $autito[2] );
			}
			fclose($arch);

	
			
	 }

	public static function Sacar($patente)
	{
		$listaestacionado= array();
		$ahora=date("Y-m-d H:i:s");

		//proceso para sacar el auto si existe en el estacionamiento
		$esta=false;
		$tiempo="";
		echo 'Egreso';
		echo "<br>";
		$archivo=fopen("archivos/estacionados.txt", "r"); //lee archivos en modo read

		while (!feof($archivo)) { //lee el archivo mientras haya datos

			
			$renglon=fgets($archivo); // devuelve los datos en un renglon

			$auto=array();
			$auto=explode("=>", $renglon); // separa el array segun el primer parametro
			//$listaestacionado[]=$auto; //agrega un auto a listaestacionado
			
			$fot=$auto[2];
			if($auto[0]==$patente){
				$esta=true;
				$tiempo=(strtotime($ahora)-strtotime($auto[1]));// strtotime: Transforma el String en Time

				estacionamiento::Facturar($patente,$tiempo);

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
			
			estacionamiento::GuardarListado($listaestacionado,$tiempo);
				# code...
			
		}
		
	
		
	}
		
	public static function Leer()
	{
		$ListaDeAutosLeida=   array();
		$archivo=fopen("archivos/estacionados.txt", "r");//escribe y mantiene la informacion existente

			
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$auto=explode("=>", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
			$auto[0]=trim($auto[0]);
			if($auto[0]!="")
				$ListaDeAutosLeida[]=$auto;
		}

		fclose($archivo);
		return $ListaDeAutosLeida;
		

	}


	public static function CrearTablaEstacionados()
	{
		if(file_exists("archivos/estacionados.txt"))
			{
				$cadena=" <table border=1><th> patente </th><th> Ingreso </th><th> Foto </th>";

				$archivo=fopen("archivos/estacionados.txt", "r");

			    while(!feof($archivo))
			    {
				      $archAux=fgets($archivo);
				      //http://www.w3schools.com/php/func_filesystem_fgets.asp
				      $auto=explode("=>", $archAux);
				      //http://www.w3schools.com/php/func_string_explode.asp
				      $auto[0]=trim($auto[0]);
				      if($auto[0]!="")
				       $cadena =$cadena."<tr> <td> ".$auto[0]."</td> <td>  ".$auto[1] ."</td> <td>  <img src='fotos/".$auto[2] ."' alt=".$auto[2]." width='60px' height='60px'></td> </tr>";
				}

		   		$cadena =$cadena." </table>";
		    	fclose($archivo);

				$archivo=fopen("archivos/tablaestacionados.php", "w");
				fwrite($archivo, $cadena);




			}	else
			{
				$cadena= "no hay autos estacionados";

				$archivo=fopen("archivos/tablaestacionados.php", "w");
				fwrite($archivo, $cadena);
			}
	
	}

	public static function CrearJSAutocompletar()
	{		
			$cadena="";

			$archivo=fopen("archivos/estacionados.txt", "r");

		    while(!feof($archivo))
		    {
			      $archAux=fgets($archivo);
			      //http://www.w3schools.com/php/func_filesystem_fgets.asp
			      $auto=explode("=>", $archAux);
			      //http://www.w3schools.com/php/func_string_explode.asp
			      $auto[0]=trim($auto[0]);

			      if($auto[0]!="")
			      {
			      	 $auto[1]=trim($auto[1]);
			      $cadena=$cadena." {value: \"".$auto[0]."\" , data: \" ".$auto[1]." \" }, \n"; 
		 


			      }
			}
		    fclose($archivo);

			 $archivoJS="$(function(){
			  var patentes = [ \n\r
			  ". $cadena."
			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});";
			
			$archivo=fopen("js/funcionAutoCompletar.js", "w");
			fwrite($archivo, $archivoJS);
	}

		public static function CrearTablaFacturado()
	{
			if(file_exists("archivos/facturacion.txt"))
			{
				$cadena=" <table border=1><th> patente </th><th> Importe </th>";

				$archivo=fopen("archivos/facturacion.txt", "r");

			    while(!feof($archivo))
			    {
				      $archAux=fgets($archivo);
				      //http://www.w3schools.com/php/func_filesystem_fgets.asp
				      $auto=explode("=>", $archAux);
				      //http://www.w3schools.com/php/func_string_explode.asp
				      $auto[0]=trim($auto[0]);
				      if($auto[0]!="")
				       $cadena =$cadena."<tr> <td> ".$auto[0]."</td> <td>  ".$auto[1] ."</td> </tr>" ; 
				}

		   		$cadena =$cadena." </table>";
		    	fclose($archivo);

				$archivo=fopen("archivos/tablaFacturacion.php", "w");
				fwrite($archivo, $cadena);




			}	else
			{
				$cadena= "no hay facturación";

				$archivo=fopen("archivos/tablaFacturacion.php", "w");
				fwrite($archivo, $cadena);
			}

	}


}


?>