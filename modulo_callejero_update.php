<?php
include("controller.php");
$tabla = "callejero";

$datos["id_localidades"] = $_POST["id_localidades"];
$datos["tipo_via"] = $_POST["tipo_via"];
$datos["denominacion"] = $_POST["denominacion"];
$datos["nombre_literal"] = $_POST["nombre_literal"];
$datos["cp"] = $_POST["cp"];
$datos["created_at"] = $_POST["nombre_literal"];
$datos["updated_at"] = date('Y-m-d h:i:s');



echo updateById($tabla, $datos, $_POST["id"]);