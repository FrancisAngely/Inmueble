<?php
include("controller.php");
$tabla = "provincias";

$datos["provincia"] = $_POST["provincia"];
$datos["created_at"] = date('Y-m-d h:i:s');
$datos["updated_at"] = date('Y-m-d h:i:s');
$datos["activo"] = 1;

echo saveV($tabla, $datos);
