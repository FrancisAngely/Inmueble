<?php
include("controller.php");
$proveedores = getById("proveedores", $_GET["id"]);
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
                        <td><?php echo $proveedores["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id Comercios</th>
                        <td><?php echo $proveedores["id_comercios"]; ?></td>
                    </tr>
                    <tr>
                        <th>CIF-NIF-NIE</th>
                        <td><?php echo $proveedores["cif_nif_nie"]; ?></td>
                    </tr>
                    <tr>
                        <th>Razon Social</th>

                        <td><?php echo $proveedores["razonsocial"]; ?></td>
                    </tr>

                    <tr>
                        <th>Direccion</th>
                        <td><?php echo $proveedores["direccion"]; ?></td>
                    </tr>

                    <tr>
                        <th>Codigo Postal</th>

                        <td><?php echo $proveedores["codigopostal"]; ?></td>
                    </tr>
                    <tr>
                        <th>Provincia</th>
                        <td><?php echo $proveedores["provincia"]; ?></td>
                    </tr>

                    <tr>
                        <th>Localidad</th>

                        <td><?php echo $proveedores["localidad"]; ?></td>
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