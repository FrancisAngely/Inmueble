<?php
include("controller.php");
$localidades = getById("localidades", $_GET["id"]);
?>

<?php
include("files_dompdf/config.php");
ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("files_dompdf/style.php"); ?>
    <style>
    .ficha {
        margin-top: 10pt;
        margin-left: 10pt;

    }

    .ficha th {
        font-size: 18pt;
        padding: 10pt;
        font-weight: 300;
        background: #d2d2d2;
    }

    .ficha td {
        font-size: 18pt;
        padding: 10pt;
        border: 1px solid #d2d2d2;
    }
    </style>
</head>

<body>
    <table class="paginaA4" cellspacing=0 cellpadding=0>
        <?php include("files_dompdf/cabecera.php"); ?>

        <tr class="contenido">
            <td class="contenedor">
                <!-- ficha -->
                <table class="ficha" cellspacing=0 cellpadding=0>
                    <tr>
                        <th>Id:</th>
                        <td><?php echo $localidades["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id Provincia:</th>
                        <td><?php echo $localidades["id_provincias"]; ?></td>
                    </tr>
                    <tr>
                        <th>cmun:</th>
                        <td><?php echo $localidades["cmun"]; ?></td>
                    </tr>
                    <tr>
                        <th>dc:</th>
                        <td><?php echo $localidades["dc"]; ?></td>
                    </tr>
                    <tr>
                        <th>localidad:</th>
                        <td><?php echo $localidades["localidad"]; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php include("files_dompdf/pie.php"); ?>
    </table>


</body>

</html>
<?php
$filename = "Ejemplo.pdf";
include("files_dompdf/generarPDF.php");
?>