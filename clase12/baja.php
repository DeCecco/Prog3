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
		
		<script type="text/javascript" src="js/fjs.js"></script>
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
<?php
	session_start();
				 
				if(isset($_SESSION['usuario'])){
					//echo 'hola';
 				
 				?>
				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="logo"><span class="icon fa-diamond"></span></div>
							<h2>Baja y modificaciones de Usuarios</h2>
							<p>Por favor eliga una opcion <a href="#">.</a></p>
							
<?php
								
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
		error_reporting(0);
		$btn=$_POST['enviar'];


//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
		$result = $client->call('listadoUser');
		//echo $btn;
		if ($btn=='Realizar cambio'){
			//echo 'entro';
			error_reporting(0);
				$resultado = $client->call('ModificarUsuario',array($_POST['nombre'],$_POST['email'],$_POST['clave'],$_POST['myid']));
			}
		//var_dump($_POST);
//5.- CHECKEAMOS POSIBLES ERRORES AL INVOCAR AL METODO DEL WS 
		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($result);
			print_r($resultado);
			echo '</pre>';
		} 
		else {// CHECKEAMOS POR POSIBLES ERRORES
			$err = $client->getError();
			if ($err) {//MOSTRAMOS EL ERROR
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {//MOSTRAMOS EL RESULTADO DEL METODO DEL WS.
				echo '<h2>Listado</h2>';
				//echo '<pre>' . var_dump($result) . '</pre>';
				echo '<br/>';


				echo "<table border='1' width='70%' >
						<tr>
							<th>ID</th><th>Nombre</th><th>Clave</th><th>Email</th><th></th><th></th>
						</tr>";
				foreach($result as $user)
				{
					echo "<tr id=".$user['id'].">
							<td id='elegido'>".$user['id']."</td><td>".$user['nombre']."</td><td>".$user['clave']."</td><td>".$user['mail']."</td><td><button  onclick=darlabaja(".$user['id'].")>Baja</button></td><td><button id='modifique' onclick=Modi(".$user['id'].")>Modificar</button></td>
						  </tr>";
				}
				echo '</table>';
				echo '<br/>';

				IF ($btn=='Realizar cambio'){
					echo '<h2>CAMBIO REALIZADO</H2>' ."<br>";
					echo $resultado;
				}
			}
		}
	
	?>
						</div>
					</section>

				

				

			</div>
			<div id='Usbaja'></div>
				<div id='modify'></div>

<div id='Estoypormodificar'>
		<form method='post' action='baja.php'>							
							<table height='100%' width='100%' style="background-color:#000000">
								<tr>
									<td>Nombre: </td><td><input type='text'  id='nombre' name='nombre' style="width:350px" placeholder='Por favor ingrese su Nombre'></td>
								</tr>
								<tr>
									<td>E-Mail</td><td><input type='text'  id='email' name='email' style="width:350px" placeholder='Por favor ingrese su Mail'></td>
								</tr>
								<tr>
									<td>Clave</td><td><input type='password' id='clave' name='clave'  style="width:350px" placeholder='Por favor ingrese su Clave'></td>
								</tr>
								<tr>
									<td></td><td  id='inputhide'   name="inputhide" ></td>
									 <td><button id='btnModif'  id='enviar' name='enviar' value='Realizar cambio' size='60'>Realizar cambio</button></td>
								</tr>
							</table>
							</form>

</div>
<?php
var_dump($_POST);
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
			  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script type="text/javascript">
			$(function() {

				$('#Estoypormodificar').hide();
				$('#inputhide').hide();
				

			});
				function Modi(id){

					$( "#inputhide" ).append('<input type=number id="myid" name="myid" value='+id+' > '+id+' </input>');

					$( '#Estoypormodificar').dialog({
						// autoOpen: false,
						 modal: true,
						 //height:400px,
						// width:400px,
     					 show: {
     					   effect: "blind",
     					   duration: 1000
     					 },
     					 hide: {
     					   effect: "explode",
     					   duration: 1000
     					 }
					});
				}
				
				
				$( "#btnModif" ).click(function() {
				var miid=document.getElementById('myid').value;
					
				//	ModifiUser(miid);
					
				 
				});

				

			</script>
	</body>
</html>