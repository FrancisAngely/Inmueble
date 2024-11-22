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

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Provincia - Editar</h1>
            <a href="modulo_provincias_list.php" class="btn btn-primary">Volver</a>
          </div>

          <?php
          $provincias = getById("provincias", $_GET["id"]);
          ?>

          <div class="col-4">
            <form action="#" method="post" enctype="multipart/form-data" id="form1">
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $provincias["id"]; ?>">

              <div class="mb-3">
                <label for="provincia" class="form-label">Provincias</label>
                <span id="provincia_error" class="text-danger"></span>
                <input type="text" class="form-control" id="provincia" name="provincia" placeholder="provincia" value="<?php echo $provincias["provincia"]; ?>">
              </div>


              <div class="mb-3">
                <input type="button" class="form-control" value="Aceptar" id="btnform1">
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

      $("#btnform1").click(function() {
        let provincia = $("#provincia").val();
        let id = $("#id").val();
        let tabla = "provincias";
        let campo = "provincia";
        let error = 0;

        if (provincia == "") {
          error = 1;
          $("#provincia_error").html("Debe introduccir una provincia");
          $("#provincia").addClass("borderError");
        }


        if (error == 0) {

          $.ajax({
            data: {
              valor: provincia,
              tabla: tabla,
              campo: campo,
              id: id
            },
            method: "POST",
            url: "verificarUnicoEdit.php",
            success: function(result) {
              if (result == 0) {
                $("#provincia_error").html("Provincia existe");
                $("#provincia").val('');
                $("#provincia").addClass("borderError");
              } else {
                $("#provincia").removeClass("borderError");
                $("#provincia_error").html("");
                //actualizar
                $.ajax({
                  data: $("#form1").serialize(),
                  method: "POST",
                  url: "modulo_provincias_update.php",
                  success: function(result) {

                    if (result == 1) {
                      //alert("Datos insertados correctamente!");
                      let timerInterval;
                      Swal.fire({
                        title: "Datos actualizados correctamente!",
                        html: "",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                          Swal.showLoading();
                          const timer = Swal.getPopup().querySelector("b");
                          timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                          }, 100);
                        },
                        willClose: () => {
                          clearInterval(timerInterval);
                        }
                      }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                          location.href = "modulo_provincias_list.php";
                        }
                      });
                    } else {
                      Swal.fire("No actualizados correctamente!");

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