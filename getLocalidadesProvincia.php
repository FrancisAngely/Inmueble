<?php
include("controller.php");
$id_provincias = $_POST["id_provincias"];


echo SelectOptionsByColumnActive("localidades", "id", "localidad", "id_provincias", $id_provincias);
