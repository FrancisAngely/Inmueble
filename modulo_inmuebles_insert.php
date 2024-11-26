<?php
include("controller.php");
$tabla = "inmuebles";

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



$datos["created_at"] = date('Y-m-d h:i:s');
$datos["updated_at"] = date('Y-m-d h:i:s');


$inmuebleId = saveV($tabla, $datos);


$upload = UploadFile($_FILES["foto"], "inmuebles", "inmueble_" . $inmuebleId);


if ($upload != "error") {
    $datos["foto"] = $upload;
    //echo updateById($tabla, $datos, $inmuebleId);
} else {
    echo 0;
}
