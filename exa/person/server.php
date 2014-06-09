<?php
require_once ('includes/nusoap/lib/nusoap.php');
date_default_timezone_set('America/Guayaquil');
$server = new soap_server();
$server->register('person');
function person($ci) {
	$cn = mysql_connect("localhost","service","1234");
	mysql_select_db("cliente",$cn);
	mysql_set_charset("utf8");
	$sql = "SELECT * FROM cliente WHERE ci='$ci';";
	$res = mysql_query($sql);
	$cliente = mysql_fetch_array($res,MYSQL_ASSOC);
    return new soapval('return', 'ContestInfo', $cliente, false, 'urn:MyURN');
}

if ( !isset( $HTTP_RAW_POST_DATA ) )
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );

$server->service($HTTP_RAW_POST_DATA);
?>
