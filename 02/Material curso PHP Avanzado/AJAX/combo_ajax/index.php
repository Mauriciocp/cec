<?php 
require('include/xajax/xajax_core/xajax.inc.php'); 

function conecta(){
	$cn = mysql_connect("localhost","combo","combo123");
	mysql_select_db("combo",$cn);
	mysql_set_charset("utf8",$cn);
}

function get_combo_provincia($values_form) 
{ 
	conecta();
	$sql = "SELECT * FROM provincia_estado WHERE pais=" . $values_form['pais'] . ";";
	$res = mysql_query($sql);
	$retval ='
		<select name="provincia" id="provincia">
		<option value="">--Seleccione--</option>'; 
	while($provincia = mysql_fetch_array($res)){
		$retval .= '<option value="' . $provincia['id'] . '">' . $provincia['nombre'] . '</option>';
	}
	$retval .= '</select>'; 
    $response = new xajaxResponse(); 
    $response->assign('answer','innerHTML',$retval); 
    return $response; 
    mysql_close($cn);
} 
 
function get_html(){ 
	$xajax = new xajax(); 
	$xajax->register(XAJAX_FUNCTION, 'get_combo_provincia'); 
	$xajax->processRequest(); 
	$xajax->printJavascript('include/xajax/');
	$retval = ' 
		<html> 
			<head> 
			<title>Ajax con Xajax</title> 
			</head> 
			<body> 
				<div align="center"> 
					<form action="" method="post" id="formulario"> 
						<table align="center" border="0">
							<tr>
								<th align="left">Elija el Pais: </th>
								<td OnChange="xajax_get_combo_provincia(xajax.getFormValues(\'formulario\'));">' . get_combo_pais() . '</td>
							</tr>
							<tr>
								<th align="left">Elija una Provincia/Estado:</th>
								<td id="answer"></td>
							</tr>
							<tr>
								<td align="center" colspan="2"><input type="submit" id="btnAdd" value="Guardar" name="btnAdd"/></td> 
							</tr>
						</table> 
					</form>
				</div>
			</body> 
		</html>';
	
	return $retval; 
} 

function get_combo_pais(){
	conecta();
	$sql = "SELECT * FROM pais;";
	$res = mysql_query($sql);
	$retval = '
		<select name="pais" id="pais">
		<option value="">--Seleccione--</option>';
	while($pais = mysql_fetch_array($res)){
	
			$retval .= '<option value="' . $pais['id'] . '">' . $pais["nombre"] . '</option>';	
	}
	$retval .= '</select>';
	return $retval;
	mysql_close($cn);
}
if(isset($_POST['btnAdd'])){
	conecta();
	$sql = "SELECT * FROM pais WHERE id=" . $_POST['pais'] . ";";
	$res = mysql_query($sql);
	$pais = mysql_fetch_array($res);
	$sql1 = "SELECT * FROM provincia_estado WHERE id=" . $_POST['provincia'] . ";";
	$res1 = mysql_query($sql1);
	$provincia = mysql_fetch_array($res1);
	echo '<div align="center">';
	echo '<h3>DATOS ENVIADOS</h3>';
	echo '<b>País: </b>' . $pais['nombre'] . '</br>';
	echo '<b>Provincia/Estado: </b>' . $provincia['nombre'] . '</br>';
	echo '</div>';
}else{
		echo get_html();
}
?>
