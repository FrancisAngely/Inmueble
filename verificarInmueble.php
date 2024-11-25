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
$valor6 = $_POST["campo6"];
$campo6 = $_POST["campo6"];
$valor = $_POST["campo7"];
$campo7 = $_POST["campo7"];
$valor8 = $_POST["campo8"];
$campo8 = $_POST["campo8"];
$valor9 = $_POST["campo9"];
$campo9 = $_POST["campo9"];
$valor10 = $_POST["campo10"];
$campo10 = $_POST["campo10"];
$valor11 = $_POST["campo11 "];
$campo11 = $_POST["campo11 "];
$valor12 = $_POST["campo12"];
$campo12 = $_POST["campo12"];
$valor13 = $_POST["campo13"];
$campo13 = $_POST["campo13"];
$valor14 = $_POST["campo14"];
$campo14 = $_POST["campo14"];
$valor15 = $_POST["campo15"];
$campo15 = $_POST["campo15"];
$valor16 = $_POST["campo16"];
$campo16 = $_POST["campo16"];
$valor17 = $_POST["campo17"];
$campo17 = $_POST["campo17"];
$valor18 = $_POST["campo18"];
$campo18 = $_POST["campo18"];
$valor19 = $_POST["campo19"];
$campo19 = $_POST["campo19"];
$valor20 = $_POST["campo20"];
$campo20 = $_POST["campo20"];
$valor21 = $_POST["campo21"];
$campo21 = $_POST["campo21"];
$valor22 = $_POST["campo22"];
$campo22 = $_POST["campo22"];


include("controller.php");

$existe = getByColum4(
    $tabla,
    $campo1,
    $valor1,
    $campo2,
    $valor2,
    $campo3,
    $valor3,
    $campo4,
    $valor4,
    $campo5,
    $valor5,
    $campo6,
    $valor6,
    $campo7,
    $valor7,
    $campo8,
    $valor8,
    $campo9,
    $valor9,
    $campo10,
    $valor10,
    $campo11,
    $valor11,
    $campo12,
    $valor12,
    $campo13,
    $valor13,
    $campo14,
    $valor14,
    $campo15,
    $valor15,
    $campo16,
    $valor16,
    $campo17,
    $valor17,
    $campo18,
    $valor18,
    $campo19,
    $valor19,
    $campo20,
    $valor20,
    $campo21,
    $valor21,
    $campo22,
    $valor22

);
if ($existe == 0) {
    echo 1;
} else {
    echo 0;
}
