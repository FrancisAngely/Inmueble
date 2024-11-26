<?php

$nombre = $_POST["nombre"];
include("controller.php");

$existe = verificarNombreInmueble($nombre);

if ($existe == 0) {
    echo 1;
} else {
    echo 0;
}
