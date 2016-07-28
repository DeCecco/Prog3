<?php



error_reporting (0);

class usuario{

	public static function cargar($Ndire)
	{
		//$ii= array();

		//usar this para guardar datos
		//echo $this->nombre;
		$nombre =$_POST['nombre'];		
		$correo =$_POST['correo'];
		$edad =$_POST['edad'];
		$clave =$_POST['clave'];
		$dni =$_POST['dni'];
	
	

		//$id=leer();
		//$id=$id+1;

		$id=1;
		$archivo=fopen("archivos/usuario.txt", "a");//escribe y mantiene la informacion existente		
		$ahora=date("Y-m-d H:i:s"); 
		$renglon=$id."|".$nombre."|".$correo."|".$edad."|".$clave."|".$dni."|".$ahora."|".$Ndire."\n";
		fwrite($archivo, $renglon); 		 
		fclose($archivo);
		
	}

		public function validar(){

		$mail =$_POST['mail'];		
		$pass =$_POST['pass'];

		$listado=   array();
		$archivo=fopen("archivos/usuario.txt", "r");//escribe y mantiene la informacion existente

			
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$dato=explode("|", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp

			if ($dato[2]==$mail){
				if($dato[4]==$pass){
					header("location:listado.php"); 
				}
				else{
					echo "error no existis";
				}
			}
			$dato[0]=trim($dato[0]);
			if($dato[0]!="")
				$listado[]=$dato;

		}

		fclose($archivo);
		return $listado;
	}


	public static function traertodos()
	{
		if(file_exists("archivos/usuario.txt"))
			{
				$cadena=" <table border=1><th> ID </th><th> Nombre </th><th> Correo </th><th> Edad </th><th> DNI </th><th> Foto</th>";

				$archivo=fopen("archivos/usuario.txt", "r");

			    while(!feof($archivo))
			    {
				      $archAux=fgets($archivo);
				      //http://www.w3schools.com/php/func_filesystem_fgets.asp
				      $user=explode("|", $archAux);
				      //http://www.w3schools.com/php/func_string_explode.asp
				      $user[0]=trim($user[0]);
				      if($user[0]!="")
				      $cadena =$cadena."<tr> <td> ".$user[0]."</td> <td>  ".$user[1] ."</td> <td>  ".$user[2] ."</td> ";
				      $cadena =$cadena."<td> ".$user[3]."</td> <td>  ".$user[5] ."</td> <td> <img src='fotos/".$user[7] ."' alt=".$user[7]." width='60px' height='60px'></td>  </tr>";
				}

		   		$cadena =$cadena." </table>";

		   		$form="";
$form=$form. " </br></br></br><div>Ingrese el DNI del usuario que desea borrar</div></br></br><form method='post' action='accion.php'><table> ";
$form=$form. " 	<tr><td>dni: </td><td><input type='number' name='dni' id='dni' value=''  placeholder='Ingrese un dni' /></td></tr> ";
$form=$form. " 	<tr><td>     </td><td><input type='submit' name='boton' id='boton' value='borrar'/></td></tr> ";
$form=$form. " </table></form> ";




		   		echo $cadena;
		   		echo $form;
		    	fclose($archivo);

		    	

				


			}	else
			{
				$cadena= "no existen usuarios ";
				
			}
	
	}



	public static function Leer()
	{
		
		$archivo=fopen("archivos/usuario.txt", "r");//escribe y mantiene la informacion existente
		$ultimoID=0;
			
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$user=explode("|", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
			$user[0]=trim($user[0]);		
			$ultimoID=$user[0];	
		}

		
		fclose($archivo);


		return $ultimoID;
		

	}




		public static function GuardarListado($listado)
	{
		$arch=fopen("archivos/usuario.txt","w");//abrimos el
			foreach ($listado as $user) {
				fwrite($arch, $user[0]. "|" . $user[1] ."|". $user[2]."|". $user[3]."|". $user[4] ."|". $user[5] ."|". $user[6]);
				
			}
			fclose($arch);

	
			
	 }

	public static function borrar($dni)
	{
		$listauser= array();
		$ahora=date("Y-m-d H:i:s");

		
		$esta=false;
		$tiempo="";
		$archivo=fopen("archivos/usuario.txt", "r"); 



			
		while (!feof($archivo)) { 

			
			$renglon=fgets($archivo);

			$user=array();
			$user=explode("|", $renglon); 

			if($user[5]==$dni){
							$esta=true;
				
				$tiempo=(strtotime($ahora)-strtotime($user[6]));

				
			}		
			else{
				if($user[5]!=""){

					$listauser[]=$user;	
				}
				
			}	
		}
		
		fclose($archivo);

		if($esta){

			usuario::GuardarListado($listauser);
				# code...
			
		}
		
	
		
	}














}


?>