<?php require 'functions.php'; ?>
<html>
<head>
	<title>Login</title>
		<?php echo head();?>
</head>
<?php echo mheader(); ?>
<body>
<!--
	Crear una cuenta en github
	crear 3 repositorios
		1-REPO: Debera tener como minimo 6 comits, en este repositorio subiremos un formulario de registro solicitando datos con distintos controles recordar que el password se pide dos veces, pedir fecha, mail, pagina web,numero, 6 controles mas como minimo para el pedido de datos (input de distinto tipo, select checkbox y radio)
		2-REPO: contendra un formulario de login con un control de tipo password uno de tipo mail un boton que diga ingresar y un boton que diga olvide mi clave 6 comits como minimo
		3-REPO: pagina index del portal
		 dos botones uno que diga login, y otro registrar. Login:mostrar formulario de login
		 registrar: 
		  (YO: agregar menu con enlaces a las otras dos paginas, validar con javascript y subir a mysql)

-->

	<?php

$html="";
$html=$html . " <form action='' method='post'><table width='50%' border='1' align='center'> ";
$html=$html . "   <tr> ";
$html=$html . "     <td align='center' valign='middle'>Mail:</td> ";
$html=$html . "     <td align='center' valign='middle'>".geninput(" value=''","text","mail","")."</td> ";
$html=$html . "   </tr> ";
$html=$html . "   <tr> ";
$html=$html . "     <td align='center' valign='middle'>Pass:</td> ";
$html=$html . "     <td align='center' valign='middle'>".geninput(" value=''","password","pass1","")."</td> ";
$html=$html . "   </tr> ";
$html=$html . "   <tr> ";
$html=$html . "     <td colspan='2' align='center' valign='middle'><a href='#'>¿Olvido su Contraseña?</a></td> ";
$html=$html . "   </tr> ";
$html=$html . "   <tr> ";
$html=$html . "     <td colspan='2' align='center' valign='middle'>".geninput(" value='Enviar'","Submit","btn","")."</td> ";
$html=$html . "   </tr> ";
$html=$html . " </table></form> ";

echo $html;
	?>

	<?php echo footer();?>
</body>
</html>




