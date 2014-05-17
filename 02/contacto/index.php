<script type="text/javascript" src="js/js/validar.js"></script>
  <link rel="stylesheet" href="js/dp/jquery-ui.css">
  <script src="js/dp/jquery-1.10.2.js"></script>
  <script src="js/dp/jquery-ui.js"></script>
   <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
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
