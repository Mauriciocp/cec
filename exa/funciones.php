<?php
include("conexion.php");
//Tiene todas las funciones para administrar la tabla contacto.



function get_form(){
		$html = '
		<form name="biblioteca" method="POST" action="" enctype="multipart/form-data">
		<table align="center" border=0>
			<tr>
				<th colspan="2">Datos de libros</th>
			</tr>
			<tr>
				<td>Titulo:</td>
				<td><input type="text" name="titulo" size=10></td>
			</tr>
			<tr>
				<td>Año:</td>
				<td><input type="text" name="anio" size=10></td>
			</tr>
			<tr>
				<td>Editorial:</td>
				<td><input type="text" name="editorial" size=10></td>
			</tr>
			<tr>
				<td>Autor:</td>
				<td><input type="text" name="autor_id" size=10></td>
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
		$titulo = $_POST['titulo'];
		$anio = $_POST['anio'];
		$editorial = $_POST['editorial'];
		$autor_id = $_POST['autor_id'];
		
		$sql = "INSERT INTO biblioteca (titulo, anio,editorial, autor_id)"
                                    . " VALUES(NULL,'$titulo','$anio','$editorial','$autor_id');";
                echo $sql;
                        
}

function eliminar($id){
	$sql = "DELETE FROM biblioteca WHERE id=$id;";
	if(mysql_query($sql)){
			header("Location:http://localhost/cec/exa/");
		}else{
			echo "error sintaxis sql";
		}
}

function get_list(){
	$sql = "SELECT * FROM biblioteca;";
	$html = '<table border=1 align="center">
	<tr>
		<th colspan="8"><a href="index.php?op=new">Nuevo</a></th>
	</tr>
	<tr>
		<th colspan="8">LISTA DE LIBROS</th>
	</tr>
	<tr>
		<th>Titulo</th>
		<th>Año</th>
		<th>Editorial</th>
		<th>Autor</th>
		
	</tr>';
	
	if($res = mysql_query($sql)){
		while($biblioteca = mysql_fetch_array($res)){            
		$html .= '<tr>
			<td>'. $biblioteca['titulo'] .'</td>
			<td>'. $biblioteca['anio'].'</td>
			<td>'. $biblioteca['editorial'].'</td>
			<td>'. $biblioteca['autor_id'] .'</td>
                        
			<td align="center"><a href="index.php?op=del&id=' . $biblioteca['id'] . '"><img src="borrar.png" widht=25px height=25px " /></a></td>
		</tr>';
		}
		}else{
			echo "error sintaxis sql".  mysql_error();
	}
	
	$html .= '</table>';
	return $html;
}
?>
