<?php
//Conecta a la Base de Datos
$user = "adm";
$psw = "123";
$servidor = "localhost";
$db = "biblioteca";
// Verificar conección exitósa de base de datos, en caso que la conección no se logrue
// no se podrá realizar nada
if (!$cn = mysql_connect($servidor,$user,$psw)) 
    die('No pudo conectarse: ' . mysql_error());

mysql_select_db($db,$cn);
mysql_set_charset("UTF8");

?>
