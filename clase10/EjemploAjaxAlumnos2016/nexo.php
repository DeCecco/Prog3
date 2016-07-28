<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/cd.php");

$queHago=$_POST['queHacer'];

require_once('../lib/nusoap.php');

		$host = 'http://localhost:8080/clase11/ws_3/SERVIDOR/testWS.php';
		
		$client = new nusoap_client($host . '?wsdl');
		
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}

		

	

switch ($queHago) {
	case 'foto':
		include("partes/imagen.php");
		break;
	case 'video':
			include("partes/video.html");
		break;	
	case 'MostarBotones':

	$result = $client->call('MostarBotones', array($_POST["txtNumero1"], $_POST["txtNumero2"]));
	
			//include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formCd.php");
		break;
	case 'BorrarCD':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cantidad=$cd->BorrarCd();
			echo $cantidad;

		break;
	case 'GuardarCD':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cd->cantante=$_POST['cantante'];
			$cd->titulo=$_POST['titulo'];
			$cd->año=$_POST['anio'];
			$cantidad=$cd->GuardarCD();
			echo $cantidad;

		break;
	case 'TraerCD':
			$cd = cd::TraerUnCd($_POST['id']);		
			echo json_encode($cd) ;

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