<?php
include("controller.php");
$tabla = "localidades";


$datos["cmun"] = $_POST["cmun"];
$datos["localidad"] = $_POST["localidad"];
$datos["dc"] = $_POST["dc"];

$datos["updated_at"] = date('Y-m-d h:i:s');



echo updateById($tabla, $datos, $_POST["id"]);