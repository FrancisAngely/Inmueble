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
            <a href="modulo_inmuebles_list.php" class="btn btn-primary">Volver</a>
          </div>

          <?php $inmuebles = getById("inmuebles", $_GET["id"]); ?>

          <div class="col-4">
            <form action="#" method="post" enctype="multipart/form-data" id="form1">

              <input type="hidden" class="form-control" id="id" name="id"
                value="<?php echo $inmuebles["id"]; ?>">

              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <span id="nombre_error" class="text-danger"></span>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"
                  value="<?php echo $inmuebles["nombre"]; ?>">
              </div>

              <div class="mb-3">
                <label for="id_provincias" class="form-label">Id Provincias</label>
                <span id="id_provincias_error" class="text-danger"></span>
                <input type="text" class="form-control" id="id_provincias" name="id_provincias"
                  placeholder="Id Provincias" value="<?php echo $inmuebles["id_provincias"]; ?>">
              </div>

              <div class="mb-3">
                <label for="id_localidades" class="form-label">Id Localidades</label>
                <span id="id_localidades_error" class="text-danger"></span>
                <input type="text" class="form-control" id="id_localidades" name="id_localidades"
                  placeholder="Id Localidades" value="<?php echo $inmuebles["id_localidades"]; ?>">
              </div>

              <div class="mb-3">
                <label for="tipo_via" class="form-label">Tipo Via</label>
                <span id="tipo_via_error" class="text-danger"></span>
                <input type="tipo_via" class="form-control" id="tipo_via" name="tipo_via"
                  placeholder="Tipo de Via" value="<?php echo $inmuebles["tipo_via"]; ?>">
              </div>

              <div class="mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <span id="direccion_error" class="text-danger"></span>
                <input type="text" class="form-control" id="direccion" name="direccion"
                  placeholder="Direccion" value="<?php echo $inmuebles["direccion"]; ?>">
              </div>

              <div class="mb-3">
                <label for="cp" class="form-label">CP</label>
                <span id="cp_error" class="text-danger"></span>
                <input type="text" class="form-control" id="cp" name="cp" placeholder="Codigo Postal"
                  value="<?php echo $inmuebles["cp"]; ?>">
              </div>

              <div class="mb-3">
                <label for="numero" class="form-label">Numero</label>
                <span id="numero_error" class="text-danger"></span>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero"
                  value="<?php echo $inmuebles["numero"]; ?>">
              </div>

              <div class="mb-3">
                <label for="piso" class="form-label">Piso</label>
                <span id="piso_error" class="text-danger"></span>
                <input type="text" class="form-control" id="piso" name="piso" placeholder="Piso"
                  value="<?php echo $inmuebles["piso"]; ?>">
              </div>

              <div class="mb-3">
                <label for="letra" class="form-label">Letra</label>
                <span id="letra_error" class="text-danger"></span>
                <input type="text" class="form-control" id="letra" name="letra" placeholder="Letra"
                  value="<?php echo $inmuebles["letra"]; ?>">
              </div>

              <div class="mb-3">
                <label for="escalera" class="form-label">Escalera</label>
                <span id="escalera_error" class="text-danger"></span>
                <input type="escalera" class="form-control" id="escalera" name="escalera"
                  placeholder="Escalera" value="<?php echo $inmuebles["escalera"]; ?>">
              </div>

              <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <span id="precio_error" class="text-danger"></span>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio"
                  value="<?php echo $inmuebles["precio"]; ?>">
              </div>

              <div class="mb-3">
                <label for="habitaciones" class="form-label">Habitaciones</label>
                <span id="habitaciones_error" class="text-danger"></span>
                <input type="text" class="form-control" id="habitaciones" name="habitaciones"
                  placeholder="Habitaciones" value="<?php echo $inmuebles["habitaciones"]; ?>">
              </div>

              <div class="mb-3">
                <label for="metros_cuadrados" class="form-label">Metros Cuadrados</label>
                <span id="metros_cuadrados_error" class="text-danger"></span>
                <input type="text" class="form-control" id="metros_cuadrados" name="metros_cuadrados"
                  placeholder="Metros Cuadrados"
                  value="<?php echo $inmuebles["metros_cuadrados"]; ?>">
              </div>

              <div class="mb-3">
                <label for="exterior" class="form-label">Exterior</label>
                <span id="exterior_error" class="text-danger"></span>
                <input type="text" class="form-control" id="exterior" name="exterior"
                  placeholder="Exterior" value="<?php echo $inmuebles["exterior"]; ?>">
              </div>

              <div class="mb-3">
                <label for="aseos" class="form-label">Aseos</label>
                <span id="aseos_error" class="text-danger"></span>
                <input type="aseos" class="form-control" id="aseos" name="aseos" placeholder="Aseos"
                  value="<?php echo $inmuebles["aseos"]; ?>">
              </div>

              <div class="mb-3">
                <label for="terraza" class="form-label">Terraza</label>
                <span id="terraza_error" class="text-danger"></span>
                <input type="text" class="form-control" id="terraza" name="terraza"
                  placeholder="Terraza" value="<?php echo $inmuebles["terraza"]; ?>">
              </div>

              <div class="mb-3">
                <label for="balcon" class="form-label">Balcon</label>
                <span id="balcon_error" class="text-danger"></span>
                <input type="text" class="form-control" id="balcon" name="balcon" placeholder="Balcon"
                  value="<?php echo $inmuebles["balcon"]; ?>">
              </div>

              <div class="mb-3">
                <label for="orientacion" class="form-label">Orientacion</label>
                <span id="orientacion_error" class="text-danger"></span>
                <input type="text" class="form-control" id="orientacion" name="orientacion"
                  placeholder="Orientacion" value="<?php echo $inmuebles["orientacion"]; ?>">
              </div>

              <div class="mb-3">
                <label for="ascensor" class="form-label">Ascensor</label>
                <span id="ascensor_error" class="text-danger"></span>
                <input type="text" class="form-control" id="ascensor" name="ascensor"
                  placeholder="Ascensor" value="<?php echo $inmuebles["ascensor"]; ?>">
              </div>

              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <span id="descripcion_error" class="text-danger"></span>
                <input type="descripcion" class="form-control" id="descripcion" name="descripcion"
                  placeholder="Descripcion" value="<?php echo $inmuebles["descripcion"]; ?>">
              </div>

              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <span id="foto_error" class="text-danger"></span>
                <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $inmuebles["foto"]; ?>">
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

      tinymce.init({
        selector: '#descripcion',
        language: 'es',
        height: 500,
        plugins: [
          'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
          'anchor', 'searchreplace', 'visualblocks', 'code',
          'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
          'bold italic backcolor | alignleft aligncenter ' +
          'alignright alignjustify | bullist numlist outdent indent | ' +
          'removeformat ',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
      });

      $(" #form1").validate({
        rules: {
          nombre: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          id_provincias: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          dc: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          id_localidades: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          tipo_via: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          direccion: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          cp: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          numero: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          piso: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          letra: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          escalera: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          precio: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          habitaciones: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          metros_cuadrados: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          exterior: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          aseos: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          terraza: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          balcon: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          orientacion: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          ascensor: {
            required: true,
            maxlength: 200,
            minlength: 0
          },
          descripcion: {
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
            minlength: "Mínimo caracteres"
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
          },
        },
        submitHandler: function(form) {
          $.ajax({
            data: $("#form1").serialize(),
            method: "POST",
            url: "modulo_inmuebles_update.php",
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
                      "modulo_inmuebles_list.php";
                  }
                });
              } else {
                Swal.fire("No actualizados correctamente!");

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