<?php

function gentabla($width,$height,$style,$dat){
	$html="";
	$html="<table " ."widh='". $width."' height='".$height ."'" .$style." >".$dat."</table>";
	return $html;
}
function genfila($style,$dat){
	$html="";
	$html="<tr ".$style.">".$dat."</tr>";
	return $html;
}
function gencelda($style,$dat){
	$html="";
	$html="<td ".$style.">".$dat."</td>";
	return $html;
}


function genform($xx,$dat){
	$html="";
	$html="<form action='".$xx."' method='post'>".$dat."</form>";
	return $html;
}
function geninput($datos,$type,$id,$nombre){

	$html="";
	$html=$nombre." <input type='".$type."' nombre='".$id."' id='".$id."'".$datos.">";

	return $html;
}
function head(){
	$html="";
	$html = "<link type'text/css' href='css/style.css' />";
	return $html;
}
function mheader(){



$menu="<div class='mheader'><a href='index.php'>Inicio</a> ";
$menu=$menu . "<a href='registro.php'>Registro</a> ";
$menu=$menu . "<a href='login.php'>Ingresar</a></div>";

$head="<head><link type'text/css' href='css/style.css' /></head>";
$head="";
$html = "";


$html=$head . $html . " <table width='100%' border='0' height='153'> ";
$html=$html . "   <tr class='topheader' height=''> ";
$html=$html . "     <td width='12%' height='53px' align='center' valign='middle' bgcolor='#2B3843'><div class='mheader'>---</div></td> ";
$html=$html . "     <td width='55%' align='center' valign='middle' bgcolor='#2B3843'>&nbsp;</td> ";
$html=$html . "     <td width='33%' align='center' valign='middle' bgcolor='#2B3843'><div class='mheader'>redessociales</div></td> ";
$html=$html . "     <td bgcolor='#2B3843'>search ";
$html=$html . "     </td> ";
$html=$html . "   </tr> ";
$html=$html . "   <tr height=''> ";
$html=$html . "     <td height='127px' align='center' valign='middle' bgcolor='#3E5062'><div class='mheader'>logo</div></td> ";
$html=$html . "     <td colspan='3' align='center' valign='middle' bgcolor='#3E5062'><div class='mheader'>". $menu ."</div></td> ";
$html=$html . "   </tr> ";
$html=$html . " </table> ";


return $html;
}

function footer(){


$menu="<div><a href='index.php'>Inicio</a> ";
$menu=$menu . "<a href='registro.php'>Registro</a> ";
$menu=$menu . "<a href='login.php'>Ingresar</a></div>";



$html="";
$html=$html . " <table width='100%' border='0'> ";
$html=$html . "   <tr class='footer'> ";
$html=$html . "     <td width='22%' height='179' bgcolor='#232323'>&nbsp;</td> ";
$html=$html . "     <td width='45%' bgcolor='#232323'>&nbsp;</td> ";
$html=$html . "     <td width='33%' bgcolor='#232323'>&nbsp;</td> ";
$html=$html . "   </tr> ";
$html=$html . "   <tr> ";
$html=$html . "     <td height='22' bgcolor='#232323' class='design'>Pablo De Cecco</td> ";
$html=$html . "     <td colspan='2' align='right' bgcolor='#232323' class='socialred'>".$menu."</td> ";
$html=$html . "   </tr> ";
$html=$html . " </table> ";

return $html;

}

?>