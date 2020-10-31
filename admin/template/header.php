<?php
$user = current_user();
$rol = current_profile();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=BASE_URL?>/uploads/logo/logo.png" rel="shortcut icon" type="image/x-icon" />
    <title><?php if (!empty($page_title))
                echo remove_junk($page_title);
            elseif (!empty($user))
                echo ucfirst($user['name']);
            else echo "Sistema Medik"; ?>
    </title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/dist/css/adminlte.min.css ">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/toastr/toastr.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= BASE_URL ?>/admin/home/index" class="nav-link"><i class="fa fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= BASE_URL ?>" class="nav-link"><i class="fa fa-globe"></i> Sitio</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= BASE_URL ?>/uploads/profiles/profile.png" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"> <?= $user['name'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= BASE_URL ?>/uploads/profiles/profile.png" class="img-circle elevation-2" alt="User Image">
                            <p>
                                <?= $user['name'] . '<br>' . $user['email'] ?><br>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?= BASE_URL ?>/admin/login/profile.php" class="btn btn-default btn-flat">Perfil</a>
                            <a href="<?= BASE_URL ?>/admin/login/logout.php" class="btn btn-default btn-flat float-right">Salir <i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= BASE_URL ?>/admin/home/index" class="brand-link">
                <img src="<?= BASE_URL ?>/uploads/logo/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Sistema</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header"> <i class="nav-icon fas fa-bars"></i> Menu</li>
                        <?php
                        if ($user['rol_id'] == 1) {
                        ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Configuración
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= BASE_URL ?>/admin/users/index.php" class="nav-link">
                                            <i class="far fa-user nav-icon"></i>
                                            <p>Usuarios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>