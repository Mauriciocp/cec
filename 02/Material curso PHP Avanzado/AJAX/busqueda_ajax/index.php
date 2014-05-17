<?php 
require('include/xajax/xajax_core/xajax.inc.php'); 

function conecta(){
	$cn = mysql_connect("localhost","cliente","cli2354");
	mysql_select_db("cliente",$cn);
	mysql_set_charset("utf8",$cn);
}

function busca($values_form) 
{ 
	conecta();
	
	if($values_form['tipo'] == 'nombre'){
		$sql = "SELECT * FROM cliente WHERE nombres LIKE '%" . $values_form['criterio'] . "%';";
	}
	elseif($values_form['tipo'] == 'apellido'){
		$sql = "SELECT * FROM cliente WHERE apellidos LIKE '%" . $values_form['criterio'] . "%';";
	}else{
		$sql = "SELECT * FROM cliente WHERE ci=" . $values_form['criterio'] . ";";
	}
	
	$res = mysql_query($sql);
	$retval = '
		<table align="center" border=1>
			<tr>
				<th>Cédula</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Estado Civil</th>
			</tr>';
	while($cliente = mysql_fetch_array($res)){
		$retval .= '
			<tr>
				<td>'. $cliente['ci'] .'</td>
				<td>'. $cliente['nombres'] .'</td>
				<td>'. $cliente['apellidos'] .'</td>
				<td>'. $cliente['estado_civil'] .'</td>
			</tr>';
		}
    $response = new xajaxResponse(); 
    $response->assign('answer','innerHTML',$retval); 
   
    return $response; 
}
 
function get_html(){ 
	$xajax = new xajax(); 
	$xajax->register(XAJAX_FUNCTION, 'busca'); 
	$xajax->processRequest(); 
	$xajax->printJavascript('include/xajax/');
	$retval = ' 
	<html> 
	<head> 
	<title>Consultas con Xajax</title> 
	</head> 
	<body> 
	<div align="center"> 
	<form action="#" method="post" onsubmit="return false;" id="formulario" name="formulario"> 
	<table align="center" border="0">
	<tr>
		<th>Buscar por:</th>
		<td><select name="tipo" id="tipo">
			<option value="nombre">Por Nombre</option>
			<option value="apellido">Por Apellido</option>
			<option value="ci">Por Cédula de Identidad</option>
		</select></td>
	</tr>
	<tr>
		<th>Ingrese el criterio a buscar: </th>
		<td><input type="text" name="criterio" id="criterio"/>
		<td align="center" colspan="2"><input type="button" onclick="xajax_busca(xajax.getFormValues(\'formulario\'));" id="btnAdd" value="Buscar" /></td> 
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
