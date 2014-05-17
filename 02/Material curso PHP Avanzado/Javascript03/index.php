<?php
include('js/constantesjs.php');

$retval = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
<head>
<title>Formulario de Resgistro</title>
<script type="text/javascript" src="js/validar.js"></script>
</head>
<body>
<form name="datos" action="" method="POST" onSubmit="return valida(this);">
<table border=0 align="center">
<tr>
	<th colspan=2>DATOS DEL FORMULARIO</th>
</tr>
<tr>
	<th>Nombre:</th>
	<td ' . JS_ONLY_TEXT . '><input name="nombre" type="text"></td>
</tr>
<tr>
	<th>Teléfono:</th>
	<td ' . JS_ONLY_NUMS . '><input name="telefono" type="text"</td>
</tr>
<tr>
	<th>Correo:</th>
	<td><input name="correo" type="text"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name="envia" value="envia"</td>
</tr>
</table>
</form>
</body>
</html>';

if($_POST['envia']){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
}
echo $retval;

?>
