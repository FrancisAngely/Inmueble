<?php
include("controller.php");
$username = $_POST["username"];
$pass = md5($_POST["pass"]);

$fila = VerificarUsuario($username, $pass);

if ($fila != 0) {
    //usuario valido
    echo session_start();
    $_SESSION["id_roles"] = $fila["id_roles"];
    $filaRole = getById("roles", $fila["id_roles"]);
    $_SESSION["role"] = $filaRole["role"];
    $_SESSION["usuario"] = $fila["usuario"];
    $_SESSION["email"] = $fila["email"];
    $_SESSION["valido"] = "1";
    //print_r($_SESSION);

    echo 1;
} else {
    echo 0;
}
