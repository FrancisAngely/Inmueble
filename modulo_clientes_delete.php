<?php

$id=$_POST["id"];


include("controller.php");
echo delById("clientes",$id);

?>