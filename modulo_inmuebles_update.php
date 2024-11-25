<?php
include("controller.php");
$tabla = "inmuebles";

$datos["id"] = $_POST["id"];
$datos["nombre"] = $_POST["nombre"];
$datos["id_provincias"] = $_POST["id_provincias"];
$datos["id_localidades"] = $_POST["id_localidades"];
$datos["tipo_via"] = $_POST["tipo_via"];
$datos["direccion"] = $_POST["direccion"];
$datos["cp"] = $_POST["cp"];
$datos["numero"] = $_POST["numero"];
$datos["piso"] = $_POST["piso"];
$datos["letra"] = $_POST["letra"];
$datos["escalera"] = $_POST["escalera"];
$datos["precio"] = $_POST["precio"];
$datos["habitaciones"] = $_POST["habitaciones"];
$datos["metros_cuadrados"] = $_POST["metros_cuadrados"];
$datos["exterior"] = $_POST["exterior"];
$datos["aseos"] = $_POST["aseos"];
$datos["terraza"] = $_POST["terraza"];
$datos["balcon"] = $_POST["balcon"];
$datos["orientacion"] = $_POST["orientacion"];
$datos["ascensor"] = $_POST["ascensor"];
$datos["descripcion"] = $_POST["descripcion"];
$datos["foto"] = $_POST["foto"];

$datos["updated_at"] = date('Y-m-d h:i:s');

echo updateById($tabla, $datos, $_POST["id"]);
