<?php
$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>sin título</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
</head>

<body>
<form name="datos" method="POST" action="" enctype="multipart/form-data">
<table align="center">
<tr>
<th colspan=2>INGRESO DE DATOS</th>
</tr>
<tr>
<td>Nombre:</td>
<td><input type="text" name="nombre"></td>
</tr>
<tr>
<td>Edad:</td>
<td><input type="text" name="edad"></td>
</tr>
<tr>
<td>Género:</td>
<td>Masculino<input type="radio" name="sexo" value="M">
	Femenino<input type="radio" name="sexo" value="F"></td>
</tr>
<tr>
<td>Foto:</td>
<td><input type="file" name="foto"></td>
</tr>
<tr>
<tr>
<td align="center" colspan=2><input type="submit" name="enviar" Value="GUARDAR"></td>
</tr>
</table>
</form>	
</body>
</html>';

if(isset($_POST['enviar'])){
/*	echo "<pre>";
		print_r($_FILES['foto']);
	echo "</pre>";
	exit;
	* */
if(move_uploaded_file($_FILES['foto']['tmp_name'],"images/p.jpg")){
	$html = '
	<table align="center" border=1>
	<tr>
	<th colspan=2>DATOS DEL CONTACTO</th>
	</tr>
	<tr>
		<td colspan=2 align="center"><img src="images/p.jpg"></td>
	</tr>
	<tr>
		<td>Nombre: </td>
		<td>' . $_POST['nombre'] . '</td>
	</tr>
	<tr>
		<td>Edad: </td>
		<td>' . $_POST['edad'] . '</td>
	</tr>
	<tr>
		<td>Sexo: </td>
		<td>' . $_POST['sexo'] . '</td>
	</tr>	
	</table>';
	echo $html;
}else{
	echo "Error al subir la imagen";
}	

	
}else{
	echo $html;	
}





?>
