<?php

$valor=$_POST["valor"];
$tabla=$_POST["tabla"];
$campo=$_POST["campo"];

include("controller.php");
$id=desencryptar($_POST["id"]);
$registroAnt=getById($tabla,$id);
$valorAnt=$registroAnt[$campo];

$existe=getByColum($tabla,$campo,$valor);
if($existe==0){
    echo 1;
}else if($valorAnt==$existe[$campo]){
    echo 1; 
}else{
    echo 0;
}
?>