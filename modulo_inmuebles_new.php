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
                        <h1 class="h2">Inmuebles - Nuevo</h1>
                        <a href="modulo_inmuebles_list.php" class="btn btn-primary">Volver</a>
                    </div>

                    <div class="col-4">
                        <form action="#" method="post" enctype="multipart/form-data" id="form1">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <span id="nombre_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                            </div>

                            <div class="mb-3">
                                <label for="id_provincias" class="form-label">Provincias</label>
                                <span id="id_provincias_error" class="text-danger"></span>
                                <select class="form-control" id="id_provincias" name="id_provincias">
                                    <option></option>
                                    <?php echo SelectOptions("provincias", "id", "provincia"); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_localidades" class="form-label">Localidades</label>
                                <span id="id_provincias_error" class="text-danger"></span>
                                <select class="form-control" id="id_localidades" name="id_localidades">
                                    <option></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tipo_via" class="form-label">Tipo Via</label>
                                <span id="tipo_via_error" class="text-danger"></span>
                                <input type="tipo_via" class="form-control" id="tipo_via" name="tipo_via"
                                    placeholder="Tipo de Via">
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Direccion</label>
                                <span id="direccion_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Direccion">
                            </div>

                            <div class="mb-3">
                                <label for="cp" class="form-label">CP</label>
                                <span id="cp_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="cp" name="cp" placeholder="Codigo Postal">
                            </div>

                            <div class="mb-3">
                                <label for="numero" class="form-label">Numero</label>
                                <span id="numero_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero">
                            </div>

                            <div class="mb-3">
                                <label for="piso" class="form-label">Piso</label>
                                <span id="piso_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="piso" name="piso" placeholder="Piso">
                            </div>

                            <div class="mb-3">
                                <label for="letra" class="form-label">Letra</label>
                                <span id="letra_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="letra" name="letra" placeholder="Letra">
                            </div>

                            <div class="mb-3">
                                <label for="escalera" class="form-label">Escalera</label>
                                <span id="escalera_error" class="text-danger"></span>
                                <input type="escalera" class="form-control" id="escalera" name="escalera"
                                    placeholder="Escalera">
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <span id="precio_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
                            </div>

                            <div class="mb-3">
                                <label for="habitaciones" class="form-label">Habitaciones</label>
                                <span id="habitaciones_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="habitaciones" name="habitaciones"
                                    placeholder="Habitaciones">
                            </div>

                            <div class="mb-3">
                                <label for="metros_cuadrados" class="form-label">Metros Cuadrados</label>
                                <span id="metros_cuadrados_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="metros_cuadrados" name="metros_cuadrados"
                                    placeholder="Metros Cuadrados">
                            </div>

                            <div class="mb-3">
                                <label for="exterior" class="form-label">Exterior</label>
                                <span id="exterior_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="exterior" name="exterior"
                                    placeholder="Exterior">
                            </div>

                            <div class="mb-3">
                                <label for="aseos" class="form-label">Aseos</label>
                                <span id="aseos_error" class="text-danger"></span>
                                <input type="aseos" class="form-control" id="aseos" name="aseos" placeholder="Aseos">
                            </div>

                            <div class="mb-3">
                                <label for="terraza" class="form-label">Terraza</label>
                                <span id="terraza_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="terraza" name="terraza"
                                    placeholder="Terraza">
                            </div>

                            <div class="mb-3">
                                <label for="balcon" class="form-label">Balcon</label>
                                <span id="balcon_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="balcon" name="balcon" placeholder="Balcon">
                            </div>

                            <div class="mb-3">
                                <label for="orientacion" class="form-label">Orientacion</label>
                                <span id="orientacion_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="orientacion" name="orientacion"
                                    placeholder="Orientacion">
                            </div>

                            <div class="mb-3">
                                <label for="ascensor" class="form-label">Ascensor</label>
                                <span id="ascensor_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="ascensor" name="ascensor"
                                    placeholder="Ascensor">
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion</label>
                                <span id="descripcion_error" class="text-danger"></span>
                                <input type="descripcion" class="form-control" id="descripcion" name="descripcion"
                                    placeholder="Descripcion">
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <span id="foto_error" class="text-danger"></span>
                                <input type="text" class="form-control" id="foto" name="foto" placeholder="Foto">
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
                        nombre: {
                            required: true
                        },
                        id_provincias: {
                            required: true
                        },
                        dc: {
                            required: true
                        },
                        id_localidades: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        tipo_via: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        direccion: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        cp: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        numero: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        piso: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        letra: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        escalera: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        precio: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        habitaciones: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        metros_cuadrados: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        exterior: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        aseos: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        terraza: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        balcon: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        orientacion: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        ascensor: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        descripcion: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        },
                        foto: {
                            required: true,
                            maxlength: 200,
                            minlength: 3
                        }
                    },
                    messages: {
                        nombre: {
                            required: "Introduce un nombre",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        id_provincias: {
                            required: "Introduce el id de la provincia",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        dc: {
                            required: "Introduce un DC",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        id_localidades: {
                            required: "Introduce  el id de la localidad",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        tipo_via: {
                            required: "Introduce el tipo de via",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        direccion: {
                            required: "Introduce una direccion",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        cp: {
                            required: "Introduce un codigo postal",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        numero: {
                            required: "Introduce el numero del inmueble",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        piso: {
                            required: "Introduce el piso",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        letra: {
                            required: "Introduce la letra",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        escalera: {
                            required: "Introduce la escalera",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        precio: {
                            required: "Introduce el precio",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        habitaciones: {
                            required: "Introduce el numero de las habitaciones",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        metros_cuadrados: {
                            required: "Introduce el numero de metros cuadrados",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        exterior: {
                            required: "Introduce el exterior",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        aseos: {
                            required: "Introduce el aseo",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        terraza: {
                            required: "Introduce si tiene terraza",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        balcon: {
                            required: "Introduce si tiene terraza",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        orientacion: {
                            required: "Introduce la orientacion",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        ascensor: {
                            required: "Introduce si tiene ascensor",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        descripcion: {
                            required: "Introduce una descripcion",
                            maxlength: "No puede superar 20 carácteres",
                            minlength: "Mínimo 3 caracteres"
                        },
                        foto: {
                            required: "Sube una foto",
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
                                        url: "modulo_inmuebles_insert.php",
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
                                                            "modulo_inmuebles_list.php";
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