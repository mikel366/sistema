<?php
session_start();
$url = PlantillaControlador::url();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Starter | Dashtrap - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $url; ?>vistas/assets/images/favicon.ico">
    
    <!-- Sweet Alert-->
    <link href="<?php echo $url; ?>vistas/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    
    <!-- App css -->
    <link href="<?php echo $url; ?>vistas/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url; ?>vistas/assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- third party css -->
    
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo $url ?>vistas/assets/js/scripts.js"></script>

</head>

<body>

    <?php if (isset($_SESSION["session"]) && $_SESSION["session"] == "ok") { ?>
    <!-- Begin page -->
    <div class="layout-wrapper">
    

        <!-- ========== Left Sidebar ========== -->
        <?php include 'vistas/modulos/menu.php'; ?>



        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <?php include 'vistas/modulos/header.php'; ?>



            <!-- ========== Topbar End ========== -->

            <?php

            if (isset($_GET["ruta"])) {
                $rutas = explode("/", $_GET["ruta"]);

                if (

                    $rutas[0] == "productos" ||
                    $rutas[0] == "usuarios" ||
                    $rutas[0] == "productos_eliminados" ||
                    $rutas[0] == "categorias" ||
                    $rutas[0] == "marcas" ||
                    $rutas[0] == "roles" ||
                    $rutas[0] == "home" ||
                    $rutas[0] == "usuarios_eliminados" ||
                    $rutas[0] === "salir"

                ) {
                    include "vistas/modulos/" . $rutas[0] . ".php";
                } else {
                    include "vistas/modulos/404.php";
                }
            } else {
                include "vistas/modulos/home.php";
            }

            ?>

            <!-- Footer Start -->
                <?php include 'vistas/modulos/footer.php'; ?>
            <!-- end Footer -->
            
        </div>

        <?php 
        }
        else
        {
            include 'vistas/modulos/login.php';
        } 
        ?>

        
        <!-- End Page content -->
        

    </div>
    <!-- END wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- App js -->
    <script src="<?php echo $url; ?>vistas/assets/js/vendor.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/js/app.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatables js -->
    <script src="<?php echo $url;?>vistas/assets/js/pages/datatables.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?php echo $url; ?>vistas/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?php echo $url ?>vistas/assets/js/productos.js"></script>
    <script src="<?php echo $url ?>vistas/assets/js/usuarios.js"></script>
    <script src="<?php echo $url ?>vistas/assets/js/categorias.js"></script>
    <script src="<?php echo $url ?>vistas/assets/js/marcas.js"></script>
    <script src="<?php echo $url ?>vistas/assets/js/roles.js"></script>


</body>

</html>
