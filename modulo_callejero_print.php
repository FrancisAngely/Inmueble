<?php
include("controller.php");
$callejero = getById("callejero", $_GET["id"]);
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
                        <td><?php echo $callejero["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id localidades:</th>
                        <td><?php echo $callejero["id_localidades"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tipo de via:</th>
                        <td><?php echo $callejero["tipo_via"]; ?></td>
                    </tr>
                    <tr>
                        <th>Denominacion:</th>
                        <td><?php echo $callejero["denominacion"]; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre Literal:</th>
                        <td><?php echo $callejero["nombre_literal"]; ?></td>
                    </tr>
                    <tr>
                        <th>Codigo Postal:</th>
                        <td><?php echo $callejero["cp"]; ?></td>
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