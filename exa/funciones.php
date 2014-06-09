<?php

include("conexion.php");

//Tiene todas las funciones para administrar la tabla contacto.



function get_form() {
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

function get_form_csv() {


    if (!empty($_GET[success])) {
        echo "<b>Your file has been imported.</b><br><br>";
    } //generic success notice 
    $html = '
<form action="" method="POST" enctype="multipart/form-data" name="form1" > 
  Choose your file: <br /> 
  <input name="csv" type="file" /> 
  <input type="submit" name="csv" value="Submit" /> 
</form>';

    echo $html;
}

function guardar() {
    $titulo = $_POST['titulo'];
    $anio = $_POST['anio'];
    $editorial = $_POST['editorial'];
    $autor_id = $_POST['autor_id'];

    $sql = "INSERT INTO libro (id,titulo, anio,editorial, autor_id)"
            . " VALUES(NULL,'$titulo','$anio','$editorial','$autor_id');";
    if (mysql_query($sql)) {
        echo "Se guardó correctamente";
        header('Location: http://localhost/cec/exa/index.php');
    } else {
        echo "Error al guardar el registro";
        echo $sql;
    }
}

function guardar_csv() {

    if ($_FILES[csv][size] > 0) {
       // echo "archivo csv enviado ";
        $file = $_FILES[csv][tmp_name]; 
       // echo $file;
        $handle = fopen($file, "r");
        //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            
            $sql = "INSERT INTO libro (id,autor_id,titulo, anio,editorial )"
                                    . " VALUES(NULL, '".addslashes($data[0])."', '".addslashes($data[1])."', '".addslashes($data[2])."', '".addslashes($data[3])."');";  
            
            mysql_query($sql); 
          //  echo $sql;
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    
//        $sql = "INSERT INTO libro (id,autor_id,titulo, anio,editorial ) VALUES(NULL, '" . addslashes($data[0]) . "', '" . addslashes($data[1]) . "', '" . addslashes($data[2]) . "', '" . addslashes($data[3]) . "');";
//        mysql_query($sql);
//        if (mysql_query($sql)) {
//            echo "Se guardó correctamente";
//            header('Location: http://localhost/cec/exa/index.php');
//        } else {
//            echo "Error al guardar el registro";
//            echo $sql;
//        }
//    } else {
//        echo "archivo csv no enviado ";
    }
}

function eliminar($id) {
    $sql = "DELETE FROM biblioteca WHERE id=$id;";
    if (mysql_query($sql)) {
        header("Location:http://localhost/cec/exa/");
    } else {
        echo "error sintaxis sql";
    }
}

function get_list() {
    $sql = "SELECT * FROM libro;";
    $html = '<table border=1 align="center">
	<tr>
		<th colspan="4"><a href="index.php?op=new">Nuevo</a></th>
	</tr>
	<tr>
		<th colspan="4"><a href="index.php?op=csv">Subida en lote</a></th>
	</tr>
	<tr>
		<th colspan="4">LISTA DE LIBROS</th>
	</tr>
	<tr>
		<th>Titulo</th>
		<th>Año</th>
		<th>Editorial</th>
		<th>Autor</th>
		
	</tr>';

    if ($res = mysql_query($sql)) {
        while ($biblioteca = mysql_fetch_array($res)) {
            $html .= '<tr>
			<td>' . $biblioteca['titulo'] . '</td>
			<td>' . $biblioteca['anio'] . '</td>
			<td>' . $biblioteca['editorial'] . '</td>
			<td>' . $biblioteca['autor_id'] . '</td>		
		</tr>';
        }
    } else {
        echo "error sintaxis sql" . mysql_error();
    }

    $html .= '</table>';
    return $html;
}
function get_form_login(){
	$retval = '
	<form name="login" action="" method="POST">
		<table align="center" border=0>
			<tr>
				<th colspan="2">FORMUALRIO DE REGISTRO</th>
			</tr>
			<tr>
				<th>Username: </th>
				<td><input type="text" name="username" size=10></td>
			</tr>
			<tr>
				<th>Password:</th>
				<td><input type="password" name="password" size=10></td>
			</tr>
			<tr>
				<td colspan=2 align="center"><input type="submit" name="login"></td>
			</tr>
		</table>
	</form>';
	
	return $retval;
 }       
function valida_login($username,$password){
	//conecta();
	$sql = 'SELECT * FROM usuarios WHERE username="' . $username . '" AND password="' . $password . '";';
	
	$result = mysql_query($sql);
	if($user=mysql_fetch_array($result)){
		
		return $user;
		
	}else{
		return false;
	}
	mysql_close($cn);
}

?>
