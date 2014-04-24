<?php
include("conexion.php");
//Tiene todas las funciones para administrar la tabla contacto.



function get_form(){
		$html = '
		<form name="contacto" method="POST" action="" enctype="multipart/form-data">
		<table align="center" border=0>
			<tr>
				<th colspan="2">Ingreso de Datos</th>
			</tr>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="nombre" size=10></td>
			</tr>
			<tr>
				<td>Direccion:</td>
				<td><input type="text" name="direccion" size=10></td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><input type="text" name="telefono" size=10></td>
			</tr>
			<tr>
				<td>Fecha:</td>
				<td><input type="text" name="fecha" size=10></td>
			</tr>
			<tr>
				<td>Genero:</td>
				<td>
					M<input type="radio" value=0 name="genero">
					F<input type="radio" value=1 name="genero">
				</td>
			</tr>
			
                        <tr>
				<td>Correo:</td>
				<td><input type="text" name="correo" size=10></td>
			</tr>
                        <tr>
				<td>fotografia:</td>
				<td><input type="file" name="fotografia" ></td>
			</tr>
                        
                        <tr>
				<td colspan="2" align="center">
					<input type="submit" value="Guardar" name="guardar">
				</td>
			</tr>
		</table>
		</form>';
	return $html;
}

function guardar(){
		$nombre = $_POST['nombre'];
		$genero = $_POST['genero'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$fecha = $_POST['fecha'];
		$correo = $_POST['correo'];
		//$fotografia = $_POST['fotografia'];
		$fotografia = $_FILES['fotografia']['name'];
		$sql = "INSERT INTO contacto (id, nombre, genero,direccion, telefono, correo,fechanacimiento,fotografia )"
                                    . " VALUES(NULL,'$nombre','$genero','$direccion','$telefono','$correo','$fecha','$fotografia');";
            
                //$sql = "INSERT INTO contacto (nombre, genero )VALUES(NULL,'$nombre',$genero);";
               // echo $sql;
              //  echo $_FILES['fotografia']['name'];
                //die();
		if(mysql_query($sql)){
                        //move_uploaded_file($fotografia, "images/$fotografia");
                    if(move_uploaded_file($_FILES['fotografia']['tmp_name'],"images/".$fotografia)){
                        
                    }
                        
			header("Location:http://localhost/cec/exa/");
		}else{
			echo "error sintaxis sql";
		}
}

function eliminar($id){
	$sql = "DELETE FROM contacto WHERE id=$id;";
	if(mysql_query($sql)){
			header("Location:http://localhost/cec/exa/");
		}else{
			echo "error sintaxis sql";
		}
}

function get_list(){
	$sql = "SELECT * FROM contacto;";
	$html = '<table border=1 align="center">
	<tr>
		<th colspan="8"><a href="index.php?op=new">Nuevo</a></th>
	</tr>
	<tr>
		<th colspan="8">LISTA DE CONTACTOS</th>
	</tr>
	<tr>
		<th>Nombre</th>
		<th>Dirección</th>
		<th>Telefono</th>
		<th>Fecha</th>
		<th>genero</th>
		<th>Correo</th>
		<th>fotografia</th>
		<th>Accion</th>
	</tr>';
	
	if($res = mysql_query($sql)){
		while($contacto = mysql_fetch_array($res)){
		$g = ($contacto['genero']==1)?"Femenino":"Masculino";
                $img='images/'.$contacto['fotografia'];
		$html .= '<tr>
			<td>'. $contacto['nombre'] .'</td>
			<td>'. $contacto['direccion'].'</td>
			<td>'. $contacto['telefono'].'</td>
			<td>'. $contacto['fechanacimiento'] .'</td>
                        <td>'. $g.'</td>    
			<td> '. $contacto['correo'].'</td>
			<td> <img src="'.$img.'" widht=80 height=100></td>
			
		
			<td align="center"><a href="index.php?op=del&id=' . $contacto['id'] . '"><img src="borrar.png" widht=25px height=25px " /></a></td>
		</tr>';
		}
		}else{
			echo "error sintaxis sql".  mysql_error();
	}
	
	$html .= '</table>';
	return $html;
}
?>
