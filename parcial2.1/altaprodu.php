<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
 
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
							<li><a href="#"><?php error_reporting(0); 	session_start(); echo 'Bienvenido' .' '.$_SESSION['nombre'];?></a></li>
							<li>
								<a href="#">ABM</a>
								<ul>
									<li><a href="altaprodu.php">Alta de Producto</a></li>
									<li><a href="baja.php">Listado de Productos</a></li>
									 
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
							<li><a href="perfil.php">Mi Perfil</a></li>
						<li><a href="deslogin.php" class="button special">Log Out</a></li>
						</ul>
					</nav>
				</header>
				<?php  
session_start();
				if($_SESSION['id']!=''){ 	
   if($_SESSION['tipo']!='comprador'){ ?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Alta de Productos</h2>
							<p>Por favor, complete los campos para continuar.</p>
						</header>
			<form method='post' action='altaprodu.php' enctype="multipart/form-data" >
				<table>
						<tr><td>Nombre: </td><td><input type="text" name="nombre" required></td></tr>
						<tr><td>Porcentaje: </td><td><input type="number" name="porcentaje" minlength="0" maxlength="100" required></td></tr>
						<tr><td></td><td><input type="submit" name="enviar" value="Dar de alta"></td></tr>
				</table>
			</form>
					</div>
					 
				</section>
  <?php
}
								if(isset($_POST['porcentaje'])){
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
		$result = $client->call('altaproducto',array($_POST['nombre'],$_POST['porcentaje']));
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

				echo '<h2>Producto dado de alta correctamente!</h2>';
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










}
else{
	echo '<h1>Usted no posee acceso a esta opcion</h1>';
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