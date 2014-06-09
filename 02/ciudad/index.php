<?php
include("includes/funciones.php");

session_start();
if(isset($_POST['login'])){
	$_SESSION['acceso'] = false;
	$password = sha1($_POST['password']);
	$user = valida_login($_POST['username'],$password);
	if($user != false){
	//if($_POST['username'] == "admin"){
	//	$_SESSION['nivel'] = $user['nivel'];
	//	$_SESSION['nombre'] = $user['nombre'];
	//	echo "Bienvenid@ " . $_SESSION['nombre'] . "</br>";
	//	echo display_menu($_SESSION['nivel']);
		$_SESSION['acceso'] = true;
	}else{
		
		echo "No existe el usario o contraseña, vuelva a intentarlo";
	}

}



if(	isset($_SESSION['acceso']) && ($_SESSION['acceso']) )  {



if(	isset($_GET['op'])){


if($_GET['op']=='del'){
	borrar($_GET['id']);
}elseif($_GET['op']=='up'){
	echo get_form($_GET['id']);
}elseif($_GET['op']=='new'){
	echo get_form(NULL);
}

}
else
	echo get_list();

if(isset($_POST['guarda'])){
	guardar();
}
}
else echo get_form_login(NULL);
?>
