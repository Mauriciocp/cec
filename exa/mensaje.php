<?php
 
$usuario = $_GET['user'];
 
$pass = $_GET['pass'];
 
if (($usuario == "adm") AND ($pass == "1234")){
 
echo "Bienvenido ".$usuario;
 
}Else{
 
echo "usuario o pass incorrectos!";
 
echo '<a href="'.$_SERVER['HTTP_REFERER'].'"</br>Volver</a>';
 
}
 
?>