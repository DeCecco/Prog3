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
			
			<tr><td> <div>Legajo: <input name="legajo" id="legajo" type="number" value="" > </div></td> </tr>
			

			
				<tr><td> <div> <input name="boton" id="boton" type="submit" value="modificar" > </div></td> </tr>
	</form>

</tr>
	</table>
	<a href='index.php'>volver</a>
</body>
</html>
