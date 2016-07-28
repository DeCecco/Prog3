<?php 
///***********************************************************************************************///
///COMO PROVEEDOR DEL SERVICIO WEB///
///***********************************************************************************************///

//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
	require_once('../lib/nusoap.php'); 
	require_once('../clases/usuarios.php'); 
	require_once('../clases/productos.php'); 
	require_once('../clases/AccesoDatos.php'); 	
	
	
//2.- CREAMOS LA INSTACIA AL SERVIDOR
	$server = new nusoap_server(); 

//3.- INICIALIZAMOS EL SOPORTE WSDL (Web Service Description Language)
	$server->configureWSDL('Mi Web Service #6 PDC', 'urn:testWS'); 
	
//4.- REGISTRAMOS EL METODO A EXPONER
	$server->register('login',                	// METODO
				array('usuarios' => 'xsd:mail','xsd:clave','xsd:nombre'), // PARAMETROS DE ENTRADA
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
		$server->register('altaproducto',                	// METODO
				array('usuarios' => 'xsd:nombre','xsd:porcentaje'), // PARAMETROS DE ENTRADA
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
	$server->register('listadoprodu',                	// METODO
				array('productos' => ''), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);
		$server->register('Listadoss',                	// METODO
				array('usuarios' => ''), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);

		$server->register('BajaProducto',                	// METODO
				array('productos' => 'xsd:id'), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);
		$server->register('ModificarUsuario',                	// METODO
				array('usuarios' => 'xsd:nombre','xsd:mail','xsd:clave','xsd:id','xsd:tipo','xsd:foto'), // PARAMETROS DE ENTRADA
				array('return' => 'xsd:Array'),    		// PARAMETROS DE SALIDA
				'urn:testWS',                			// NAMESPACE
				'urn:testWS#ObtenerCubo',           	// ACCION SOAP
				'rpc',                        			// ESTILO
				'encoded',                    			// CODIFICADO
				'Inserta un CD'   // DOCUMENTACION
			);


//5.- DEFINIMOS EL METODO COMO UNA FUNCION PHP

	function ModificarUsuario($nombre,$mail,$clave,$id,$tipo,$foto) {
      
		$user = new usuarios();			
		$user->id=$id;
		$user->nombre=$nombre;
		$user->mail=$mail;
		$user->clave=$clave;
		$user->tipo=$tipo;
		$user->foto=$foto;
        //return usuarios::TraerUnCd();	


		 		
		return usuarios::Muser($user);
		 
	}
	function listadoUser() {
      

        //return usuarios::TraerUnCd();	


		 		
		return usuarios::ListadoUsuarios();
		 
	}
	function BajaProducto($id) {
      
		$produ = new productos();			
		$produ->id=$id;
        //return usuarios::TraerUnCd();	
		//return $id;
		return productos::BorrarProductoi($id);
		 
	}
	function listadoprodu() {
      

        //return usuarios::TraerUnCd();	


		 		
		return productos::ListadodeProductos();
		 
	}
	function Listadoss() {
      

        //return usuarios::TraerUnCd();	


		 		
		return usuarios::Listadoss();
		 
	}
	function login($mail,$clave,$nombre) {
      

        //return usuarios::TraerUnCd();	


		$user = new usuarios();			
		$user->mail=$mail;
		$user->clave=$clave;
		$user->nombre=$nombre;
	
		
		return usuarios::LogueadoP($user);
		 
	}
	function altaproducto($nombre,$porcentaje) {
      

        //return usuarios::TraerUnCd();	


		$produ = new productos();		
		$produ->nombre=$nombre;	
		$produ->porcentaje=$porcentaje; 
		
		return productos::AltaProductos($produ);
		 
	}

	function altausuario($nombre,$mail,$clave,$dni,$foto) {
      

        //return usuarios::TraerUnCd();	


		$user = new usuarios();		
		$user->nombre=$nombre;	
		$user->mail=$mail;
		$user->clave=$clave;
		$user->dni=$dni;
		$user->foto=$foto;
	
		
		return usuarios::AltaUsuario($user);
		 
	}

//6.- USAMOS EL PEDIDO PARA INVOCAR EL SERVICIO
	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	
	$server->service($HTTP_RAW_POST_DATA);


	//$server->service(file_get_contents("php://input"));