<?php
include("controller.php");
$id_localidades = $_POST["id_localidades"];


echo SelectOptionsByColumn("callejero", "id", "cp", "id_localidades", $id_localidades);
