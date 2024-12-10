<?php
include("controller.php");
$tabla = "provincias";

$datos["provincia"] = $_POST["provincia"];
$datos["updated_at"] = date('Y-m-d h:i:s');
$datos["activo"] = 1;


echo updateById($tabla, $datos, $_POST["id"]);
