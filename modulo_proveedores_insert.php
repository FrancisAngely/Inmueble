<?php
include("controller.php");
$tabla = "proveedores";

$datos["id_comercios"] = $_POST["id_comercios"];
$datos["cif_nif_nie"] = $_POST["cif_nif_nie"];
$datos["razonsocial"] = $_POST["razonsocial"];
$datos["direccion"] = $_POST["direccion"];
$datos["codigopostal"] = $_POST["codigopostal"];
$datos["provincia"] = $_POST["provincia"];
$datos["localidad"] = $_POST["localidad"];
$datos["created_at"] = date('Y-m-d h:i:s');
$datos["updated_at"] = date('Y-m-d h:i:s');
// $datos["activo"] = 1;

echo saveV($tabla, $datos);
