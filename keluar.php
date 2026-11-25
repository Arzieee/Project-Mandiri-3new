<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Barang Keluar Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>


<style>
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

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">Razi's Inventory App</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    <li><a class="dropdown-item" href="#">Change Account</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Page</div>

                        <a class="nav-link" href="index.php">
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

                        <a class="nav-link active-menu" href="keluar.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            Barang Keluar
                        </a>
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">
                        <i class="fas fa-truck me-2"></i>
                        Barang Keluar
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Jumlah barang yang telah keluar</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header bg-dark">

                            <button type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#myModal">

                                <i class="fas fa-plus me-2"></i>
                                Tambah Barang Keluar

                            </button>

                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-calendar me-1"></i> Tanggal</th>
                                        <th><i class="fas fa-box me-1"></i> Nama Barang</th>
                                        <th><i class="fas fa-minus-circle me-1"></i> Jumlah Keluar</th>
                                        <th><i class="fas fa-user me-1"></i> Penerima</th>
                                        <th><i class="fas fa-cog me-1"></i> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM keluar k, stock s where s.id_barang = k.barang_id");
                                    while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                        $tanggal = $data['tanggal'];
                                        $nama_barang = $data['nama_barang'];
                                        $qty = $data['qty'];
                                        $penerima = $data['penerima'];

                                    ?>

                                        <tr>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $nama_barang; ?></td>
                                            <td><span class="badge bg-danger">
                                                    <i class="fas fa-arrow-down me-1"></i>
                                                    -<?php echo $qty; ?> Unit
                                                </span></td>
                                            <td><?php echo $penerima; ?></td>
                                            <td>
                                                <a href="hapus_stock.php?id=<?php echo $data['id_barang']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus riwayat barang keluar ini?')">
                                                    <i class="fas fa-trash me-1"></i>
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Silahkan Masukkan Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <select name="barangnya" class="form-control">
                        <?php
                        $ambilsemuadata = mysqli_query($conn, "SELECT * FROM stock");
                        while ($fetcharray = mysqli_fetch_array($ambilsemuadata)) {
                            $namabarangnya = $fetcharray['nama_barang'];
                            $idbarangnya = $fetcharray['id_barang'];
                        ?>

                            <option value="<?php echo $idbarangnya; ?>"><?php echo $namabarangnya; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <input type="number" name="qty" placeholder="quantity" class="form-control" required>
                    <br>
                    <input type="text" name="penerima" placeholder="penerima" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="addbarangkeluar">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>