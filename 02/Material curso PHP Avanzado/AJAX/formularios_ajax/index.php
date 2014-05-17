<?php 
require('include/xajax/xajax_core/xajax.inc.php'); 
function muestra($values_form) 
{ 
	$retval = "Nombre: " . $values_form['nombre'] . "</br>
	Edad: " . $values_form['edad'] . "</br>
	Estado Civil: " . $values_form['estado_civil'] . "</br>"; 
    $response = new xajaxResponse(); 
    $response->assign('answer','innerHTML',$retval); 
   
    return $response; 
} 
 
function get_html(){ 
	$xajax = new xajax(); 
	$xajax->register(XAJAX_FUNCTION, 'muestra'); 
	$xajax->processRequest(); 
	$xajax->printJavascript('include/xajax/');
	$retval = ' 
	<html> 
	<head> 
	<title>Ajax con Xajax</title> 
	</head> 
	<body> 
	<div align="center"> 
	<form action="#" method="post" onsubmit="return false;" id="formulario"> 
	<table align="center" border="0">
	<tr>
		<td>Nombre:</td>
		<td><input type="text" name="nombre" id="nombre"/></td> 
	</tr>
	<tr>
		<td>Edad:</td>
		<td><input type="text" name="edad" id="edad"/></td>
	</tr>
	<tr>
		<td>Estado Civil: </td>
		<td><select name="estado_civil" id="estado_civil">
			<option value="Casado">Casado</option>
			<option value="Soltero">Soltero</option>
			<option value="Divorciado">Divorciado</option>
			<option value="Unidon Libre">Union Libre</option>
			<option value="Viudo">Casado</option>
			</select></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="button" onclick="xajax_muestra(xajax.getFormValues(\'formulario\'));" id="btnAdd" value="Mostrar Ajax" /></td> 
	</tr>
	</table> 
	</form>
	</div> 
	<div>
	<p id="answer"></p>
	</div>
	</body> 
	</html>';
	
	return $retval; 
} 
echo get_html(); 
?>
