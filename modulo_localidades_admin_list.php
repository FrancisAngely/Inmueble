            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Localidades</h1>
                &nbsp;<a href="modulo_localidades_new.php" class="btn btn-primary">Nuevo</a>
                &nbsp;&nbsp;
                <a href="#" class="btn btn-success" id="exportar">Exportar&nbsp;<i
                        class="fa-regular fa-file-excel"></i></a>
            </div>
            <?php
            $excel = ' <table>
          <thead>
          <tr>
            <th>Id</th>
            <th>Cmun</th>
            <th>DC</th>
            <th>Localidad</th>
          </tr>
          </thead>
          <tbody>';
            ?>
            <table class="table" id="tabla">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cmun</th>
                        <th>DC</th>
                        <th>Localidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    echo "<h3> User: " . $_SESSION["role"] . "</h3>";
                    $localidades = getAllV("localidades");

                    if (count($localidades) > 0) {
                        foreach ($localidades as $r) {
                    ?>
                            <tr>
                                <td><?php echo $r["id"]; ?></td>
                                <td><?php echo $r["cmun"]; ?></td>
                                <td><?php echo $r["dc"]; ?></td>
                                <td><?php echo $r["localidad"]; ?></td>
                                <td><a href="modulo_localidades_edit.php?id=<?php echo $r["id"]; ?>"><i
                                            class="fa-solid fa-pen-to-square fa-2x"></i></a>
                                    &nbsp;&nbsp;
                                    <a href="#" data-id="<?php echo $r["id"]; ?>" class="borrar"><i
                                            class="fa-solid fa-trash text-danger"></i>

                                        <a href="modulo_localidades_print.php?id=<?php echo $r["id"]; ?>"><i
                                                class="fa-solid fa-print"></i></a>
                                        &nbsp;&nbsp;
                                    </a>
                                </td>
                            </tr>
                    <?php
                            $excel .= '<tr>';
                            $excel .= '<td>' . $r["id"] . '</td>';
                            $excel .= '<td>' . $r["cmun"] . '</td>';
                            $excel .= '<td>' . $r["dc"] . '</td>';
                            $excel .= '<td>' . $r["localidad"] . '</td>';
                            $excel .= '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>

           <form action="ficheroExcel.php" method="post" enctype="multipart/form-data" id="formExportar">
                <input type="hidden" value="Localidades" name="nombreFichero">
                <input type="hidden" value="<?php echo $excel; ?>" name="datos_a_enviar">
            </form>

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
                                    url: "modulo_localidades_importar.php",
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
                                    url: "modulo_localidades_delete.php",
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

                    $("#tabla").DataTable({
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

                    });
                });
            </script>