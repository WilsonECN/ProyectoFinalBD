<?php

session_start();
if($_SESSION["s_usuario"] === null){
	header("location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="./assets/main.css">  
    <title>Inicio</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php 

    if(isset($_POST['btnClientes'])) { 
        $_SESSION["s_dash"] = "CLIENTES BUTON";
    }
     ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-light text-dark  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                <img class="img-profile rounded-circle" src="assets/img/img.png">
                </div>
                <div class="sidebar-brand-text mx-3 text-dark">WPD<sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider bg-secondary">
            <!-- Heading -->
            <div class="sidebar-heading text-secondary">
                Usuarios
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link text-dark text-dark button" href="clientes.php" name="btnClientes">
                    <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
                    <span>Clientes</span></a>
            </li>

            <?php 
            
            if($_SESSION["s_acceso"] == 1){
                echo '
                <hr class="sidebar-divider bg-secondary">
                <div class="sidebar-heading text-secondary">
                    Administrador
                </div>
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="Bitacora.php">
                        <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
                        <span>Bitácora</span></a>
                </li>';
            }
            
            ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 bg-secondary" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    
                    <h1 style="font-size:2vw;text-align:center;">CLIENTES</h1>
                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php $usuario= $_POST['nombre'];?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["s_usuario"];?></span>
                                <img class="img-profile rounded-circle"
                                    src="assets/img/undraw_profile_2.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sessión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
