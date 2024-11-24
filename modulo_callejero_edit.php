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
                        <h1 class="h2">Callejero - Editar</h1>
                        <a href="modulo_callejero_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <?php
                    $callejero = getById("callejero", $_GET["id"]);
                    ?>

                    <div class="col-4">

                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $callejero["id"]; ?>">

                            <div class="mb-3">
                                <label for="id_localidades" class="form-label">Id Localidades</label>
                                <span id="id_localidades_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_localidades" name="id_localidades"
                                    placeholder="Id Localidades" value="<?php echo $callejero["id_localidades"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tipo_via" class="form-label">Tipo Via</label>
                                <span id="tipo_via_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="tipo_via" name="tipo_via"
                                    placeholder="Tipo Via" value="<?php echo $callejero["tipo_via"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="denominacion" class="form-label">Denominacion</label>
                                <span id="denominacion_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="denominacion" name="denominacion"
                                    placeholder="denominacion" value="<?php echo $callejero["denominacion"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nombre_literal" class="form-label">Nombre Literal</label>
                                <span id="nombre_literal_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="nombre_literal" name="nombre_literal"
                                    placeholder="Nombre literal" value="<?php echo $callejero["nombre_literal"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cp" class="form-label">CP</label>
                                <span id="cp_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="cp" name="cp" placeholder="Codigo Postal"
                                    placeholder="cp" value="<?php echo $callejero["cp"]; ?>">
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
                id_localidades: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                },
                tipo_via: {
                    required: true,
                },
                denominacion: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                },
                nombre_literal: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                },
                cp: {
                    required: true,
                    maxlength: 200,
                    minlength: 3
                }
            },
            messages: {
                id_localidades: {
                    required: "Introduce el id de la localidad",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                },
                tipo_via: {
                    required: "Introduce el tipo de via",
                },
                denominacion: {
                    required: "Introduce la denominacion",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                },
                nombre_literal: {
                    required: "Introduce el nombre literal",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                },
                cp: {
                    required: "Introduce el codigo postal",
                    maxlength: "No puede superar 20 carácteres",
                    minlength: "Mínimo 3 caracteres"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    data: $("#form1").serialize(),
                    method: "POST",
                    url: "modulo_callejero_update.php",

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
                                        "modulo_callejero_list.php";
                                }
                            });
                        } else {
                            Swal.fire("No actualizados correctamente!");

                        }
                    }
                });

            }
        });
    });
    </script>
</body>

</html>