<?php
include('includes/nusoap/lib/nusoap.php');
date_default_timezone_set('America/Guayaquil');

if(isset($_POST['calcula'])){
	$cliente = new nusoap_client('http://localhost/webservice/server.php?wsdl');
	$param = array('num1'=>$_POST['num1'],'num2'=>$_POST['num2'],'op'=>$_POST['op']);
	echo "<h3>El resultado de la operación es:  " . $cliente->call('operaciones',$param) . "</h3>";
}else {
	echo get_form();
}


function get_form(){
	$retval = '
	<form name="operaciones" action="" method="POST">
	<table align="center" border=0>
		<tr>
			<th colspan=2>OPERACIONES</th>
		</tr>
		<tr>
			<th>Ingrese un número: </th>
			<td><input type="text" name="num1" size="2"></td>
		</tr>
		<tr>
			<th>Ingrese otro número: </th>
			<td><input type="text" name="num2" size="2"></td>
		</tr>
		<tr>
			<th>Ingrese la operación a realizar: </th>
			<td>' . get_operaciones() . '</td>
		</tr>
		<tr>
		<td align="center" colspan="2"><input type="submit" name="calcula" value="calcula"></td>
		</tr>  
	</table>
	</form>';
	return $retval;
}
function get_operaciones(){
	$operaciones = array('suma','resta','multiplicacion','division');
	
	$retval = '<select name="op">';
	foreach($operaciones as $op){
		
	$retval .= '<option value="' . $op . '">' . $op . '</option>';	
	
	}
	$retval .= '</select>';
	return $retval;
}

?>
