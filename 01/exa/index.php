<?php


include("funciones.php");


if($_GET['op']=="del"){
	eliminar($_GET['id']);
}elseif($_GET['op']=="new"){
	echo get_form();
}else{
	echo get_list();
}

if(isset($_POST['guardar'])){
	guardar();
}


?>
