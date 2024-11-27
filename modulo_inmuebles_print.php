<?php
include("controller.php");
$participante = getById("participantes", $_GET["id"]);
$evento = getById("eventos", $participante["id_eventos"]);
$entradas = getById("entradas", $participante["id_entradas"]);

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

<tr><th>Id</th></tr>
<tr><th>nombre</th></tr>
<tr><th>Localidades</th></tr>
<tr> <th>tipo Via</th></tr>
<tr><th>Direccion</th></tr>
<tr><th>Codigo Postal</th></tr>
<tr><th>numero</th></tr>
<tr> <th>piso</th></tr>
<tr>  <th>letra</th></tr>
<tr><th>escalera</th></tr>
<tr><th>precio</th></tr>
<tr><th>metros_cuadrados</th></tr>
<tr><th>exterior</th></tr>
<tr><th>aseos</th></tr>
<tr><th>terraza</th></tr>
<tr><th>balcon</th></tr>
<tr><th>orientacion</th></tr>
<tr><th>ascensor</th></tr>
<tr><th>descripcion</th></tr>
<tr><th>foto</th></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
                                 
                    <tr>
                    <th>Id:</th>
                    <td><?php echo $participante["id"]; ?></td>
                    </tr>
                    






                    <tr>
                    <th>nombre</th>
                    <td><?php echo $eventos["evento"]; ?></td>
                    </tr>
                    <tr>


                    <th>Provincia</th>
                    <td><?php echo $entradas["entrada"]; ?></td>
                    </tr>

                    <th>Nombre:</th>
                    <td><?php echo $participante["nombre"]; ?></td>
        </tr>
        <tr>
            <th>Apellidos:</th>
            <td><?php echo $participante["apellidos"]; ?></td>
        </tr>
        <tr>
            <th>E-mai:</th>
            <td><?php echo $participante["email"]; ?></td>
        </tr>
        <tr>
            <th>Apellidos:</th>
            <td><?php echo $participante["precio"]; ?></td>
        </tr>
        <tr>
            <th>Precio:</th>
            <td><?php echo $participante["fecha"]; ?></td>
        </tr>
        <tr>
            <th>Fecha:</th>
            <td><?php echo $participante["hora_comienzo"]; ?></td>
        </tr>
        <tr>
            <th>Hora:</th>
            <td><?php echo $participante["apellidos"]; ?></td>
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