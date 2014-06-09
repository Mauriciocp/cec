<?php
include("includes/funciones.php");

if($_GET['op']=='del'){
	borrar($_GET['id']);
}elseif($_GET['op']=='up'){
	echo get_form($_GET['id']);
}elseif($_GET['op']=='new'){
	echo get_form(NULL);
}else{
	echo get_list();
}

if(isset($_POST['guarda'])){
	guardar();
}

?>
