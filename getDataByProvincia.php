<?php
// Consulta para obtener localidades
$localidades_query = "SELECT DISTINCT id_localidades, tipo_via, direccion, cp FROM inmuebles WHERE id_provincias = ?";
$stmt = $mysqli->prepare($localidades_query);
$stmt->bind_param("s", $id_provincias); // Cambia a "s" si id_provincias es varchar
$stmt->execute();
$result = $stmt->get_result();

$localidad = '';
$tipo_via = '';
$direccion = '';
$cp = '';

while ($row = $result->fetch_assoc()) {
    $id_localidades .= "<option value='{$row['id_localidades']}'>{$row['id_localidades']}</option>";
    $tipo_via = $row['tipo_via'];
    $direccion = $row['direccion'];
    $cp = $row['cp'];
}

// Devolver el HTML y los valores
echo $id_localidades . '|' . $tipo_via . '|' . $direccion . '|' . $cp;
