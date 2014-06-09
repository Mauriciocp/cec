<?php
include('conexion.php');


function get_form($id){
	if($id==NULL){
		$nombre = NULL;
		$pais = NULL;
	}else {
		$sql = "SELECT * FROM contacto WHERE id=$id;";
		$res = mysql_query($sql);
		$ciudad = mysql_fetch_assoc($res);
		$nombre = $ciudad['nombre'];
		$direccion = $ciudad['direccion'];
		$telefono = $ciudad['telefono'];
		$email = $ciudad['email'];
		$fechanacimiento = $ciudad['fechanacimiento'];
	}
	$html = '
	<form name="ciudad" action="" method="POST" onSubmit="return valida(this);">
	<input type="hidden" name="id" value="' . $id . '">
	<table border="0" align="center">
		<tr>
			<th colspan="2">INGRESO DE DATOS CONTACTOS</th>
		</tr>
		<tr>
			<th>Nombre: </th>
			<td><input type="text" name="nombre" value="' . $nombre . '"></td>
		</tr>
                <tr>
			<th>direccion: </th>
			<td><input type="text" name="direccion" value="' . $direccion . '"></td>
		</tr>
                <tr>
			<th>Telefono: </th>
			<td><input type="text" name="telefono" value="' . $telefono . '"></td>
		</tr>
                <tr>
			<th>Email: </th>
			<td><input type="text" name="email" value="' . $email . '"></td>
		</tr>
                <tr>
			<th>Fecha:</th>
			<td><input type="text" name="fechanacimiento" id="datepicker" value="' . $fechanacimiento . '"size=10></td>
			</tr>
		<tr>
			<th>Pais: </th>
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
        $fecha=date("Y-m-d", strtotime($_POST['fechanacimiento']));
        
    
	$sql = ($_POST['id']==NULL)?"INSERT INTO contacto values(NULL,
							'" . $_POST['nombre'] . "',
							'" . $_POST['direccion'] . "',
							'" . $_POST['telefono'] . "',
							'" . $_POST['email'] . "',
							'" . $_POST['pais'] . "',
							" . $fecha.");":
							"UPDATE contacto 
							SET nombre='" . $_POST['nombre'] . "',
							direccion='" . $_POST['direccion'] . "',
							telefono='" . $_POST['telefono'] . "',
							email='" . $_POST['email'] . "',
							fechanacimiento='" . $fecha. "',
							pais_id=" . $_POST['pais'] ."
							WHERE id=" . $_POST['id'] .";";	

	if(mysql_query($sql)){
		echo "Se guardó correctamente";
		header('Location: http://localhost/cec/02/contacto/index.php');
	}else{
		echo "Error al guardar el registro";
                echo $sql;
                  
	}					
}

function borrar($id){
	$sql = "DELETE FROM contacto WHERE id=$id;";
	if(mysql_query($sql)){
		echo "Se eliminó correctamente";
		header('Location: http://localhost/cec/02/contacto/index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}

function get_list(){
	$sql = "SELECT c.id,c.nombre,c.direccion,c.telefono,c.email,c.fechanacimiento,
            p.nombre as pais 
			FROM contacto c,pais p
			WHERE c.pais_id=p.id ORDER BY nombre;";
       // echo $sql;
        
	$res = mysql_query($sql);
	$html = '<table border=1 align="center">
	<tr>
		<th colspan="8">REPORTE CONTACTOS</th>
	</tr>
	<tr>
		<th colspan="8"><a href="index.php?op=new"><img src="images/new.png"></a></th>
	</tr>
	<tr>
		<th>Nombre</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Email</th>
		<th>Fecha</th>
		<th>País</th>
		<th colspan="5">Acciones</th>
	</tr>';
	
	while($ciudad = mysql_fetch_assoc($res)){
		$html .= '<tr>
			<td>' . $ciudad['nombre'] . '</td>
			<td>' . $ciudad['direccion'] . '</td>
			<td>' . $ciudad['telefono'] . '</td>
			<td>' . $ciudad['email'] . '</td>
			<td>' . $ciudad['fechanacimiento'] . '</td>
			<td>' . $ciudad['pais'] . '</td>
			<td><a href="index.php?op=del&id=' . $ciudad['id'] . '"><img src="images/del.gif"></a></td>
			<td><a href="index.php?op=up&id=' . $ciudad['id'] . '"><img src="images/editar.png"></a></td>
		</tr>';
	}
	
	$html .= '</table>';
	return $html;
}

?>

