<?php

	abstract class  transporte {
		
		private $id;
		private $tipo;
		private $capacidad_carga;
		private $capacidad_personas;
		private $codigo;
		
		function transporte($id){
			echo "entra a la clase constructor";
			
			$this->id = $id;
			$this->tipo = 0;
			$this-> capacidad_carga = "";
			$this->capacidad_personas = "";
			$this->codigo = "";
			
		}
	
	public function get_form_transporte(){
		$retval = '
			<form name="trasporte" action="" method="POST">
				<table align="center" border=0>
					<tr>
						<th colspan="2">Manejo de Transporte</td>
					</tr>
					<tr>
						<th align="left">Tipo:</th>
						<td>' .$this->_get_tipo_transporte() . '</td>
					</tr>
					<tr>
						<th align="left">Capacidad de Carga:</th>
						<td><input type="text" name="capacidad_carga" size=4></td>
					</tr>
					<tr>
						<th align="left">Capacidad de Personas:</th>
						<td><input type="text" name="capacidad_personas" size=4></td>
					</tr>
					<tr>
						<th align="left">Código:</th>
						<td><input type="text" name="codigo" size=4></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="guardar" value="Guardar"></th>
					</tr>
				</table>
			</form>';
			return $retval;
	}
	
	protected function _get_tipo_transporte(){
		
	$tipo = array("Aéreo","Terrestre","Marítimo");
	$cont = count($tipo);
	
	$retval = '
		<select name="tipo_transporte">';
		for ($i=0;$i<$cont;$i++){
			$retval .= '<option value="' . $i . '">' . $tipo[$i] .  '</option>';
		}
	$retval .= '	</select>';
	
	return $retval;
		
	}
	
}


?>
