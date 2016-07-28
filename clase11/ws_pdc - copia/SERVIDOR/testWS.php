<?php 
///***********************************************************************************************///
///COMO PROVEEDOR DEL SERVICIO WEB///
///***********************************************************************************************///

//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
	require_once('../lib/nusoap.php'); 
	require_once('../clases/cd.php'); 
	require_once('../clases/AccesoDatos.php'); 	
	
	
//2.- CREAMOS LA INSTACIA AL SERVIDOR
	$server = new nusoap_server(); 

//3.- INICIALIZAMOS EL SOPORTE WSDL (Web Service Description Language)
	$server->configureWSDL('Mi Web Service #6 PDC', 'urn:testWS'); 
	
//4.- REGISTRAMOS EL METODO A EXPONER
	$server->register('InsertarElCd',                	// METODO
				array('numero' => 'xsd:titulo','xsd:cantante','xsd:anio'),  			// PARAMETROS DE ENTRADA
				array('return' => 'xsd:int'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);

//5.- DEFINIMOS EL METODO COMO UNA FUNCION PHP
	function InsertarElCd() {

		$obj = array();
		$titulo= isset($_POST['txtTitulo']);
	 	$cantante= isset($_POST['txtCantante']);
	 	$numero= isset($_POST['txtNumero']);
		
		$cd = new cd($obj->titulo,$obj->cantante,$obj->numero);

		var_dump($cd);
		cd::InsertCD();
	}

//6.- USAMOS EL PEDIDO PARA INVOCAR EL SERVICIO
	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	
	$server->service($HTTP_RAW_POST_DATA);
