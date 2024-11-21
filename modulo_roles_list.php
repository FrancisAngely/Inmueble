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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Roles</h1>
            &nbsp;<a href="modulo_roles_new.php" class="btn btn-primary">Nuevo</a>
            &nbsp;&nbsp;
            <a href="#" class="btn btn-success" id="exportar">Exportar&nbsp;<i class="fa-regular fa-file-excel"></i></a>


            <input type="file" id="fileExcel" name="fileExcel" class="form-control w-25">
            <a href="#" class="btn btn-info" id="importar">Importar &nbsp;<i class="fa-solid fa-file-import"></i></a>
          </div>
          <?php
          $excel = ' <table><thead><tr><th>Id</th> <th>Role</th></tr></thead><tbody>';
          ?>
          <table class="table" id="tabla">
            <thead>
              <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $roles = getAllV("roles");

              if (count($roles) > 0) {
                foreach ($roles as $r) {
              ?>
                  <tr>
                    <td><?php echo $r["id"]; ?></td>
                    <td><?php echo $r["role"]; ?></td>
                    <td><a href="modulo_roles_edit.php?id=<?php echo $r["id"]; ?>"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                      &nbsp;&nbsp;
                      <a href="#" data-id="<?php echo $r["id"]; ?>" class="borrar"><i class="fa-solid fa-trash text-danger"></i>

                        <a href="modulo_roles_print.php?id=<?php echo $r["id"]; ?>"><i class="fa-solid fa-print"></i></a>
                        &nbsp;&nbsp;
                      </a>
                    </td>
                  </tr>
              <?php

                  $excel .= '<tr>';
                  $excel .= '<td>' . $r["id"] . '</td>';
                  $excel .= '<td>' . $r["role"] . '</td>';
                  $excel .= '</tr>';
                }
              }
              ?>
            </tbody>
          </table>

        </div> <!-- content -->


        <?php include("footer.php"); ?>


      </div>
    </div>
    <div id="exceldiv"></div>
    <form action="ficheroExcel.php" method="post" enctype="multipart/form-data" id="formExportar">
      <input type="hidden" value="Roles" name="nombreFichero">
      <input type="hidden" value="<?php echo $excel; ?>" name="datos_a_enviar">
    </form>

    <?php include("scripts.php"); ?>
    <script>
      $(document).ready(function() {

        $("#exportar").click(function() {
          $("#formExportar").submit();
        });

        $("#importar").click(function() {
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "Desea importar los datos?",
            text: "Se borrarán los datos existentes!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, importar!",
            cancelButtonText: "No!",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              let fileExcel = $("#fileExcel")[0].files[0];
              var formData = new FormData();
              formData.append("fileExcel", fileExcel);

              $.ajax({
                data: formData,
                method: "POST",
                processData: false,
                contentType: false,
                cache: false,
                url: "modulo_roles_importar.php",
                success: function(result) {
                  //alert(result);
                  if (result == 1) {
                    swalWithBootstrapButtons.fire({
                      title: "Importación!",
                      text: "Datos importados correctamente",
                      icon: "success"
                    });
                    location.reload();
                  } else {
                    swalWithBootstrapButtons.fire({
                      title: "Importación fallida!",
                      text: "Datos no importados",
                      icon: "error"
                    });
                  }
                }
              });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              /*   swalWithBootstrapButtons.fire({
                   title: "Cancelled",
                   text: "Your imaginary file is safe :)",
                   icon: "error"
                 });*/
            }
          });
        });

        $("#exportar2").click(function() {
          let nombreFichero = "Roles";
          let datos_a_enviar = '<?php echo $excel; ?>';
          $.ajax({
            data: {
              nombreFichero: nombreFichero,
              datos_a_enviar: datos_a_enviar
            },
            method: "POST",
            url: "ficheroExcel.php",
            success: function(result) {
              alert(result);
              WinId = window.open('ficheroExcel2.php', '_blank', '');
              // WinId.document.open('ficheroExcel2.php');
              WinId.document.write('<?php echo $excel; ?>');
              //WinId.document.close();
              //WinId.focus();
              WinId.print();
              //WinId.close();

            }
          });
        });

        $(".borrar").click(function() {
          let id = $(this).attr('data-id');
          let padre = $(this).parent().parent();
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "Desea eliminar el role?",
            text: "no hay vuelta atrás!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, borrar!",
            cancelButtonText: "No, mantener!",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {

              $.ajax({
                data: {
                  id: id
                },
                method: "POST",
                url: "modulo_roles_delete.php",
                success: function(result) {
                  if (result == 1) {
                    swalWithBootstrapButtons.fire({
                      title: "Eliminado!",
                      text: "Rol dado de baja",
                      icon: "success"
                    });
                    padre.hide();
                  } else {
                    swalWithBootstrapButtons.fire({
                      title: "No Eliminado!",
                      text: "Rol NO dado de baja",
                      icon: "error"
                    });
                  }
                }
              });
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
            }
          });
        });

        $("#tabla").DataTable({
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              previous: "<i class='mdi mdi-chevron-left'>",
              next: "<i class='mdi mdi-chevron-right'>"
            }
          },
          drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
          }

        });
      });
    </script>

</body>

</html>