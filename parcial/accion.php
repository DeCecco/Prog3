<?php



require"php/funciones.php";

error_reporting (0);



$foto=$_FILES['archi']; //captura el archivo con un array
$Fname=$_FILES['archi']['name']; //capturo el nombre del archivo
$Ftype=$_FILES['archi']['type']; //capturo el type del archivo
$Fsize=$_FILES['archi']['size']; //capturo el size del archivo
$Fdir=$_FILES['archi']['tmp_name']; //capturo el tmp del archivo



	$nomext=explode(".", $Fname);// separo el array
	$Ndire=$Fname.".".$nomext[1]; // asigno a ndire el nuevo nombre con el nombre de la patente + la extension

	/*------------------*/
	move_uploaded_file($Fdir, "fotos/".$Ndire); 

	$boton1  =$_POST['boton'];	
	$dni= $_POST['dni'];

	

	switch ($boton1) {
    case "cargar":
    	usuario::cargar($Ndire);
    	header("location:index.php"); 
    	break;
    case "ingreso":
    	usuario::validar();
    	break;
     case "borrar":
    	usuario::borrar($dni);


    	break;
}

?>