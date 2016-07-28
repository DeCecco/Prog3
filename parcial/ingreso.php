<?php
$html="";
$html=$html. " <form method='post' action='accion.php'><table> ";
$html=$html. " 	<tr><td>Correo: </td><td><input type='text' name='mail' id='mail' value=''  placeholder='Ingrese un Correo' /></td></tr> ";
$html=$html. " 	<tr><td>Clave: </td><td><input type='password' name='pass' id='pass' value=''  placeholder='Ingrese una Clave'/></td></tr> ";
$html=$html. " 	<tr><td>     </td><td><input type='submit' name='boton' id='boton' value='ingreso'/></td></tr> ";
$html=$html. " </table></form> ";

echo $html;
?>