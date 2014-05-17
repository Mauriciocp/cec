<?php
include("class.transporte.inc.php");

class vehiculo extends transporte{
		
		private $id;
		private $marca;
		private $color;
		
		function vehiculo(){
			$this->id = 0;
			$this->marca = "";
			$this->color = "";
		}
		
		public function get_form_vehiculo(){
		$retval = '
			<form name="vehiculo" action="" method="POST">
				<table align="center" border=0>
					<tr>
						<th colspan="2">Manejo de Vehículos</td>
					</tr>
					<tr>
						<th align="left">Tipo de Transporte:</th>
						<td>' . parent::_get_tipo_transporte() . '</td>
					</tr>
					<tr>
						<th align="left">Marca:</th>
						<td>' . $this->_get_marca() . '</td>
					</tr>
					<tr>
						<th align="left">Color:</th>
						<td>' . $this->_get_color() . '</td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="guardar" value="Guardar"></th>
					</tr>
				</table>
			</form>';
			return $retval;
	}
		
	private function _get_marca(){
		
	$marca = array("Chévrolet","Ford","Fiat","Scoda","Toyota","Renault");
	$cont = count($marca);
	
	$retval = '
		<select name="marca">';
		for ($i=0;$i<$cont;$i++){
			$retval .= '<option value="' . $i . '">' . $marca[$i] .  '</option>';
		}
	$retval .= '	</select>';
	
	return $retval;
		
	}
	
	private function _get_color(){
		
	$color = array("Negro","Blanco","Gris","Plata","Verde","Rojo","Azul");
	$cont = count($color);
	
	$retval = '
		<select name="color">';
		for ($i=0;$i<$cont;$i++){
			$retval .= '<option value="' . $i . '">' . $color[$i] .  '</option>';
		}
	$retval .= '	</select>';
	
	return $retval;
		
	}	
		
		
}
?>
