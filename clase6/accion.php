<?php
require"php/funciones.php";

error_reporting (0);


//$foto    =$_POST["botonArchivo"];  //si esta el $_files los toma por ahi (enctype="multipart/form-data")


	$boton1  =$_POST['boton'];	
	$id = $_POST['legajo'];


	switch ($boton1) {
    case "enviar":
       alumno::Guardar();
			header("location:index.php"); 
        break;
    case "listar":
        alumno::traertodos();
		header("location:index.php"); 
        break;
    case "borrar":
       	alumno::borrar($id);
			header("location:index.php"); 
        break;
    case "modificar":
    	alumno::modificar($id);
    	break;
    case "actualizar":
    	alumno::Guardar();
    	header("location:index.php"); 
    	break;
}

	
	/*
	var_dump($_POST);
	echo "<br><br>";
	var_dump($_FILES);
	echo "<br><br>" . $_FILES['botonArchivo']['name'];
	*/
	//var_dump($_POST);
	//$fotoPaso = estacionamiento::guardarFoto();
	//alumno::datos($nombre, $apellido,$legajo);
	//echo "jopa";

//vulve al index





?>
