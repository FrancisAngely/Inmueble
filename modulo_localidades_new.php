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
                        <h1 class="h2">Localidades - Nuevo</h1>
                        <a href="modulo_localidades_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">

                            <div class="mb-3">
                                <label for="id_provincias" class="form-label">Id Provincias</label>
                                <span id="id_provincias_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_provincias" name="id_provincias"
                                    placeholder="Id Provincias">
                            </div>

                            <div class="mb-3">
                                <label for="cmun" class="form-label">Cmun</label>
                                <span id="cmun_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="cmun" name="cmun" placeholder="cmun">
                            </div>

                            <div class="mb-3">
                                <label for="dc" class="form-label">DC</label>
                                <span id="dc_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="dc" name="dc" placeholder="dc">
                            </div>

                            <div class="mb-3">
                                <label for="localidad" class="form-label">Localidades</label>
                                <span id="localidad_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="localidad" name="localidad"
                                    placeholder="localidad">
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="form-control" value="Aceptar" id="btnform1">
                            </div>

                        </form>
                    </div>
                </div> <!-- content -->
                <?php include("footer.php"); ?>
            </div>
        </div>

        <?php include("scripts.php"); ?>


        <script>
            $(document).ready(function() {

                $("#form1").validate({
                    rules: {
                        id_provincias: {
                            required: true

                        },
                        cmun: {
                            required: true
                        },
                        dc: {
                            required: true
                        },
                        localidad: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        }
                    },
                    messages: {
                        id_provincias: {
                            required: "Introduce el id provincias de la localidad"
                        },
                        cmun: {
                            required: "Introduce el Cmin de la localidad"
                        },
                        dc: {
                            required: "Introduce el Dc de la localidad"
                        },
                        localidad: {
                            required: "Introduce el nombre de la localidad",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        }
                    },
                    submitHandler: function(form) {
                        let id_provincias = $("#id_provincias").val();
                        let cmun = $("#cmun").val();
                        let dc = $("#dc").val();
                        let localidades = $("#localidad").val();

                        let tabla = "localidades";
                        let campo = "cmun";
                        let campo2 = "dc";
                        let campo3 = "localidad";
                        let campo4 = "id_provincias";
                        let error = 0;

                        //console.log(localidades);

                        $.ajax({
                            data: {
                                tabla: tabla,
                                valor1: cmun,
                                campo1: campo,
                                valor2: dc,
                                campo2: campo2,
                                valor3: localidades,
                                campo3: campo3,
                                valor4: id_provincias,
                                campo4: campo4
                            },
                            method: "POST",
                            url: "verificarUnicoLocalidad.php",

                            success: function(result) {
                                if (result == 0) {
                                    $("#localidad_error").html("localidad existe");
                                    $("#localidad").val('');
                                    $("#localidad").addClass("borderError");
                                } else {
                                    console.log($("#form1").serialize());
                                    $("#localidad").removeClass("borderError");
                                    $("#localidad_error").html("");

                                    $.ajax({
                                        data: $("#form1").serialize(),
                                        method: "POST",
                                        url: "modulo_localidades_insert.php",
                                        success: function(result) {
                                            if (result > 1) {
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
                                                            "modulo_localidades_list.php";
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
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>