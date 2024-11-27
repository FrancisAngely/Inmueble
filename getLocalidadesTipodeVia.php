<?php
include("controller.php");
$id_localidades = $_POST["id_localidades"];


echo SelectOptionsByColumnDistint("callejero", "tipo_via", "tipo_via", "id_localidades", $id_localidades);
