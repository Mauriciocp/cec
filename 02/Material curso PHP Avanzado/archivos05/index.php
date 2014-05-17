<?php

$arreglo = file('files/directorio.csv');

foreach($arreglo as $fila){
	
	$campos = explode(',',$fila);
	$nombre = $campos[0];
	$edad = $campos[1];
	$profesion = $campos[2];
	$direccion = $campos[3];
	$fono = $campos[4];
	$cel = $campos[5];
	$email = $campos[6];
	
	$contenido .= "INSERT INTO contacto VALUES(NULL,
				  '" . $nombre . "',
				  " . $edad . ",
				  '" . $profesion . "',
				  '" . $direccion . "',
				  '" . $fono . "',
				  '" . $cel . "',
				  '" . trim($email) . "');\n";
	 
}

if(file_put_contents('files/directorio.sql',$contenido,FILE_APPEND | LOCK_EX)){
		
		$mensaje = "La importación de datos fue todo un éxito";
		
	}else{
		
		$mensaje = "La importación fallo";
		die;
	}
echo $mensaje;

?>
