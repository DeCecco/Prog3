<?php 
session_start(); // SIEMPRE DEBE ESTAR ESTA LINEA EN CADA PAGINA PHP DONDE SE QUIERA USAR LA VARIABLE SUPERGLOBAL $_SESSION
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;

if($usuario=="admin@admin.com.ar" && $clave=="admin")
{		
	//CREAR UNA CLASE USUARIO QUE CONTENGA UN METODO QUE VALIDE EL USUARIO. Y REEMPLAZAR ESTE IF
	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}

	$_SESSION['usuario']=$usuario;
	$retorno=" ingreso";

	
}else
{
	$retorno= "No-esta";
}

echo $retorno;
?>