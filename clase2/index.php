<html>
<head>
	<title>Clase 2</title>
</head>
<body>

<a>Pablo</a>
<?php

//require 'alumno.php'; //
require_once 'alumno.php';
//require "mascota.php"; require es obligatorio el include solo es un warning
//include_once 'alumno.php'; // lo incluye solo una vez
//include_once

//echo "hola";
$var="su nombre";

$br="<br>";

echo "<h1>$var</h1>";
echo "<h1>".$var."</h1>";
echo '<h1>$var</h1>'; //con comilla simple no funciona
echo $var;

echo "</br></br></br></br>";

$numero=33;

if ($numero<18){

	print "El valor es menor a 18";
	}
else {
	printf ("El valor es mayor a 18") ;
}

echo "<br><br><br>";
$arraynuevo=array('dato1','dato2');

$arraynuevo[]=66;
$arraynuevo[2]=66;



foreach ($arraynuevo as $num) {
	# code...
	echo $num . "<br>";
}
 
$arrayproductos=array("pizza"=>20,"coca"=>15,"faina"=>65);


$arraynuevo["apellido"]="De Cecco";
$arrayproductos["2"]="numero2";
echo var_dump($arraynuevo);
echo $br;
echo var_dump($arrayproductos);

$miobjeto=new stdclass();

$miobjeto -> nombre="pablo";

echo $br.$br;


$miobjeto-> producto=$arrayproductos;

var_dump($miobjeto);


$arraydeobjetos=array();

$arraydeobjetos["nombre"]="pablo";
$arraydeobjetos["apellido"]="De Cecco";
$arraydeobjetos["producto"]=$arrayproductos;

echo $br."1: ";
var_dump($miobjeto);
echo $br.$br."2: ";
var_dump($arraydeobjetos);


$nuevoalumno=new alumno;

$nuevoalumno -> nombre="Pablo";
$nuevoalumno -> apellido="De Cecco";
$var2="pablo";


$nuevoalumno->mostrar();
echo $br;
//$nuevoalumno::mostraralumno($var2);
alumno::mostraralumno($nuevoalumno);

var_dump($nuevoalumno);

?>
</body>
</html>