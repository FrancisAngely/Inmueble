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
                        <h1 class="h2">Graficas</h1>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Precio Promedio de Inmuebles</h4>

                                <canvas id="miGrafica" width="400" height="200"></canvas>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- content -->

                <?php include("footer.php"); ?>
            </div>
        </div>

        <?php include("db.php"); ?>

        <?php
        $sqlGraph = "SELECT l.localidad AS localidad, AVG(i.precio) AS precio_promedio FROM inmuebles i JOIN localidades l ON i.id_localidades = l.id GROUP BY l.localidad;";
        $query = $mysqli->query($sqlGraph);
        $localidades = [];
        $precios = [];

        if ($query->num_rows > 0) {
            while ($fila = $query->fetch_assoc()) {
                $localidades[] = $fila['localidad'];
                $precios[] = $fila['precio_promedio'];
            }
        }
        ?>

        <?php include("scripts.php"); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Asegúrate de incluir Chart.js -->
        <script>
            const ctx = document.getElementById('miGrafica').getContext('2d');
            const miGrafica = new Chart(ctx, {
                type: 'bar', // Tipo de gráfico
                data: {
                    labels: <?php echo json_encode($localidades); ?>,
                    datasets: [{
                        label: 'Precio Promedio',
                        data: <?php echo json_encode($precios); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

</body>

</html>