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
                        <h1 class="h2">Provincia - Editar</h1>
                        <a href="modulo_clientes_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <?php
                    $clientes = getById("clientes", $_GET["id"]);
                    ?> <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $clientes["id"]; ?>">

                            <div class="mb-3">
                                <label for="id_comercios" class="form-label">id_comercios</label>
                                <span id="id_comercios_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_comercios" name="id_comercios"
                                    placeholder="id_comercios" value="<?php echo $clientes["id_comercios"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cif_nif_nie" class="form-label">cif_nif_nie</label>
                                <span id="cif_nif_nie_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="cif_nif_nie" name="cif_nif_nie"
                                    placeholder="cif_nif_nie" value="<?php echo $clientes["cif_nif_nie"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="id_provincias" class="form-label">id_provincias</label>
                                <span id="id_provincias_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_provincias" name="id_provincias"
                                    placeholder="id_provincias" value="<?php echo $clientes["id_provincias"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="id_localidades" class="form-label">id_localidades</label>
                                <span id="id_localidades_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_localidades" name="id_localidades"
                                    placeholder="id_localidades" value="<?php echo $clientes["id_localidades"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <span id="email_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="email" value="<?php echo $clientes["email"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="id_operadores" class="form-label">id_operadores</label>
                                <span id="id_operadores_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_operadores" name="id_operadores"
                                    placeholder="id_operadores" value="<?php echo $clientes["id_operadores"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="atendido" class="form-label">atendido</label>
                                <span id="atendido_error" class="text-danger"></span>
                                <select class="form-select" id="atendido" name="atendido" required>
                                    <?php echo SelectOpcionesSel2(";Si;No", $clientes['atendido']); ?>
                                </select>
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
                        minlength: 3
                    },
                    cif_nif_nie: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    id_provincias: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    id_localidades: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    id_operadores: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    atendido: {
                        required: true,
                    }
                },
                messages: {
                    id_comercios: {
                        required: "Introduce el id_comercios",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    cif_nif_nie: {
                        required: "Introduce el cif_nif_nie",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    id_provincias: {
                        required: "Introduce el id_provincias",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    id_localidades: {
                        required: "Introduce el id_localidades",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    email: {
                        required: "Introduce el email",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    id_operadores: {
                        required: "Introduce el id_operadores",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    atendido: {
                        required: "Selecciona una opcion",
                    }
                },
                submitHandler: function(form) {
                    let formData = new FormData($('#form1')[0]);
                    $.ajax({
                        data: formData,
                        method: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        url: "modulo_clientes_update.php",
                        success: function(result) {
                            console.log(result);
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
                                            "modulo_clientes_list.php";
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