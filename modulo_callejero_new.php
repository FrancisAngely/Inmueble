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
                        <h1 class="h2">Callejero - Nuevo</h1>
                        <a href="modulo_callejero_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">

                            <div class="mb-3">
                                <label for="id_localidades" class="form-label">Id Localidades</label>
                                <span id="id_localidades_error" class="text-danger"></span>
                                <select class="form-control" id="id_localidades" name="id_localidades">
                                    <option></option>
                                    <?php echo SelectOptions("callejero", "id", "id_localidades"); ?>

                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="tipo_via" class="form-label">Tipo Via</label>
                                <span id="tipo_via_error" class="text-danger"></span>
                                <select class="form-control" id="tipo_via" name="tipo_via">
                                    <option></option>
                                    <?php echo SelectOptions("callejero", "id", "tipo_via"); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="denominacion" class="form-label">Denominacion</label>
                                <span id="denominacion_error" class="text-danger"></span>
                                <select class="form-control" id="denominacion" name="denominacion">
                                    <option></option>
                                    <?php echo SelectOptions("callejero", "id", "denominacion"); ?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nombre_literal" class="form-label">Nombre Literal</label>
                                <span id="nombre_literal_error" class="text-danger"></span>
                                <select class="form-control" id="nombre_literal" name="nombre_literal">
                                    <option></option>
                                    <?php echo SelectOptions("callejero", "id", "nombre_literal"); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="cp" class="form-label">CP</label>
                                <span id="cp_error" class="text-danger"></span>
                                <select class="form-control" id="cp" name="cp">
                                    <option></option>
                                    <?php echo SelectOptions("callejero", "id", "cp"); ?>

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
                        id_localidades: {
                            required: true,
                            maxlength: 200
                        },
                        tipo_via: {
                            required: true,
                            maxlength: 10,
                        },
                        denominacion: {
                            required: true,
                            maxlength: 200,
                            minlength: 0
                        },
                        nombre_literal: {
                            required: true,
                            maxlength: 200,
                            minlength: 0
                        },
                        cp: {
                            required: true,
                            maxlength: 200,
                            minlength: 0
                        }
                    },
                    messages: {
                        id_localidades: {
                            required: "Introduce el id de la localidad",
                            maxlength: "No puede contener mas de 10 carácteres",
                        },
                        tipo_via: {
                            required: "Introduce el tipo de via",
                            maxlength: "No puede superar 10 carácteres",
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
                        console.log("clic");
                        let id_localidades = $("#id_localidades").val();
                        let tipo_via = $("#tipo_via").val();
                        let denominacion = $("#denominacion").val();
                        let nombre_literal = $("#nombre_literal").val();
                        let cp = $("#cp").val();

                        let tabla = "callejero";
                        let campo = "id_localidades";
                        let campo2 = "tipo_via";
                        let campo3 = "denominacion";
                        let campo4 = "nombre_literal";
                        let campo5 = "cp";
                        let error = 0;


                        $.ajax({
                            data: {
                                tabla: tabla,
                                valor1: id_localidades,
                                campo1: campo,
                                valor2: tipo_via,
                                campo2: campo2,
                                valor3: denominacion,
                                campo3: campo3,
                                valor4: nombre_literal,
                                campo4: campo4,
                                valor5: cp,
                                campo5: campo5
                            },
                            method: "POST",
                            url: "verificarUnicoCallejero.php",

                            success: function(result) {
                                if (result == 0) {
                                    $("#id_localidades_error").html("id localidad existe");
                                    $("#id_localidades").val('');
                                    $("#id_localidades").addClass("borderError");
                                } else {
                                    console.log($("#form1").serialize());
                                    $("#id_localidades").removeClass("borderError");
                                    $("#id_localidades_error").html("");

                                    $.ajax({
                                        data: $("#form1").serialize(),
                                        method: "POST",
                                        url: "modulo_callejero_insert.php",
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
                                                            "modulo_callejero_list.php";
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
                $("#id_provincias").change(function() {
                    let id_provincias = $("#id_provincias").val();
                    console.log(id_provincias);
                    $.ajax({
                        data: {
                            id_provincias: id_provincias
                        },
                        method: "POST",
                        url: "getLocalidadesProvincia.php",
                        success: function(result) {
                            $("#id_localidades").html(result);

                        }
                    });
                });

           });
        </script>
</body>

</html>