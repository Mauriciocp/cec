<?php
include('includes/nusoap/lib/nusoap.php');
date_default_timezone_set('America/Guayaquil');
if(isset($_POST['buscar'])){


	// Create the client instance
	$client = new soapclient('http://localhost/cec/exa/person/server.php');
	// Check for an error
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<p><b>Constructor error: ' . $err . '</b></p>';
		// At this point, you know the call that follows will fail
	}
	// Call the SOAP method
	$parametros = array('ci' => $_POST['ci']);
	$result = $client->call(
		'person', $parametros   // input parameters
	);
	//echo print_client($result);

}else{
	echo get_form();
}

function print_client($res){
	$retval = '
	<table align="center" border=0>
			<tr>
				<th colspan="2">DATOS CLIENTE</th>
			</tr>
			<tr>
				<th align="left">Identificación:</th>
				<th>'. $res['ci'] .'</th>
			</tr>
			<tr>
				<th align="left">Nombres:</th>
				<td>'. $res['nombres'] .'</td>
			</tr>
			<tr>
				<th align="left">Apellidos:</th>
				<td>'. $res['apellidos'] .'</td>
			</tr>
			<tr>
				<th align="left">Estado Civil:</th>
				<td>'. $res['estado_civil'] .'</td>
			</tr>
			<tr>
				<th align="left">Fecha de Nacimiento:</th>
				<td>'. $res['fecha_nacimiento'] .'</td>
			</tr>						
		</table>';
	return $retval;
}
function get_form(){
	$retval = '
	<form name="buscar" action="" method="POST">
		<table>
			<tr>
				<th colspan="2">CONSULTA CLIENTES</th>
			</tr>
			<tr>
				<th>Ingrese Número de Cédula:</th>
				<td><input name="ci" type="text" size=10></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="buscar" value="Buscar"></td>
			</tr>
		</table>
	</form>';
		
	return $retval;
}
?>
