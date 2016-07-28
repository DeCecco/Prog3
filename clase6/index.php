<?php
/*ABM en txt


crear una clase alumno con las sig propiedades:
 Nombre,
  apellido,
  legajo,
  foto se guarda ej: aellido_nombre_legajo.jpg,solo jpg, menores de 1mb

bool guardar(); si la foot existe se guardan las dos
bool modificar(alumno);
bool borrar(alumno); borra el alumno y su foto
array traertodos();
alumno traerunalumkno(legajo)

validar en js
*/
?>

<html>
<head>
	<title>TEST pre prueba</title>
</head>
<body style="background-color: #b6b6b6">
	<table><tr>
	<form action="accion.php" method="post" enctype="multipart/form-data">
			<tr><td> <div> <a href='insertar.php'>Insertar</a></div></td> </tr>
	
			<tr><td> <div> <a href='borrar.php'>Borrar</a></div></td> </tr>
			<tr><td> <div> <a href='modificar.php'>modificar</a></div></td> </tr>
	</form>
</tr>
	</table>

</body>
</html>
