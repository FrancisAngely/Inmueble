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
                        <h1 class="h2">Provincias - Nuevo</h1>
                        <a href="modulo_provincias_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <div class="mb-3">
                                <label for="provincias" class="form-label">Provincias</label>
                                <span id="provincias_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="provincia" name="provincia"
                                    placeholder="Provincias">
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
                    provincia: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    }
                },
                messages: {
                    provincia: {
                        required: "Introduce el nombre de la provincia",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    }
                },
                submitHandler: function(form) {
                    let provincia = $("#provincia").val();
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
                                $("#provincias_error").html("Provincia existe");
                                $("#provincias").val('');
                                $("#provincias").addClass("borderError");
                            } else {
                                console.log($("#form1").serialize());
                                $("#provincias").removeClass("borderError");
                                $("#provincias_error").html("");

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
                    });
                }
            });
        });
    </script>
</body>

</html>