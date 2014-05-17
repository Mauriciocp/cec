<?php

/* Guardamos dentro de la variable retval el código HTML del formulario
Tomer en cuenta lo siguiente:

1.- En el encabezado la inclusión del archivo JavaScript llamado valida.js
2.- En la etiqueta form: onSubmit="return valida(this).
3.- El action es "" lo que significa que se caragará el mismo script
*/

$retval = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
<head>
	<title>Formulario de Resgistro</title>
	<script type="text/javascript" src="js/valida.js"></script>
</head>
<body>
	<form name="datos" action="" method="POST" onSubmit="return valida(this);">
		<table border=0 align="center">
			<tr>
				<th colspan=2>DATOS DEL FORMULARIO</th>
			</tr>
			<tr>
				<th>Nombre:</th>
				<td><input name="nombre" type="text"></td>
			</tr>
			<tr>
				<th>Email:</th>
				<td><input name="email" type="text"</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="envia" value="envia"</td>
			</tr>
		</table>
	</form>
</body>
</html>';

/* Como el action del formulario apunta al mismo scritp, entonces una vez que se envío este, 
 * se genera la variable $_POST['envia']. Lo que hacemos a continuación es verificar si se envío
 * el formulario, esto ocurre cuando pase la validación, entonces presemaos los datos envídos en 
 * el arreglo $_POST. Caso contrario dibujamos el formuario. El formulario siempre se dibujará 
 * la primera vez que se invoque al script ya que no existe el $_POST. */

if(isset($_POST['envia'])){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
}else {
echo $retval;
}
?>
