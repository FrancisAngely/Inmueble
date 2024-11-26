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
                        <h1 class="h2">Graficas</h1>
                        <!--<a href="modulo__new.php" class="btn btn-primary">Nuevo</a>-->
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Line with Data Labels</h4>

                                <div id="cardCollpase2" class="collapse show" dir="ltr">
                                    <div id="apex-line-1" class="apex-charts pt-3" data-colors="#00acc1,#1abc9c"></div>
                                </div> <!-- collapsed end -->
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- content -->
                <?php include("footer.php"); ?>
            </div>
        </div>
        <?php include("scripts.php"); ?>
        <?php
        include("db.php");
        $Meses = array(
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        );

        /*$sqlGraph = "SELECT COUNT(`id`) as num , MONTH(fecha) as mes FROM `eventos` WHERE YEAR(fecha)=2024 GROUP BY MONTH(fecha);";
        $query = $mysqli->query($sqlGraph);
        $data = array();
        $categorias = array();
        if ($query->num_rows > 0) {
            while ($fila = $query->fetch_assoc()) {
                array_push($data, $fila["num"]);
                array_push($categorias, "'" . $Meses[$fila["mes"] - 1] . "'");
            }
        }*/

        ?>


        <?php include("scripts.php"); ?>
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
        <!-- <script src="assets/js/pages/apexcharts.js"></script>-->
        <script>
            dataColors = $("#apex-line-1").data("colors");
            options = {
                chart: {
                    height: 380,
                    type: "line",
                    zoom: {
                        enabled: !1
                    },
                    toolbar: {
                        show: !1
                    }
                },
                colors: colors = dataColors ? dataColors.split(",") : colors,
                dataLabels: {
                    enabled: !0
                },
                stroke: {
                    width: [3, 3],
                    curve: "smooth"
                },
                series: [{
                    name: "Eventos",
                    data: [<?php echo implode(",", $data); ?>]
                }],
                title: {
                    text: "Eventos  ",
                    align: "left",
                    style: {
                        fontSize: "14px",
                        color: "#666"
                    }
                },
                grid: {
                    row: {
                        colors: ["transparent", "transparent"],
                        opacity: .2
                    },
                    borderColor: "#f1f3fa"
                },
                markers: {
                    style: "inverted",
                    size: 6
                },
                xaxis: {
                    categories: [<?php echo implode(",", $categorias); ?>],
                    title: {
                        text: "Month"
                    }
                },
                yaxis: {
                    title: {
                        text: "Nº eventos"
                    },
                    min: 5,
                    max: 40
                },
                legend: {
                    position: "top",
                    horizontalAlign: "right",
                    floating: !0,
                    offsetY: -25,
                    offsetX: -5
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            toolbar: {
                                show: !1
                            }
                        },
                        legend: {
                            show: !1
                        }
                    }
                }]
            }
            chart = new ApexCharts(document.querySelector("#apex-line-1"), options);
            colors = (chart.render(), ["#f672a7"]);
        </script>

</body>

</html>