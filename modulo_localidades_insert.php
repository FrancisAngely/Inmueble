<?php
include("controller.php");
$tabla = "localidades";

$datos["id_provincias"] = $_POST["id_provincias"];
$datos["cmun"] = $_POST["cmun"];
$datos["dc"] = $_POST["dc"];
$datos["localidad"] = $_POST["localidad"];
$datos["activo"] = 1;
$datos["created_at"] = date('Y-m-d h:i:s');
$datos["updated_at"] = date('Y-m-d h:i:s');

echo saveV($tabla, $datos);
