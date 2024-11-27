<?php
include("controller.php");
$id = $_POST["id"];


echo SelectOptionsByColumnDistint("callejero", "id", "cp", "id", $id);
