<?php

$tabla = $_POST["tabla"];
$valor1 = $_POST["valor1"];
$campo1 = $_POST["campo1"];
$valor2 = $_POST["campo2"];
$campo2 = $_POST["campo2"];
$valor3 = $_POST["campo3"];
$campo3 = $_POST["campo3"];
$valor4 = $_POST["campo4"];
$campo4 = $_POST["campo4"];
$valor5 = $_POST["campo5"];
$campo5 = $_POST["campo5"];

include("controller.php");

$existe = getByColum5($tabla, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3, $campo4, $valor4, $campo5, $valor5);
if ($existe == 0) {
    echo 1;
} else {
    echo 0;
}
