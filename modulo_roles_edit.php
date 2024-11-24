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
                        <h1 class="h2">Roles - Editar</h1>
                        <a href="modulo_roles_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <?php
                    $role = getById("roles", $_GET["id"]);
                    ?>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $role["id"]; ?>">

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <span id="role_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="role" name="role" placeholder="Role"
                                    value="<?php echo $role["role"]; ?>">
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
                    role: {
                        required: true,
                        maxlength: 20,
                        minlength: 3
                    }
                },
                messages: {
                    role: {
                        required: "Introduce el nombre de role",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        data: $("#form1").serialize(),
                        method: "POST",
                        url: "modulo_roles_update.php",
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
                                            "modulo_roles_list.php";
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