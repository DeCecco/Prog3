<?php


$V="";
$V="<H1>LLEGO</H1>";
echo $V;

echo "post: ";

$usuario=$_POST['usuario'];
$pass=$_POST['clave'];

var_dump($_POST); //
echo "</br>";
echo "get: ";
var_dump($_GET); //
echo "<br></br>";

if ($usuario=="admin" && $pass=="1234") 
	include 'bienvenido.html';

else
	include 'nologueado.html';




?>

