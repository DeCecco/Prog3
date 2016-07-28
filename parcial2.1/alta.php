<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php



if(!isset($_FILES["foto"]))
	{
		// no se cargo una imagen
	}
	else
	{
		if($_FILES["foto"]['error'])
		{
			//error de imagen
		}
		else
		{
			$tamanio =$_FILES['foto']['size'];
    		if($tamanio>1024000)
    		{
    				// "Error: archivo muy grande!"."<br>";
    		}
    		else
    		{
    			//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
				//IMAGEN, RETORNA FALSE
				$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
				if($esImagen === FALSE) 
				{
							//NO ES UNA IMAGEN
				}
				else
				{
					$NombreCompleto=explode(".", $_FILES['foto']['name']);
					$Extension=  end($NombreCompleto);
					$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas
					if(!in_array($Extension, $arrayDeExtValida))
					{
					   //"Error archivo de extension invalida";
					}
					else
					{
						//$destino =  "fotos/".$_FILES["foto"]["name"];
						$destino = "fotos/". $_POST['dni'].".".$Extension;
						$foto=$_POST['dni'].".".$Extension;
						//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    					if (move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
    					{		
      						 echo "ok";
      					}
      					else
      					{   
      						// algun error;
      					}



					}

				}
    		}			
		}
	}
?>
<html>
	<head>
		<title>Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">Landed</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="#">ABM</a>
								<ul>
									<li><a href="alta.php">Alta</a></li>
									<li><a href="baja.php">Baja</a></li>
									<li><a href="modificacion.php">Modificacion</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option 1</a></li>
											<li><a href="#">Option 2</a></li>
											<li><a href="#">Option 3</a></li>
											<li><a href="#">Option 4</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="elements.html">Elements</a></li>
							<li><a href="index.php" class="button special">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Alta de Usuarios</h2>
							<p>Por favor, complete los campos para continuar.</p>
						</header>
			<form method='post' action='alta.php' enctype="multipart/form-data" >
				<table>
						<tr><td>nombre: </td><td><input type="text" name="nombre" required></td></tr>
						<tr><td>Email: </td><td><input type="text" name="email" required></td></tr>
						<tr><td>Clave: </td><td><input type="password" name="clave" required></td></tr>
						<tr><td>DNI: </td><td><input style="color: black;" type="number" name="dni" required></td></tr>
						<tr><td>Foto: </td><td><input type="file" name="foto"></td></tr>

						<tr><td></td><td><input type="submit" name="enviar" value="Dar de alta"></td></tr>
				</table>
			</form>
					</div>
					 
				</section>
  <?php
								if(isset($_POST['clave'])){
///***********************************************************************************************///
///COMO CLIENTE DEL SERVICIO WEB///
///***********************************************************************************************///
		
//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
		require_once('/lib/nusoap.php');

//2.- INDICAMOS URL DEL WEB SERVICE
		$host = 'http://localhost:8080/utn/parcial2.1/SERVIDOR/testWS.php';
		
//3.- CREAMOS LA INSTANCIA COMO CLIENTE
		$client = new nusoap_client($host . '?wsdl');

//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}
		
		//var_dump($_POST);
//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
		$result = $client->call('altausuario',array($_POST['nombre'],$_POST['email'],$_POST['clave'],$_POST['dni'],$foto));
		//var_dump($_POST);
//5.- CHECKEAMOS POSIBLES ERRORES AL INVOCAR AL METODO DEL WS 
		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($result);
			echo '</pre>';
		} 
		else {// CHECKEAMOS POR POSIBLES ERRORES
			$err = $client->getError();
			if ($err) {//MOSTRAMOS EL ERROR
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {//MOSTRAMOS EL RESULTADO DEL METODO DEL WS.

				echo '<h2>Usuario dado de alta correctamente!</h2>';
				//echo '<pre>' . var_dump($result) . '</pre>';
				echo '<br/>';
				echo "<table border='1' width='70%'>";
				/*foreach($result as $user)
				{
					echo "<tr>
							<td>".$user['id']."</td><td>".$user['nombre']."</td><td>".$user['clave']."</td><td>".$user['mail']."</td>
						  </tr>";
				}*/
				//echo "<div><h3>Hola ".$result['nombre']." ingresa a la opción que quieras!</h3></div>";
					error_reporting(0);
				session_start();
				$_SESSION['usuario']=true;
				 
			//	echo $result['id'];1
				//var_dump($result);
				
				echo '</table>';
				echo '<br/>';
			}
		}
	}




















	?>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>