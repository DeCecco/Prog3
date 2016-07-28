<?php


$html="";



$html=$html. " <form method='post' action='accion.php' enctype='multipart/form-data'><table> ";
$html=$html. " 	<tr><td>Nombre: </td><td><input type='text' name='nombre' id='Nombre' value=''  placeholder='Ingrese un Nombre' /></td></tr> ";
$html=$html. " 	<tr><td>Correo: </td><td><input type='text' name='correo' id='Correo' value=''  placeholder='Ingrese un Correo'/></td></tr> ";
$html=$html. " 	<tr><td>Edad: </td><td><input type='number' name='edad' id='Edad' value='' 	    placeholder='Ingrese una edad'/></td></tr> ";
$html=$html. " 	<tr><td>DNI: </td><td><input type='number' name='dni' id='dni' value='' 	    placeholder='Ingrese un dni'/></td></tr> ";
$html=$html. " 	<tr><td>Clave: </td><td><input type='password' name='clave' id='Clave' value='' placeholder='Ingrese una Clave'/></td></tr> ";
$html=$html. "  <tr><td></td><td><input type='file'  name='archi' id='archi'> </td></tr>";
$html=$html. " 	<tr><td>     </td><td><input type='submit' name='boton' id='boton' value='cargar'/></td></tr> ";
$html=$html. " </table></form> ";


echo $html;
?>