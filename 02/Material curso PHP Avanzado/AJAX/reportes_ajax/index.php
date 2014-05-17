<?php 
require('include/xajax/xajax_core/xajax.inc.php'); 

function conecta(){
	$cn = mysql_connect("localhost","cliente","cli2354");
	mysql_select_db("cliente",$cn);
	mysql_set_charset("utf8",$cn);
}

function detalle($id) 
{ 
	conecta();
	$sql = "SELECT * FROM cliente WHERE id=" . $id . ";";
	$res = mysql_query($sql);
	$cliente = mysql_fetch_array($res);
	$retval = '
	<table>
		<tr>
			<td colspan=2><img src="' . $cliente['foto'] . '"></td>
		</tr>
		<tr>
			<td><b>CI:</b></td>
			<td>'. $cliente['ci'] .'</td>
		</tr>
		<tr>
			<td><b>Nombres:</b></td>
			<td>'. $cliente['nombres'] .'</td>
		</tr>
		<tr>
			<td><b>Apellidos:</b></td>
			<td>'. $cliente['apellidos'] .'</td>
		</tr>
		<tr>
			<td><b>Estado Civil:</b></td>
			<td>'. $cliente['estado_civil'] .'</td>
		</tr>		
	</table>';
    
    $response = new xajaxResponse(); 
    $response->assign('answer','innerHTML',$retval); 
   
    return $response; 
} 
 
function get_html(){ 
	$xajax = new xajax(); 
	$xajax->register(XAJAX_FUNCTION, 'detalle'); 
	$xajax->processRequest(); 
	$xajax->printJavascript('include/xajax/');
	conecta();
	$sql = "SELECT id,nombres,apellidos FROM cliente;";
	$res = mysql_query($sql);

	$retval = ' 
		<html> 
			<head> 
			<title>Ajax con Xajax</title> 
			</head> 
			<body> 
				<div align="center"> 
					<table align="center" border="1">
					<tr>
						<th>Nombres:</th>
						<th>Apellidos</th>
						<th>Acción:</th> 
					</tr>';
	while($cliente = mysql_fetch_array($res)){
		$retval .= "
					<tr>
						<td>". $cliente['nombres'] ."</td>
						<td>". $cliente['apellidos'] ."</td>
						<td><input type=\"button\" OnClick=\"xajax_detalle('" . $cliente['id'] . "');\" id=\"btnAdd\" value=\"Ver Detalle\" /></td>
					</tr>";
	}
	$retval .= '
		</table> 
	</form>
	</div> 
	<div id="answer" align="center"></div>
	</body> 
	</html>';
	
	return $retval; 
} 
echo get_html(); 
?>
