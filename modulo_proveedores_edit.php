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


                    <?php include("breadcrumb.php"); ?>

                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Proveedores - Editar</h1>
                        <a href="modulo_proveedores_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <?php
                    $proveedores = getById("proveedores", $_GET["id"]);
                    ?> <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $proveedores["id"]; ?>">

                            <div class="mb-3">
                                <label for="id_comercios" class="form-label">id_comercios</label>
                                <span id="id_comercios_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_comercios" name="id_comercios"
                                    placeholder="id_comercios" value="<?php echo $proveedores["id_comercios"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cif_nif_nie" class="form-label">cif_nif_nie</label>
                                <span id="cif_nif_nie_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="cif_nif_nie" name="cif_nif_nie"
                                    placeholder="cif_nif_nie" value="<?php echo $proveedores["cif_nif_nie"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="razonsocial" class="form-label">razonsocial</label>
                                <span id="razonsocial_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="razonsocial" name="razonsocial"
                                    placeholder="razonsocial" value="<?php echo $proveedores["razonsocial"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">direccion</label>
                                <span id="direccion_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="direccion" value="<?php echo $proveedores["direccion"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="codigopostal" class="form-label">codigopostal</label>
                                <span id="codigopostal_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="codigopostal" name="codigopostal"
                                    placeholder="codigopostal" value="<?php echo $proveedores["codigopostal"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="provincia" class="form-label">provincia</label>
                                <span id="provincia_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="provincia" name="provincia"
                                    placeholder="provincia" value="<?php echo $proveedores["provincia"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="localidad" class="form-label">localidad</label>
                                <span id="localidad_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="localidad" name="localidad"
                                    placeholder="localidad" value="<?php echo $proveedores["provincia"]; ?>">
                            </div>




                            <div class="mb-3">
                                <input type="submit" class="form-control" value="Aceptar" id="btnform1">
                            </div>

                        </form>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
            <?php include("footer.php"); ?>
        </div>
    </div>

    <?php include("scripts.php"); ?>

    <script>
        $(document).ready(function() {

            $("#form1").validate({
                rules: {
                    id_comercios: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                    cif_nif_nie: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                    razonsocial: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                    direccion: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                    codigopostal: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                    provincia: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                    localidad: {
                        required: true,
                        maxlength: 200,
                        minlength: 0
                    },
                },

                messages: {
                    id_comercios: {
                        required: "Introduce el numero de id del comercio",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    cif_nif_nie: {
                        required: "Introduce el CIF-NIF-NIE",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    razonsocial: {
                        required: "Introduce La Razon Social",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    direccion: {
                        required: "Introduce la Direccion",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    codigopostal: {
                        required: "Introduce el Codigo Postal",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    provincia: {
                        required: "Introduce la Provincia",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    localidad: {
                        required: "Introduce la Localidad",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                },
                submitHandler: function(form) {
                    let formData = new FormData($('#form1')[0]);
                    $.ajax({
                        data: formData,
                        method: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        url: "modulo_proveedores_update.php",
                        success: function(result) {

                            if (result == 1) {
                                let timerInterval;
                                Swal.fire({
                                    title: "Datos actualizados correctamente!",
                                    html: "",
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const timer = Swal.getPopup()
                                            .querySelector("b");
                                        timerInterval = setInterval(() => {
                                            timer.textContent =
                                                `${Swal.getTimerLeft()}`;
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then((result) => {
                                    if (result.dismiss === Swal.DismissReason
                                        .timer) {
                                        location.href =
                                            "modulo_proveedores_list.php";
                                    }
                                });
                            } else {
                                Swal.fire("No actualizados correctamente!");

                            }
                        }
                    });


                    /*let provincia = $("#provincia").val();
                    let tabla = "provincias";
                    let campo = "provincia";
                    $.ajax({
                        data: {
                            valor: provincia,
                            tabla: tabla,
                            campo: campo
                        },
                        method: "POST",
                        url: "verificarUnico.php",

                        success: function(result) {
                            if (result == 0) {
                                $("#provincia_error").html("Provincia existe");
                                $("#provincia").val('');
                                $("#provincia").addClass("borderError");
                            } else {
                                console.log($("#form1").serialize());
                                $("#provincia").removeClass("borderError");
                                $("#provincia_error").html("");

                                $.ajax({
                                    data: $("#form1").serialize(),
                                    method: "POST",
                                    url: "modulo_provincias_insert.php",
                                    success: function(result) {
                                        if (result > 1) {
                                            //alert("Datos insertados correctamente!");
                                            let timerInterval;
                                            Swal.fire({
                                                title: "Datos insertados correctamente!",
                                                html: "",
                                                timer: 2000,
                                                timerProgressBar: true,
                                                didOpen: () => {
                                                    Swal
                                                        .showLoading();
                                                    const
                                                        timer =
                                                        Swal
                                                        .getPopup()
                                                        .querySelector(
                                                            "b"
                                                        );
                                                    timerInterval
                                                        =
                                                        setInterval(
                                                            () => {
                                                                timer
                                                                    .textContent =
                                                                    `${Swal.getTimerLeft()}`;
                                                            },
                                                            100
                                                        );
                                                },
                                                willClose: () => {
                                                    clearInterval
                                                        (
                                                            timerInterval
                                                        );
                                                }
                                            }).then((result) => {
                                                if (result
                                                    .dismiss ===
                                                    Swal
                                                    .DismissReason
                                                    .timer) {
                                                    location.href =
                                                        "modulo_provincias_list.php";
                                                }
                                            });
                                        } else {
                                            Swal.fire(
                                                "No Insertado correctamente!"
                                            );

                                        }
                                    }
                                });
                            }
                        }
                    });*/
                }
            });
        });
    </script>
</body>

</html>