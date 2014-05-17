<?php 
require('include/xajax/xajax_core/xajax.inc.php'); 
$cn = mysql_connect("localhost","login","login2354");
	mysql_select_db("login");
	mysql_set_charset("utf8",$cn);

function valida($values_form) 
{ 
	$password = sha1($values_form['password']);
	$sql = 'SELECT * FROM usuarios WHERE username="' . $values_form['username'] . '" AND password="' . $password . '";';
	$result = mysql_query($sql);
	if($user=mysql_fetch_array($result)){
	
	$retval = '
		<table align="center" border=0>
			<tr>
				<th colspan="2">EL PROCESO DE LOGIN FUE SATISFACTORIO</th>
			</tr>
			<tr>
				<td><b>Usuario:</b></td>
				<td>' . $user['username'] . '</td>
			</tr>
			<tr>
				<td><b>Nombre Completo:</b></td>
				<td>' . $user['nombre'] . '</td>
			</tr>
			<tr>
				<td><b>Nivel de Acceso:</b></td>
				<td>' . $user['nivel'] . '</td>
			</tr>
		</table>'; 
	}else
	{
		$retval = "El usuario o contraseña no son correctos";
	}
    $response = new xajaxResponse(); 
    $response->assign('answer','innerHTML',$retval); 
   
    return $response; 
} 
 
function get_html(){ 
	$xajax = new xajax(); 
	$xajax->register(XAJAX_FUNCTION, 'valida'); 
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
		<td>Usuario:</td>
		<td><input type="text" name="username" id="username"/></td> 
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" id="password"/></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="button" onclick="xajax_valida(xajax.getFormValues(\'formulario\'));" id="btnAdd" value="Ingresar" /></td> 
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
