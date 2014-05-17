<?php
include("constantes.php");

$retval = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
<head>
	<title>Formulario de Resgistro</title>
	<script type="text/javascript" src="js/bloqueo.js"></script>
</head>
<body>
	<form name="datos" action="" method="POST">
		<table border=0 align="center">
			<tr>
				<th colspan=2>DATOS DEL FORMULARIO</th>
			</tr>
			<tr>
				<th>Nombre:</th>
				<td ' . JS_ONLY_TEXT . '><input name="nombre" type="text"></td>
			</tr>
			<tr>
				<th>Usuario:</th>
				<td ' . JS_ONLY_TEXT_ESP . '><input name="usuario" type="text"</td>
			</tr>
			<tr>
				<th>Cédula:</th>
				<td ' . JS_ONLY_NUMS . '><input name="cedula" type="text"</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="envia" value="envia"</td>
			</tr>
		</table>
	</form>
</body>
</html>';


if(isset($_POST['envia'])){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
}else {
echo $retval;
}
?>
