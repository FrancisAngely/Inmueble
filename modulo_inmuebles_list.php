<!DOCTYPE html>
<html lang="es" data-bs-theme="light" data-menu-color="light" data-topbar-color="dark">

<?php include("head.php"); ?>

<body>
    <div class="layout-wrapper">

        <?php include("leftsidebar.php"); ?>


        <div class="page-content">


            <?php include("topbar.php"); ?>

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">


                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Localidades</h1>
                        &nbsp;<a href="modulo_inmuebles_new.php" class="btn btn-primary">Nuevo</a>
                        &nbsp;&nbsp;
                        <a href="#" class="btn btn-success" id="exportar">Exportar&nbsp;<i
                                class="fa-regular fa-file-excel"></i></a>
                    </div>
                    <?php
                    $excel = ' <table>
                        <thead>
                        <tr>
                        <th>Id</th>
                        <th>nombre</th>
                        <th>id_provincias</th>
                        <th>id_localidades</th>
                        <th>tipo_via</th>
                        <th>direccion</th>
                        <th>cp</th>
                        <th>numero</th>
                        <th>piso</th>
                        <th>letra</th>
                        <th>escalera</th>
                        <th>precio</th>
                        <th>habitaciones</th>
                        <th>metros_cuadrados</th>
                        <th>exterior</th>
                        <th>aseos</th>
                        <th>terraza</th>
                        <th>balcon</th>
                        <th>orientacion</th>
                        <th>ascensor</th>
                        <th>descripcion</th>
                        <th>foto</th>
          </tr>
          </thead>
          <tbody>';
                    ?>
                    <table class="table" id="tabla">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>nombre</th>
                                <th>Provincia</th>
                                <th>id_localidades</th>
                                <th>tipo_via</th>
                                <th>direccion</th>
                                <th>cp</th>
                                <th>numero</th>
                                <th>piso</th>
                                <th>letra</th>
                                <th>escalera</th>
                                <th>precio</th>
                                <th>habitaciones</th>
                                <th>metros_cuadrados</th>
                                <th>exterior</th>
                                <th>aseos</th>
                                <th>terraza</th>
                                <th>balcon</th>
                                <th>orientacion</th>
                                <th>ascensor</th>
                                <th>descripcion</th>
                                <th>foto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            echo "<h3> User: " . $_SESSION["role"] . "</h3>";
                            $inmuebles = getAllV("inmuebles");
                            $provincias = getAllV("provincias");
                            $localidades = getAllV("localidades");
                            $callejero = getAllV("callejero");
                            $callejeros = getAllV("callejero");


                           //print_r($callejeros);

                            if (count($inmuebles) > 0) {
                                foreach ($inmuebles as $r) {
                            ?>
                                    <tr>
                                        <td><?php echo $r["id"]; ?></td>
                                        <td><?php echo $r["nombre"]; ?></td>
                                        <td><?php
                                            $found_key = array_search($r["id_provincias"], array_column($provincias, 'id'));
                                            echo $provincias[$found_key]['provincia']; ?></td>

                                        <td><?php
                                            $key = array_search($r["id_localidades"], array_column($localidades, 'id'));
                                            echo $localidades[$key]['localidad'];
                                            ?>
                                        </td>

                                        <td><?php
                                            $key2 = array_search($r["id_localidades"], array_column($callejero, 'id'));
                                            echo $callejero[$key2]['tipo_via'];
                                            ?>
                                        </td>

                                        <td><?php
                                            $key3 = array_search($r["id_localidades"], array_column($callejeros, 'id_localidades'));
                                            echo $callejeros[$key3]['nombre_literal'];
                                            ?>
                                        </td>
                                        <td><?php
                                            $key3 = array_search($r["id_localidades"], array_column($callejeros, 'id_localidades'));
                                            echo $callejeros[$key3]['cp'];
                                            ?>
                                        </td>

                                        <td><?php echo $r["cp"]; ?></td>
                                        <td><?php echo $r["numero"]; ?></td>
                                        <td><?php echo $r["piso"]; ?></td>
                                        <td><?php echo $r["letra"]; ?></td>
                                        <td><?php echo $r["escalera"]; ?></td>
                                        <td><?php echo $r["precio"]; ?></td>
                                        <td><?php echo $r["habitaciones"]; ?></td>
                                        <td><?php echo $r["metros_cuadrados"]; ?></td>
                                        <td><?php echo $r["exterior"]; ?></td>
                                        <td><?php echo $r["aseos"]; ?></td>
                                        <td><?php echo $r["terraza"]; ?></td>
                                        <td><?php echo $r["balcon"]; ?></td>
                                        <td><?php echo $r["orientacion"]; ?></td>
                                        <td><?php echo $r["ascensor"]; ?></td>
                                        <td><?php echo $r["descripcion"]; ?></td>
                                        <td><?php echo $r["foto"]; ?></td>

                                        <td><a href="modulo_inmuebles_edit.php?id=<?php echo $r["id"]; ?>"><i
                                                    class="fa-solid fa-pen-to-square fa-2x"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="#" data-id="<?php echo $r["id"]; ?>" class="borrar"><i
                                                    class="fa-solid fa-trash text-danger"></i>

                                                <a href="modulo_inmuebles_print.php?id=<?php echo $r["id"]; ?>"><i
                                                        class="fa-solid fa-print"></i></a>
                                                &nbsp;&nbsp;
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                    $excel .= '<tr>';
                                    $excel .= '<td>' . $r["id"] . '</td>';
                                    $excel .= '<td>' . $r["nombre"] . '</td>';
                                    $excel .= '<td>' . $r["id_provincias"] . '</td>';
                                    $excel .= '<td>' . $r["id_localidades"] . '</td>';
                                    $excel .= '<td>' . $r["tipo_via"] . '</td>';
                                    $excel .= '<td>' . $r["direccion"] . '</td>';
                                    $excel .= '<td>' . $r["cp"] . '</td>';
                                    $excel .= '<td>' . $r["numero"] . '</td>';
                                    $excel .= '<td>' . $r["piso"] . '</td>';
                                    $excel .= '<td>' . $r["letra"] . '</td>';
                                    $excel .= '<td>' . $r["escalera"] . '</td>';
                                    $excel .= '<td>' . $r["precio"] . '</td>';
                                    $excel .= '<td>' . $r["habitaciones"] . '</td>';
                                    $excel .= '<td>' . $r["metros_cuadrados"] . '</td>';
                                    $excel .= '<td>' . $r["exterior"] . '</td>';
                                    $excel .= '<td>' . $r["aseos"] . '</td>';
                                    $excel .= '<td>' . $r["terraza"] . '</td>';
                                    $excel .= '<td>' . $r["balcon"] . '</td>';
                                    $excel .= '<td>' . $r["orientacion"] . '</td>';
                                    $excel .= '<td>' . $r["ascensor"] . '</td>';
                                    $excel .= '<td>' . $r["descripcion"] . '</td>';
                                    $excel .= '<td>' . $r["foto"] . '</td>';
                                    $excel .= '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
    </div>

    <form action="ficheroExcel.php" method="post" enctype="multipart/form-data" id="formExportar">
        <input type="hidden" value="inmuebles" name="nombreFichero">
        <input type="hidden" value="<?php echo $excel; ?>" name="datos_a_enviar">
    </form>

    <?php include("scripts.php"); ?>
    <script>
        $(document).ready(function() {

            $("#exportar").click(function() {
                $("#formExportar").submit();
            });

            $("#importar").click(function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Desea importar los datos?",
                    text: "Se borrarán los datos existentes!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, importar!",
                    cancelButtonText: "No!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let fileExcel = $("#fileExcel")[0].files[0];
                        var formData = new FormData();
                        formData.append("fileExcel", fileExcel);

                        $.ajax({
                            data: formData,
                            method: "POST",
                            processData: false,
                            contentType: false,
                            cache: false,
                            url: "modulo_inmuebles_importar.php",
                            success: function(result) {
                                //alert(result);
                                if (result == 1) {
                                    swalWithBootstrapButtons.fire({
                                        title: "Importación!",
                                        text: "Datos importados correctamente",
                                        icon: "success"
                                    });
                                    location.reload();
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Importación fallida!",
                                        text: "Datos no importados",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {}
                });
            });


            $(".borrar").click(function() {
                let id = $(this).attr('data-id');
                let padre = $(this).parent().parent();
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Desea eliminar la localidad?",
                    text: "no hay vuelta atrás!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, borrar!",
                    cancelButtonText: "No, mantener!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            data: {
                                id: id
                            },
                            method: "POST",
                            url: "modulo_inmuebles_delete.php",
                            success: function(result) {
                                if (result == 1) {
                                    swalWithBootstrapButtons.fire({
                                        title: "Eliminado!",
                                        text: "Localidad dada de baja",
                                        icon: "success"
                                    });
                                    padre.hide();
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "No Eliminado!",
                                        text: "Localidad NO dada de baja",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {}
                });
            });

         /*   $("#tabla").DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }

            });*/
        });
    </script>
    </div>
</body>

</html>