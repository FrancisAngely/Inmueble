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
                        <h1 class="h2">Localidad - Editar</h1>
                        <a href="modulo_localidades_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <?php
          $localidades = getById("localidades", $_GET["id"]);
          ?>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $localidades["id"]; ?>">

                            <div class="mb-3">
                                <label for="cmun" class="form-label">Cmun</label>
                                <span id="cmun_error" class="text-danger"></span>
                                <input type="number" class="form-control" id="cmun" name="cmun" placeholder="cmun"
                                    value="<?php echo $localidades["cmun"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="dc" class="form-label">DC</label>
                                <span id="dc_error" class="text-danger"></span>
                                <input type="number" class="form-control" id="dc" name="dc" placeholder="dc"
                                    value="<?php echo $localidades["dc"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="localidad" class="form-label">localidades</label>
                                <span id="localidad_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="localidad" name="localidad"
                                    placeholder="localidad" value="<?php echo $localidades["localidad"]; ?>">
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
                cmun: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                },
                dc: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                },
                localidad: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                }
            },
            messages: {
                cmun: {
                    required: "Introduce el Cmun de la localidad",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                },
                dc: {
                    required: "Introduce el Dc de la localidad",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                },
                localidad: {
                    required: "Introduce el nombre de la localidad",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                }
            },
            submitHandler: function(form) {
                let cmun = $("#cmun").val();
                let dc = $("#dc").val();
                let localidades = $("#localidad").val();

                let tabla = "localidades";
                let campo = "cmun";
                let campo2 = "dc";
                let campo3 = "localidad";
                let error = 0;

                $.ajax({
                    data: {
                        valor: localidad,
                        tabla: tabla,
                        campo: campo
                    },
                    method: "POST",
                    url: "verificarUnico.php",

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
                    }
                });
            }
        });
    });
    </script>
</body>

</html>