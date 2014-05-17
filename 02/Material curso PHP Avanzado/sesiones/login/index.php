<?php
include("includes/login.php");
session_start();
if(isset($_POST['login'])){
	$password = sha1($_POST['password']);
	$user = valida_login($_POST['username'],$password);
	if($user != false){
		$_SESSION['nivel'] = $user['nivel'];
		$_SESSION['nombre'] = $user['nombre'];
		echo "Bienvenid@ " . $_SESSION['nombre'] . "</br>";
		echo display_menu($_SESSION['nivel']);
	}else{
		
		echo "No existe el usario o contraseña, vuelva a intentarlo";
	}
}elseif (isset($_GET['menu']) && $_SESSION['nivel'] != NULL){
	echo "Usuari@ " . $_SESSION['nombre'] . "</br>";
	echo display_menu($_SESSION['nivel']);
}else
{
	echo get_form_login();
}
?>
