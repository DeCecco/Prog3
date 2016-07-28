<!DOCTYPE HTML>
<!--
tablas de usuarios y tipos de usuarios 


	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Solid State by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">Solid State</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index.php">Log In</a></li>	
								<li><a href="alta.php">Alta</a></li>
								<li><a href="baja.php">Baja</a></li>
								<li><a href="modi.php">Modificacion</a></li>
													
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Banner -->
					<?php
	session_start();
				 
				if(isset($_SESSION['usuario'])){
					//echo 'hola';
 				
 				?>
					<section id="banner">
						<div class="inner">
							<div class="logo"><span class="icon fa-diamond"></span></div>
							<h2>Alta de Usuarios</h2>
							<p>Por favor ingrese sus datos <a href="#">.</a></p>
							<form method='post' action='alta.php'>							
							<table>
								<tr>
									<td>Nombre: </td><td><input type='text'  id='nombre' name='nombre' style="width:500px" placeholder='Por favor ingrese su Nombre'></td>
								</tr>
								<tr>
									<td>E-Mail</td><td><input type='text'  id='email' name='email' style="width:500px" placeholder='Por favor ingrese su Mail'></td>
								</tr>
								<tr>
									<td>Clave</td><td><input type='password' id='clave' name='clave'  style="width:500px" placeholder='Por favor ingrese su Clave'></td>
								</tr>
								<tr>
									<td></td><td><input type='submit' id='enviar' name='enviar' value='ALTA' size='60'></td>
								</tr>
							</table>
							</form>
<?php
								if(isset($_POST['clave'])){
///***********************************************************************************************///
///COMO CLIENTE DEL SERVICIO WEB///
///***********************************************************************************************///
		
//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
		require_once('/lib/nusoap.php');

//2.- INDICAMOS URL DEL WEB SERVICE
		$host = 'http://localhost:8080/utn/clase12/SERVIDOR/testWS.php';
		
//3.- CREAMOS LA INSTANCIA COMO CLIENTE
		$client = new nusoap_client($host . '?wsdl');

//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}
		

//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
		$result = $client->call('altausuario',array($_POST['nombre'],$_POST['email'],$_POST['clave']));
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
			/*	echo "<table border='1' width='70%'>
						<tr>
							<th>ID</th><th>Nombre</th><th>Clave</th><th>Email</th>
						</tr>";
				/*foreach($result as $user)
				{
					echo "<tr>
							<td>".$user['id']."</td><td>".$user['nombre']."</td><td>".$user['clave']."</td><td>".$user['mail']."</td>
						  </tr>";
				}*/
				//echo var_dump($result);
				echo '</table>';
				echo '<br/>';
			}
		}
	}
	?>
						</div>
					</section>

				

				

			</div>

			<?php
			}
			else{
				echo '<h1>Debe loguearse para poder ver esta seccion</h1>';
			}
			?>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>