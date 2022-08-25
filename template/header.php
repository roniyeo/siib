<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        .data{
            display: none;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="assets/img/logo_honda_3.jpeg">
    <title>SIIB | HONDA</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="assets/img/logo_honda_1.jpeg" alt="Logo Perusahaan" class="animation__shake" height="60"
                width="120">
        </div>
        <!-- preloader -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- left nav -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- left nav -->

            <!-- right nav -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="include/logout.php" role="button">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
            <!-- right nav -->
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- logo -->
            <a href="./" class="brand-link">
                <img src="assets/img/logo_honda_2.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SIIB</span>
            </a>
            <!-- logo -->

            <!-- user -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="assets/img/profile.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-decoration-none text-white"><?php echo $_SESSION['fullname']; ?></a>
                </div>
            </div>
            <!-- user -->

            <!-- search -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- search -->

            <!-- menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <?php
                        if ($_SESSION['role'] == "Admin") {
                    ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: white;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?p=pegawai" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?p=gudang" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Warehouse</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?p=barang" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: white;">
                            <i class="nav-icon fas fas fa-edit"></i>
                            <p>
                                Data Form
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?p=request" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?p=kembali" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Pengembalian</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: white;">
                            <i class="nav-icon fas fas fa-edit"></i>
                            <p>
                                Data Form
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?p=request" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?p=kembali" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Pengembalian</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
            <!-- menu -->
        </aside>
        <!-- Sidebar -->