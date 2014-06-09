<?php
$user = "ciudad";
$password = "ciudad";
$servidor = "localhost";
$db = "ciudades";
$cn = mysql_connect($servidor, $user, $password);
mysql_select_db($db, $cn);
mysql_set_charset("utf8");
?>
