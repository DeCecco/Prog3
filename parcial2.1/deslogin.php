<?php

session_start();

 				$_SESSION['usuario']=NULL;
				$_SESSION['comprador']=NULL;
				$_SESSION['id']=NULL;
				$_SESSION['tipo']=NULL;
				$_SESSION['logueado']=NULL;
				$_SESSION['nombre']=NULL;
				$_COOKIE["mail"]=NULL;
				$_COOKIE["nombre"]=NULL;
				 
				
				session_destroy();
			
				header('Location:index.php');

?>