<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
        rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">


    <script
        src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
        crossorigin="anonymous">
    </script>

    <style>
        body {
            background-color: #000;
            color: #fff;
            overflow-x: hidden;
        }

        .dashboard-background {
            position: relative;
            min-height: 550px;
            padding: 40px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            animation: backgroundSlide 16s infinite;
        }

        .dashboard-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.15),
                    rgba(0, 0, 0, 0.9));
        }

        .dashboard-content {
            position: relative;
            z-index: 2;
        }

        .image-slider {
            width: 430px;
            max-width: 100%;
            overflow: hidden;
            margin-left: auto;
        }

        .image-container {
            display: flex;
            gap: 20px;
            animation: imageSlide 16s ease-in-out infinite;
        }

        .image-container img {
            width: 200px;
            height: 250px;
            flex-shrink: 0;
            object-fit: cover;
            border: 2px solid #fff;
            border-radius: 20px;
        }

        @keyframes imageSlide {

            0%,
            15% {
                transform: translateX(0);
            }

            20%,
            40% {
                transform: translateX(-220px);
            }

            45%,
            65% {
                transform: translateX(-440px);
            }

            70%,
            95% {
                transform: translateX(-650px);
            }

            100% {
                transform: translateX(0);
            }
        }

        @keyframes backgroundSlide {

            0%,
            15% {
                background-image: url("Chinese-Mount.jpg");
            }

            20%,
            45% {
                background-image: url("Violet.jpg");
            }

            50%,
            70% {
                background-image: url("Bamboo.jpg");
            }

            75%,
            95% {
                background-image: url("Whale.jpg");
            }

            100% {
                background-image: url("Chinese-Mount.jpg");
            }
        }

        .card {
            color: #212529;
        }


        @media (max-width: 768px) {
            .dashboard-background {
                min-height: 450px;
                padding: 20px;
            }

            .image-slider {
                margin: 30px auto 0;
            }

            .image-container img {
                width: 160px;
                height: 210px;
            }
        }

        .sb-sidenav .nav-link.active-menu {
            border-left: 4px solid #0d6efd !important;
            background-color: rgba(13, 110, 253, 0.15) !important;
            color: #ffffff;
            padding-left: 12px;
        }

        .sb-sidenav .nav-link.active-menu .sb-nav-link-icon {
            color: #0d6efd;
        }

        .sb-sidenav .nav-link {
            border-left: 4px solid transparent;
            transition: all 0.2s ease;
        }
    </style>
</head>

<body class="sb-nav-fixed">


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand ps-3" href="index.php">
            Razi's Inventory App
        </a>

        <button
            class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
            id="sidebarToggle"
            type="button">

            <i class="fas fa-bars"></i>
        </button>

        <!-- Search -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3">

            <div class="input-group">

                <input
                    class="form-control"
                    type="text"
                    placeholder="Search..."
                    aria-label="Search">

                <button
                    class="btn btn-primary"
                    type="button">

                    <i class="fas fa-search"></i>

                </button>

            </div>

        </form>

        <!-- User Menu -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

            <li class="nav-item dropdown">

                <a
                    class="nav-link dropdown-toggle"
                    id="navbarDropdown"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <i class="fas fa-user fa-fw"></i>

                </a>

                <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdown">

                    <li>
                        <a class="dropdown-item" href="logout.php">
                            Logout
                        </a>
                    </li>

                </ul>

            </li>

        </ul>

    </nav>

    <div id="layoutSidenav">


        <div id="layoutSidenav_nav">

            <nav
                class="sb-sidenav accordion sb-sidenav-dark"
                id="sidenavAccordion">

                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Page</div>

                        <a class="nav-link active-menu" href="index.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="stock.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-boxes-stacked"></i>
                            </div>
                            Stock Barang
                        </a>

                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-dolly"></i>
                            </div>
                            Barang Masuk
                        </a>

                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            Barang Keluar
                        </a>
                    </div>
                </div>


        </div>

        </nav>

    </div>

    <div id="layoutSidenav_content">

        <main>

            <div class="container-fluid px-4">

                <h1 class="mt-4">
                    Dashboard
                </h1>

                <ol class="breadcrumb mb-4">

                    <li class="breadcrumb-item active">
                        Dashboard
                    </li>

                </ol>


                <div class="dashboard-background rounded mb-4">

                    <div class="dashboard-overlay"></div>

                    <div class="dashboard-content">

                        <div class="row align-items-center">

                            <div class="col-lg-6">

                                <h5 class="text-uppercase">
                                    Welcome to
                                </h5>

                                <h1 class="display-4 fw-bold">
                                    Razi's Inventory
                                </h1>

                                <p class="lead">
                                    Sistem informasi untuk mengelola
                                    stock barang, barang masuk,
                                    dan barang keluar.
                                </p>

                            </div>

                            <div class="col-lg-6">

                                <div class="image-slider">

                                    <div class="image-container">

                                        <img
                                            src="Chinese-Mount.jpg"
                                            alt="Chinese Mountain">

                                        <img
                                            src="Violet.jpg"
                                            alt="Violet">

                                        <img
                                            src="Bamboo.jpg"
                                            alt="Bamboo">

                                        <img
                                            src="Whale.jpg"
                                            alt="Whale">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">


                    <div class="col-xl-6">

                        <div class="card mb-4">

                            <div class="card-header">

                                <i class="fas fa-chart-area me-1"></i>

                                Jumlah Produksi Pasar Global

                            </div>

                            <div class="card-body">

                                <canvas
                                    id="myAreaChart"
                                    width="100%"
                                    height="40">
                                </canvas>

                            </div>

                        </div>

                    </div>


                    <!-- BAR CHART -->

                    <div class="col-xl-6">

                        <div class="card mb-4">

                            <div class="card-header">

                                <i class="fas fa-chart-bar me-1"></i>

                                Diagram Penjualan

                            </div>

                            <div class="card-body">

                                <canvas
                                    id="myBarChart"
                                    width="100%"
                                    height="40">
                                </canvas>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card mb-4">

                    <div class="card-header">

                        <i class="fas fa-table me-1"></i>

                        Anggota

                    </div>

                    <div class="card-body">

                        <table
                            id="datatablesSimple"
                            class="table table-striped">

                            <thead>
                                <tr>
                                    <th>
                                        <i class="fas fa-user me-1"></i>
                                        Nama
                                    </th>
                                    <th>
                                        <i class="fas fa-briefcase me-1"></i>
                                        Posisi
                                    </th>
                                    <th>
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        Alamat
                                    </th>
                                    <th>
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        Umur
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Razi Enshion</b>
                                    </td>
                                    <td>
                                        Full Stack
                                    </td>
                                    <td>
                                        Medan
                                    </td>
                                    <td>
                                        21
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Fei Ari</b>
                                    </td>
                                    <td>
                                        Supporter / Helper
                                    </td>
                                    <td>
                                        Filipino
                                    </td>
                                    <td>
                                        17
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- =========================
                FOOTER
            ========================= -->

        <footer class="py-4 bg-light mt-auto">

            <div class="container-fluid px-4">

                <div class="d-flex align-items-center justify-content-between small">

                    <div class="text-muted">
                        Copyright &copy; Razi's Website 2026
                    </div>
                    <div>
                        <a href="#">
                            Privacy Policy
                        </a>
                        &middot;
                        <a href="#">
                            Terms &amp; Conditions
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
    </script>

    <script src="js/scripts.js"></script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
        crossorigin="anonymous">
    </script>

    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous">
    </script>

    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>