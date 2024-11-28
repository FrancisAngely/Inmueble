<?php
include("controller.php");

$inmuebles = getAllV("inmuebles");
$provincias = getAllV("provincias");
$localidades = getAllV("localidades");
$callejero = getAllV("callejero");

if (count($inmuebles) > 0) {
    foreach ($inmuebles as $r) {
        $found_key = array_search($r["id_provincias"], array_column($provincias, 'id'));
        $provinciaNombre = $found_key !== true ? $provincias[$found_key]['provincia'] : 'No disponible';

        $key = array_search($r["id_localidades"], array_column($localidades, 'id'));
        $localidadNombre = $key !== true ? $localidades[$key]['localidad'] : 'No disponible';

        $key2 = array_search($r["id"], array_column($callejero, 'id'));
        $tipoVia = $key2 !== true ? $callejero[$key2]['tipo_via'] : 'No disponible';

        $key3 = array_search($r["id"], array_column($callejero, 'id'));
        $direccion = $key3 !== true ? $callejero[$key3]['nombre_literal'] : 'No disponible';

        $key4 = array_search($r["id"], array_column($callejero, 'id'));
        $cp = $key4 !== true ? $callejero[$key4]['cp'] : 'No disponible';

    }}

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
                        <th>Id</th>
                        <td><?php echo $r["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>nombre</th>
                        <td><?php echo $r["nombre"]; ?></td>
                    </tr>
                            <tr>
                        <th>Provincias</th>
                        <td><?php echo $provinciaNombre; ?></td>
                    </tr>
                    <tr>
                        <th>Localidades</th>
                        <td><?php echo $localidadNombre; ?></td>
                    </tr>
                    <tr>
                        <th>tipo Via</th>
                        <td><?php echo $tipoVia; ?></td>
                    </tr>
                    <tr>
                        <th>Direccion</th>
                        <td><?php echo $direccion; ?></td>
                    </tr>
                    <tr>
                        <th>Codigo Postal</th>
                        <td><?php echo $cp; ?></td>
                    </tr>

                   <!-- <tr>
                        <th>piso</th>
                        <td><?php echo $r["piso"]; ?></td>
                    </tr>
                    <tr>
                        <th>letra</th>
                        <td><?php echo $r["letra"]; ?></td>
                    </tr>
                    <tr>
                        <th>escalera</th>
                        <td><?php echo $r["escalera"]; ?></td>
                    </tr>
                    <tr>
                        <th>precio</th>
                        <td><?php echo $r["precio"]; ?></td>
                    </tr>
                    <tr>
                        <th>metros_cuadrados</th>
                        <td><?php echo $r["metros_cuadrados"]; ?></td>
                    </tr>
                    <tr>
                        <th>exterior</th>
                        <td><?php echo $r["exterior"]; ?></td>
                    </tr>
                    <tr>
                        <th>aseos</th>
                        <td><?php echo $r["aseos"]; ?></td>
                    </tr>
                    <tr>
                        <th>terraza</th>
                        <td><?php echo $r["terraza"]; ?></td>
                    </tr>
                    <tr>
                        <th>balcon</th>
                        <td><?php echo $r["balcon"]; ?></td>
                    </tr>
                    <tr>
                        <th>orientacion</th>
                        <td><?php echo $r["orientacion"]; ?></td>
                    </tr>
                    <tr>
                        <th>ascensor</th>
                        <td><?php echo $r["ascensor"]; ?></td>
                    </tr>-->
                    <tr>
                        <th>descripcion</th>
                        <td><?php echo $r["descripcion"]; ?></td>
                    </tr>
                    <tr>
                        <th>foto</th>
                        <td><?php echo $r["foto"]; ?></td>
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