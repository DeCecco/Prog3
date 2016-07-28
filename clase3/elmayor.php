<html>
<head>
	<title></title>
</head>
<body>
<form method="post">

<div> datos: <input type="text" name="1"></div></br>

<div> datos: <input type="text" name="2"></div></br>

<div> datos: <input type="text" name="3"></div></br>

<div><input type="submit" name="elmayor" value="enviar">
<input type="submit" name="sumador" value="sumador"></div>

</form>
<?php
if(isset($_POST['elmayor'])) { //isset determina si una variable esta definida y no es null

$var1=$_POST['1'];
$var2=$_POST['2'];
$var3=$_POST['3'];

if ($var1>$var2 && $var1>$var3) 
	echo "el mayor es: " . $var1;
elseif ($var2>$var1 && $var2>$var3)
	echo "el mayor es: " .$var2;
elseif ($var3>$var1 && $var3>$var2)
	echo "el mayor es: " .$var3;
}elseif (isset($_POST['sumador'])) {

$var1=$_POST['1'];
$var2=$_POST['2'];
$var3=$_POST['3'];

	echo "</br>";
	echo "La suma es "." : " . ($var1+$var2+$var3);
	echo "</br>";
	# code...
}
	



//var_dump($_POST);	
?>
</body>
</html>