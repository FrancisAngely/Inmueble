<?php
include("controller.php");
$clientes = getById("clientes", $_GET["id"]);
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
                        <td><?php echo $clientes["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id Comercios:</th>
                        <td><?php echo $clientes["id_comercios"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id Provincias:</th>
                        <td><?php echo $clientes["id_provincias"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id Localidades:</th>
                        <td><?php echo $clientes["id_localidades"]; ?></td>
                    </tr>
                    <tr>
                        <th>Id Operadores:</th>
                        <td><?php echo $clientes["id_operadores"]; ?></td>
                    </tr>
                    <tr>
                        <th>Atendido:</th>
                        <td class="campo-si-no <?php echo $r["atendido"] === 1 ? 'Si' : 'No'; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>CIF-NIF-NIE:</th>
                        <td><?php echo $clientes["cif_nif_nie"]; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $clientes["email"]; ?></td>
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