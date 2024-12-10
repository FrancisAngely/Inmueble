<?php

$id=$_POST["id"];


include("controller.php");
echo delById("proveedores",$id);

?>