<?php
include("controller.php");

$tabla = "clientes";

// Asegúrate de que el valor de 'atendido' sea 1 o 0
$datos["id_comercios"] = $_POST["id_comercios"];
$datos["id_provincias"] = $_POST["id_provincias"];
$datos["id_localidades"] = $_POST["id_localidades"];
$datos["cif_nif_nie"] = $_POST["cif_nif_nie"];
$datos["email"] = $_POST["email"];
$datos["id_operadores"] = $_POST["id_operadores"];
$datos["atendido"] = $_POST["atendido"] == 'Sí' ? 1 : 0; // Convierte 'Sí'/'No' a 1/0
$datos["updated_at"] = date('Y-m-d H:i:s'); // Asegúrate de usar el formato correcto de hora (24h)

// Verifica si el ID se está recibiendo correctamente
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    echo updateById($tabla, $datos, $_POST["id"]);
} else {
    echo "Error: ID no recibido.";
}
?>
