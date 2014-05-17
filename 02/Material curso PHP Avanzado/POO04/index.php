<?php
include("include/class.vehiculo.inc.php");

$vehiculo = new vehiculo();

echo $vehiculo->get_form_vehiculo();
echo $vehiculo->get_form_transporte();

?>
