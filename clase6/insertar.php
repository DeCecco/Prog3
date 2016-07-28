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
	
	<form action="accion.php" method="post" enctype="multipart/form-data">
	<table>
			<tr><td>Nombre:</td><td>  <input name="nombre" id="nombre" type="text" value="" > </td></tr>
			<tr><td> Apellido: </td><td> <input name="apellido" id="apellido" type="text" value="" > </td> </tr>
			<tr><td> Legajo: </td><td> <input name="legajo" id="legajo" type="number" value="" > </td> </tr>
			<tr><td> Foto: </td><td> <input name="foto" id="" type="" value="" > </td> </tr>
			<tr><td></td><td> <input name="boton" id="boton" type="submit" value="enviar" > </td> </tr>
			
	</table>
	</form>
		

<a href='index.php'>volver</a>
</body>
</html>
