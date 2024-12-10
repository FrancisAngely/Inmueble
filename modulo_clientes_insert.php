<?php
include("controller.php");
$tabla = "clientes";

$datos["id_comercios"] = $_POST["id_comercios"];
$datos["id_provincias"] = $_POST["id_provincias"];
$datos["id_localidades"] = $_POST["id_localidades"];
$datos["cif_nif_nie"] = $_POST["cif_nif_nie"];
$datos["email"] = $_POST["email"];
$datos["id_operadores"] = $_POST["id_operadores"];
$datos["atendido"] = $_POST["atendido"] == '1' ? 1 : 0;
$datos["created_at"] = date('Y-m-d h:i:s');
$datos["updated_at"] = date('Y-m-d h:i:s');
// $datos["activo"] = 1;

echo saveV($tabla, $datos);
