<?php require 'functions.php'; ?>
<html>
<head>
	<title>Registro</title>
		<?php echo head();?>
</head>
<?php echo mheader(); ?>
<script type="text/javascript">
	//functions validar(){
		//var x=document.GetElementById('apellido');
		//alert(x);
	//}
</script>
<body>

<?php

	$html="";	
	$data="";	
	$formulario="";
	
	//for($i=1;$i<7;$i++){
	$html="";
	$tabla="";
	
	//$html="<table width='100%'>";
	$celda="";
	$fila="";
	$input="";
	echo "<div style='font-size:21px; text-align:center;'>Formulario de Contacto</div></br>";
	$input=geninput("  value=''","text","nombre","");

	$celda= gencelda("align='left' valign='middle' ","Nombre:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);
	$fila=genfila("",$celda);

	$input=geninput("  value=''","text","apellido","");
	$celda= gencelda("align='left' valign='middle' ","Apellido:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=geninput(" value=''","number","telefono","");
	$celda= gencelda("align='left' valign='middle' ","Tel:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=	geninput(" value=''","number","edad","");
	$celda= gencelda("align='left' valign='middle' ","Edad");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=	geninput(" value=''","checkbox","m","Masculino") . geninput(" value=''","checkbox","f","Femenino");
	$celda= gencelda("align='left' valign='middle' ","Genero:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=	geninput(" value=''","number","dni","");
	$celda= gencelda("align='left' valign='middle' ","DNI:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);


	$input=	geninput(" value='DNI'","radio","t1"," DNI") . geninput(" value='CI'","radio","t2","CI") . geninput(" value='LE'","radio","t3","LE");
	$celda= gencelda("align='left' valign='middle' ","Tipo:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);
    
	$input=	geninput(" value=''","text","email","");
	$celda= gencelda("align='left' valign='middle' ","Email:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=	geninput(" value=''","password","pass1","");
	$celda= gencelda("align='left' valign='middle' ","Password:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=	geninput(" value=''","password","pass2","");
	$celda= gencelda("align='left' valign='middle' ","Password:");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);

	$input=	geninput(" value='Recargar'","reset","","") . geninput(" value='Enviar'","Submit","btn","");
	$celda= gencelda("align='left' valign='middle' ","");
	$celda= $celda . gencelda("align='left' valign='middle' ",$input);

	$fila=$fila .genfila("",$celda);


	//$html=$html . "</form>";
	//$html=$html . "</table>";

	
	$tabla= gentabla('70%','',"align=center valign=middle style='align:center; background:#cccccc;' ",$fila);
	$formulario=genform("registro.php",$tabla);

	echo $formulario;
	// $html;

	
			

	//}









	
?>



<?php echo footer();?>
</body>
</html>