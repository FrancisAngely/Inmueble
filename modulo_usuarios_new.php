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
                        <h1 class="h2">Usuarios - Nuevo</h1>
                        <a href="modulo_usuarios_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <span id="usuario_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="usuario" name="usuario"
                                    placeholder="Usuario">
                            </div>


                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <span id="password_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Contraseña">
                            </div>


                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <span id="email_error" class="text-danger"></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                            </div>

                            <div class="mb-3">
                                <label for="id_roles" class="form-label">Role</label>
                                <span id="id_roles_error" class="text-danger"></span>
                                <select class="form-control" id="id_roles" name="id_roles">
                                    <option></option>
                                    <?php echo SelectOptions("roles", "id", "role"); ?>
                                </select>
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
                    usuario: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    id_roles: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    }
                },
                messages: {
                    usuario: {
                        required: "Introduce el nombre de usuario",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    password: {
                        required: "Introduce una contraseña",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    email: {
                        required: "Introduce un email",
                        maxlength: "No puede superar 20 carácteres",
                        minlength: "Mínimo 3 caracteres"
                    },
                    id_roles: {
                        required: "Selecciona un rol",
                    }
                },
                submitHandler: function(form) {
                    let id_roles = $("#id_roles").val();
                    let usuario = $("#usuario").val();
                    let password = $("#password").val();
                    let email = $("#email").val();

                    let tabla = "usuarios";
                    let campo = "id_roles";
                    let campo2 = "usuario";
                    let campo3 = "password";
                    let campo4 = "email";
                    let error = 0;

                    $.ajax({
                        data: {
                            valor: usuario,
                            tabla: tabla,
                            campo: campo
                        },
                        method: "POST",
                        url: "verificarUnico.php",

                        success: function(result) {
                            if (result == 0) {
                                $("#usuario_error").html("Usuario existe");
                                $("#usuario").val('');
                                $("#usuario").addClass("borderError");
                            } else {
                                console.log($("#form1").serialize());
                                $("#usuario").removeClass("borderError");
                                $("#usuario_error").html("");

                                $.ajax({
                                    data: $("#form1").serialize(),
                                    method: "POST",
                                    url: "modulo_usuarios_insert.php",
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
                                                        "modulo_usuarios_list.php";
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