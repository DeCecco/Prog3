<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/usuarios.php");

$queHago=$_POST['queHacer'];
$id=$_POST['id'];

require_once('/lib/nusoap.php');

		$host = 'http://localhost:8080/utn/clase12/SERVIDOR/testWS.php';
		
		$client = new nusoap_client($host . '?wsdl');
		
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}

		

 
switch ($queHago) {
	case 'bajauser':
	$result = $client->call('BajaUser', $id);

	//$result = $client->call('MostrarLogin', array($_POST["txtNumero1"], $_POST["txtNumero2"]));
			//include("partes/formLogin.php");
		break;
	 	case 'modiUser':
	$result = $client->call('ModificarUsuario', $id);

	//$result = $client->call('MostrarLogin', array($_POST["txtNumero1"], $_POST["txtNumero2"]));
			//include("partes/formLogin.php");
		break;
	default:
		# code...
		break;
}


	 if ($client->fault) {
	 		echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
	 		print_r($result);
	 		echo '</pre>';
	 	} else {
	 		$err = $client->getError();
	 		if ($err) {
	 			echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
	 		} 
	 		else {
	 			echo '<h2>Resultado</h2>';
	 			echo '<pre>' . $result . '</pre>';
	 		}
	 	}


 ?>