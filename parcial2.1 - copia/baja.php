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
				
							
<?php
								
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
		error_reporting(0);
		$btn=$_POST['boton'];


//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
		$result = $client->call('listadoUser');
		//echo $btn;
		if ($btn=='Baja'){
			//echo 'entro';
			error_reporting(0);
				$resultado = $client->call('BajaUser',array($_POST['id']));
			}
		if ($btn=='Modificar'){
			//echo 'entro';
			error_reporting(0);
				$resultado = $client->call('ModificarUsuario',array($_POST['nombre'],$_POST['email'],$_POST['clave'],$_POST['myid']));
			}
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
				
				//echo '<pre>' . var_dump($result) . '</pre>';
				echo '<br/>';

				echo '<h3>Listado</h3>';
					var_dump($_POST);

				echo "<table border='1' width='70%' >
						<tr>
							<th>ID</th><th>Nombre</th><th>Clave</th><th>Email</th><th></th><th></th>
						</tr>";
				foreach($result as $user)
				{
					echo "<tr>
							<form method='post' action='baja.php' ><td><input required type='text' name='id' value='".$user['id']."' readonly></td>
							<td><input required type='text' name='nombre' value='".$user['nombre']."' readonly></td>
							<td><input required type='text' name='clave' value='".$user['clave']."' readonly></td>
							<td><input required type='text' name='email' value='".$user['mail']."' readonly></td>
							<td><input type='submit' name='boton' value='Baja'></td></form>
							<td><a href='alta.php' type='submit' name='boton' value='alta'>ALTA</a></td>
							<td><button onclick='Modi(".$user['id'].")' name='boton' value='Modificar'>Modificar</button></td>
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
<div id='Estoypormodificar'>
		<form method='post' action='baja.php' enctype="multipart/form-data" >							
							<table height='100%' width='100%' style="background-color:#000000">
								<tr>
									<td>Nombre: </td><td><input type='text' required id='nombre' name='nombre' style="width:350px" placeholder='Por favor ingrese su Nombre'></td>
								</tr>
								<tr>
									<td>E-Mail</td><td><input type='text'  required id='email' name='email' style="width:350px" placeholder='Por favor ingrese su Mail'></td>
								</tr>
								<tr>
									<td>Clave</td><td><input type='password' required id='clave' name='clave'  style="width:350px" placeholder='Por favor ingrese su Clave'></td>
								</tr>
								<tr>
									<td></td><td  id='inputhide'   name="inputhide" ></td>
									 <td><input id='btnModif'  type='submit' id='enviar' name='boton' value='Modificar' size='60'></td>
								</tr>
							</table>
							</form>

</div>
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
						// modal: true,
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