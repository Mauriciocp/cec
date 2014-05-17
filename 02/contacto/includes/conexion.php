<?php
$user = "contactos";
$password = "contactos";
$servidor = "localhost";
$db = "contactos";
if (!$cn = mysql_connect($servidor,$user,$password)) 
    die('No pudo conectarse: ' . mysql_error());
mysql_select_db($db, $cn);
mysql_set_charset("utf8");
?>
