<?php
include("controller.php");
$id_localidades = $_POST["id_localidades"];


echo SelectOptionsByColumnDistint("callejero", "id_localidades", "tipo_via", "id_localidades", $id_localidades);
