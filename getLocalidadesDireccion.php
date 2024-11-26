<?php
include("controller.php");
$id_localidades = $_POST["id_localidades"];


echo SelectOptionsByColumnDistint("callejero", "id_localidades", "nombre_literal", "id_localidades", $id_localidades);
