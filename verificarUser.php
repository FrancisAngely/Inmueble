<?php
//SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1

$sql = "SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1";
$sql .= " and `usuario`='" . $usuario . "'";


include("db.php");
$query = $mysqli->query($sql);
if ($query->num_rows > 0) {

    echo 1;
} else {
    echo 0;
}
