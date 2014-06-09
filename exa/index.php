<?php


include("funciones.php");

session_start();
if(isset($_POST['login'])){
	$_SESSION['acceso'] = false;
	$password = sha1($_POST['password']);
	$user = valida_login($_POST['username'],$password);
	if($user != false){
		$_SESSION['acceso'] = true;
	}else{
		
		echo "No existe el usario o contraseña, vuelva a intentarlo";
	}

}
if(	isset($_SESSION['acceso']) && ($_SESSION['acceso']) )  {
if($_GET['op']=="csv"){
    echo get_form_csv();
}
elseif($_GET['op']=="del"){
	eliminar($_GET['id']);
}elseif($_GET['op']=="new"){
	echo get_form();
}else{
	echo get_list();
}

if(isset($_POST['guardar'])){
	guardar();
}
if(isset($_POST['csv'])){
	guardar_csv();
}
}
else echo get_form_login(NULL);

?>
