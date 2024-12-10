<?php
session_start();
if((!isset($_SESSION["valido"]))and($_SESSION["valido"]!="1")){
    header("location:login.php");
}


$archivo=basename($_SERVER['PHP_SELF'],'.php');

$archivosAdmin=array("modulo_usuarios_list","modulo_usuarios_edit","modulo_roles_list","modulo_roles_update");

$archivosAdminUser=array("modulo_usuarios_new");

if (in_array($archivo, $archivosAdmin, true)) {
    if($_SESSION["role"]!="Administrador"){
        
         header("location:index.php");
    }
}
if (in_array($archivo, $archivosAdminUser, true)) {
    if(($_SESSION["role"]!="Administrador")&&($_SESSION["role"]!="Usuario")){
        
         header("location:index.php");
    }
    
    
}
?>