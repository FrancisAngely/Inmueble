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
                        <h1 class="h2">Productos - Nuevo</h1>
                        <a href="modulo_productos_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">
                            <h1>Servicios</h1>

                            <div class="mb-3">
                                <label for="id_comercios" class="form-label">Id Comercios</label>
                                <span id="id_comercios_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_comercios" name="id_comercios"
                                    placeholder="id_comercios">
                            </div>

                            <div class="mb-3">
                                <label for="id_categorias" class="form-label">id_categorias</label>
                                <span id="id_categorias_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_categorias" name="id_categorias"
                                    placeholder="id_categorias">
                            </div>

                            <div class="mb-3">
                                <label for="id_proveedores" class="form-label">Id Proveedores</label>
                                <span id="id_proveedores_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="id_proveedores" name="id_proveedores"
                                    placeholder="id_proveedores">
                            </div>

                            <div class="mb-3">
                                <label for="referencia" class="form-label">Referencia</label>
                                <span id="referencia_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="referencia" name="referencia"
                                    placeholder="referencia">
                            </div>

                            <div class="mb-3">
                                <label for="producto" class="form-label">Productos</label>
                                <span id="producto_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="producto" name="producto"
                                    placeholder="producto">
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <span id="cantidad_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="cantidad" name="cantidad"
                                    placeholder="cantidad">
                            </div>

                            <div class="mb-3">
                                <label for="baseimponible" class="form-label">Base Imponible</label>
                                <span id="baseimponible_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="baseimponible" name="baseimponible"
                                    placeholder="baseimponible">
                            </div>
                            <div class="mb-3">
                                <label for="iva" class="form-label">iva</label>
                                <span id="iva_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="iva" name="iva"
                                    placeholder="iva">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <span id="precio_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="precio" name="precio"
                                    placeholder="precio">
                            </div>

                            <h1>Productos</h1>


                            <div class="mb-3">
                                <input type="submit" class="form-control" value="Aceptar" id="btnform1">
                            </div>

                        </form>
                    </div>
                </div> 
            </div> 
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
                    id_categorias: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    id_proveedores: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    provincia: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    provincia: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    provincia: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
                    provincia: {
                        required: true,
                        maxlength: 200,
                        minlength: 3
                    },
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
                    let tabla = "productos";
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
                                $("#productos_error").html("Provincia existe");
                                $("#productos").val('');
                                $("#productos").addClass("borderError");
                            } else {
                                console.log($("#form1").serialize());
                                $("#productos").removeClass("borderError");
                                $("#productos_error").html("");

                                $.ajax({
                                    data: $("#form1").serialize(),
                                    method: "POST",
                                    url: "modulo_productos_insert.php",
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
                                                        "modulo_productos_list.php";
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