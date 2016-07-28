<?php
require"clases/estacionamiento.php";

$patente=$_POST['patente'];
$accion=$_POST['estacionar'];

$foto=$_FILES['archi']; //captura el archivo con un array
$Fname=$_FILES['archi']['name']; //capturo el nombre del archivo
$Ftype=$_FILES['archi']['type']; //capturo el type del archivo
$Fsize=$_FILES['archi']['size']; //capturo el size del archivo
$Fdir=$_FILES['archi']['tmp_name']; //capturo el tmp del archivo

echo $fir;

if($accion=="ingreso")
{
	/*echo $Fname;
	echo "<br><br>";
	echo $Ftype;
	echo "<br><br>";
	echo $Fsize;
	echo "<br><br>";
	var_dump($_POST);
	echo "<br><br>";
	var_dump($_FILES);
	*/
	/*------------------*/

	$nomext=explode(".", $Fname);// separo el array
	$Ndire=$patente.".".$nomext[1]; // asigno a ndire el nuevo nombre con el nombre de la patente + la extension

	/*------------------*/
	move_uploaded_file($Fdir, "fotos/".$Ndire); // muevo el archivo al directorio Fotos/"nuevonombre"
	//die();
	/*
	validar que la foto no pese mas de 1 mb
	solo archivos de jpg y png
	si el archivo existe, renombrar el archivo que ya existia con la patente y la hora del momento
	*/
	estacionamiento::Guardar( $patente,$Ndire);

}
else
{
	estacionamiento::Sacar($patente);

		//var_dump($datos);
}

//header("location:index.php");
?>
