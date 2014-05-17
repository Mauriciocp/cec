<?php
$retval = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
<head>
	<title>Formulario de Resgistro</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>
</head>
<body>
	<form name="datos" action="" method="POST">
		<table border=0 align="center">
			<tr>
				<th colspan=2>DATOS DEL FORMULARIO</th>
			</tr>
			<tr>
				<th>Nombre:</th>
				<td><input name="nombre" type="text"></td>
			</tr>
			<tr>
				<th>Fecha de Nacimiento:</th>
				<td><input type="text" name="date" class="tcal" value="" size=8 /></td>
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
