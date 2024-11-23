<?php
include("controller.php");
$tabla = "localidades";

$datos["cmun"] = $_POST["cmun"];
$datos["localidad"] = $_POST["localidad"];
$datos["dc"] = $_POST["dc"];

$datos["created_at"] = date('Y-m-d h:i:s');
$datos["updated_at"] = date('Y-m-d h:i:s');
$datos["activo"] = 1;

echo saveV($tabla, $datos);