<?php
 include("controller.php");
$import=$_FILES["fileExcel"];
require_once 'db.php';
require_once('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('spreadsheet-reader-master/SpreadsheetReader.php');
$message="0";
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

if(in_array($import["type"],$allowedFileType)){

        $targetPath = 'uploadsExcel/'.$import['name'];
        
        if(file_exists($targetPath)){
                unlink($targetPath);
            }
        move_uploaded_file($import['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
    
     $query="DELETE FROM provincias";
     $result = $mysqli->query($query);
    
     for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            $fila=0;
            foreach ($Reader as $Row)
            {
                if($fila>0){
                    $j=0;
                     foreach($Row as $r){
                      if($j==0)$id=$r;
                      if($j==1)$role=$r;
                       $j++;
                     }
                    $tabla="provincias";
                    $datos["provincia"]=$role;
                    $datos["created_at"]=date('Y-m-d h:i:s');
                    $datos["updated_at"]=date('Y-m-d h:i:s');

                    saveV($tabla,$datos);
                         
                }
               $fila++; 
            }
         
     }
              
  echo 1; 
}else{echo 0;}
?>