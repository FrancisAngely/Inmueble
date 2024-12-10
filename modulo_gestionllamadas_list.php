<!DOCTYPE html>
<html lang="es" data-bs-theme="light" data-menu-color="light" data-topbar-color="dark">

<?php include("head.php"); ?>

<body>
    <div class="layout-wrapper">

        <?php include("leftsidebar.php"); ?>


        <div class="page-content">


            <?php include("topbar.php"); ?>

            <div class="px-3">

                <?php

                if ($_SESSION["id_roles"] == "1") {
                    include("modulo_provincias_admin_list.php");
                } else {
                    echo "<h1> Area restringida : SOLO ADMINS</h1>";
                }
                ?>

            </div> 
           <?php include("scripts.php"); ?>

            <?php include("footer.php"); ?>


        </div>
    </div>

</body>

</html>




