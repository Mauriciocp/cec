<?php
include('conexion.php');

function get_form($id){
	if($id==NULL){
		$nombre = NULL;
		$pais = NULL;
	}else {
		$sql = "SELECT * FROM ciudad WHERE id=$id;";
		$res = mysql_query($sql);
		$ciudad = mysql_fetch_assoc($res);
		$nombre = $ciudad['nombre'];
		$pais = $ciudad['pais'];
	}
	$html = '
	<form name="ciudad" action="" method="POST">
	<input type="hidden" name="id" value="' . $id . '">
	<table border="0" align="center">
		<tr>
			<th colspan="2">INGRESO DE DATOS CIUDADES</th>
		</tr>
		<tr>
			<th>Nombre: </th>
			<td><input type="text" name="nombre" value="' . $nombre . '"></td>
		</tr>
		<tr>
			<th>País: </th>
			<td>' . get_combo_pais($pais) . '</td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" name="guarda" value="Guardar"></th>
		</tr>
		<tr>
			<td colspan=2 align="center"><a href="index.php">Regresar</a></td>
		</tr>
	</table>
	</form>';
	return $html;	
}

function get_combo_pais($id){
	$sql = "SELECT * FROM pais;";
	$res = mysql_query($sql);
	$html = '<select name="pais">' . "\n";
		while($pais=mysql_fetch_array($res)){
			$html .=($id == $pais['id']) ? '<option value="' . $pais['id'] . '" selected>' . $pais['nombre'] . '</option>':
			'<option value="' . $pais['id'] . '">' . $pais['nombre'] . '</option>'. "\n";
		}
	$html .= '</select>'. "\n";
	
	return $html;
}

function guardar(){
	$sql = ($_POST['id']==NULL)?"INSERT INTO ciudad values(NULL,
							'" . $_POST['nombre'] . "',
							" . $_POST['pais'] .");":
							"UPDATE ciudad 
							SET nombre='" . $_POST['nombre'] . "',
							pais=" . $_POST['pais'] ."
							WHERE id=" . $_POST['id'] .";";	

	if(mysql_query($sql)){
		echo "Se guardó correctamente";
		header('Location: http://localhost/ciudad/index.php');
	}else{
		echo "Error al guardar el registro";
	}					
}

function borrar($id){
	$sql = "DELETE FROM ciudad WHERE id=$id;";
	if(mysql_query($sql)){
		echo "Se eliminó correctamente";
		header('Location: http://localhost/ciudad/index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}

function get_list(){
	$sql = "SELECT c.id,c.nombre,p.nombre as pais 
			FROM ciudad c,pais p
			WHERE c.pais=p.id ORDER BY nombre;";
	$res = mysql_query($sql);
	$html = '<table border=1 align="center">
	<tr>
		<th colspan="4">REPORTE CIUDADES</th>
	</tr>
	<tr>
		<th colspan="4"><a href="index.php?op=new"><img src="images/new.png"></a></th>
	</tr>
	<tr>
		<th>Nombre</th>
		<th>País</th>
		<th colspan="2">Acciones</th>
	</tr>';
	
	while($ciudad = mysql_fetch_assoc($res)){
		$html .= '<tr>
			<td>' . $ciudad['nombre'] . '</td>
			<td>' . $ciudad['pais'] . '</td>
			<td><a href="index.php?op=del&id=' . $ciudad['id'] . '"><img src="images/del.gif"></a></td>
			<td><a href="index.php?op=up&id=' . $ciudad['id'] . '"><img src="images/editar.png"></a></td>
		</tr>';
	}
	
	$html .= '</table>';
	return $html;
}
?>

