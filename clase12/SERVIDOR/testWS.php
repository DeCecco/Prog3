<?php 
///***********************************************************************************************///
///COMO PROVEEDOR DEL SERVICIO WEB///
///***********************************************************************************************///

//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
	require_once('../lib/nusoap.php'); 
	require_once('../clases/usuarios.php'); 
	require_once('../clases/AccesoDatos.php'); 	
	
	
//2.- CREAMOS LA INSTACIA AL SERVIDOR
	$server = new nusoap_server(); 

//3.- INICIALIZAMOS EL SOPORTE WSDL (Web Service Description Language)
	$server->configureWSDL('Mi Web Service #6 PDC', 'urn:testWS'); 
	
//4.- REGISTRAMOS EL METODO A EXPONER
	$server->register('login',                	// METODO
				array('usuarios' => 'xsd:cantante','xsd:año'), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);

	$server->register('altausuario',                	// METODO
				array('usuarios' => 'xsd:cantante','xsd:año','xsd:año'), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);

	$server->register('listadoUser',                	// METODO
				array('usuarios' => ''), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);

		$server->register('BajaUser',                	// METODO
				array('usuarios' => 'xsd:id'), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);
		$server->register('ModificarUsuario',                	// METODO
				array('usuarios' => 'xsd:nombre','xsd:mail','xsd:clave','xsd:id'), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);


//5.- DEFINIMOS EL METODO COMO UNA FUNCION PHP

	function ModificarUsuario($nombre,$mail,$clave,$id) {
      
		$user = new usuarios();			
		$user->id=$id;
		$user->nombre=$nombre;
		$user->mail=$mail;
		$user->clave=$clave;
        //return usuarios::TraerUnCd();	


		 		
		return usuarios::Muser($user);
		 
	}
	function BajaUser($id) {
      
		$user = new usuarios();			
		$user->id=$id;
        //return usuarios::TraerUnCd();	
		//return $id;
		return usuarios::BorrarUser($id);
		 
	}
	function listadoUser() {
      

        //return usuarios::TraerUnCd();	


		 		
		return usuarios::ListadoUsuarios();
		 
	}
	function login($mail,$clave) {
      

        //return usuarios::TraerUnCd();	


		$user = new usuarios();			
		$user->mail=$mail;
		$user->clave=$clave;
	
		
		return usuarios::LogueadoP($user);
		 
	}

	function altausuario($nombre,$mail,$clave) {
      

        //return usuarios::TraerUnCd();	


		$user = new usuarios();		
		$user->nombre=$nombre;	
		$user->mail=$mail;
		$user->clave=$clave;
	
		
		return usuarios::AltaUsuario($user);
		 
	}

//6.- USAMOS EL PEDIDO PARA INVOCAR EL SERVICIO
	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	
	$server->service($HTTP_RAW_POST_DATA);


	//$server->service(file_get_contents("php://input"));