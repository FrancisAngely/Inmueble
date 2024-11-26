<?php
include("controller.php");
$tabla = "inmuebles";

if ($_FILES["foto"]["name"] != "") {
    $target = conseguirValor($tabla, "foto", $_POST["id"]);

    borrarArchivo($target);
}

$upload = UploadFile($_FILES["foto"], "inmuebles", "inmueble_" . $_POST["id"]);

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

$datos["updated_at"] = date('Y-m-d h:i:s');

if ($upload != "error") {
    $datos["foto"] = $upload;
} else {
    echo 0;
}


echo updateById($tabla, $datos, $_POST["id"]);
