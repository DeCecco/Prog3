<?php
//'root'@'localhost'
$hostname="localhost";
$user="root";   
$pass="1234";

//$dbh = new PDO(mysql:host='localhost';dbname='ejemplo','root', '1234');
new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
	$conStr = 'mysql:host = localhost; dbname = ejemplo';
	$pdo = new PDO($conStr);
}
catch(PDOException $e){
	echo 'Error:' .$e->getMessage() . '<br/>';
}


echo 'exito';
$pdo =NULL;

?>