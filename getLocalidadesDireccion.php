<?php
include("controller.php");
$id_localidades = $_POST["id_localidades"];
$tipo_via = $_POST["tipo_via"];


//echo SelectOptionsByColumnDistint("callejero", "id", "nombre_literal", "id_localidades", $id_localidades);
$conditions =
    (object) [
        'id_localidades' => $id_localidades,
        'tipo_via' => $tipo_via,
    ];
echo SelectOptionsByManyConditions("callejero", "id", "nombre_literal", $conditions);
