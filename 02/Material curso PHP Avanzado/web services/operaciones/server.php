<?php
require_once('includes/nusoap/lib/nusoap.php');
date_default_timezone_set('America/Guayaquil');

//declaración del objeto servidor de NuSOAP
$servidor = new soap_server();
$servidor->configureWSDL('operaciones', 'urn:operaciones');
//Configuración del WSDL para la función suma
// Registro de la función suma
$URL = "http://localhost/webservice/";
$servidor->register('operaciones', //nombre de la función
					array('num1'=>'xsd:int','num2'=>'xsd:int','op'=>'xsd:string'), //parámetros de entrada
					array('return'=>'xsd:int'), //salida
					$URL); //url donde va ha ser llamado el WS
// Función que realiza la lógica
function operaciones($num1,$num2,$op){
  switch($op){
	  case 'suma': $result = $num1 + $num2;
					break;
	  case 'resta': $result = $num1 - $num2;
					break;
	  case 'multiplicacion': $result = $num1 * $num2;
					break;
	  case 'division': $result = $num1 / $num2;
					break;
	  default: 	echo "La operación no es permitida";
  }						
  return new soapval('return', 'xsd:int',$result);	
}
if ( !isset( $HTTP_RAW_POST_DATA ) )
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
$servidor->service($HTTP_RAW_POST_DATA);
?>
