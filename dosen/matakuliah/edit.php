<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$status = $_SESSION['role'];
$id_matkul = $_GET['id_matkul'];
$sqlf = "SELECT * FROM matakuliah WHERE id_matkul = '$id_matkul'";
$resultf = mysqli_query($conn, $sqlf);
$rowf = mysqli_fetch_assoc($resultf);
$nama = $rowf['nama'];
$jumlah = $rowf['jumlah_mahasiswa'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../backend/app/plugins/fontawesome-free/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../backend/app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../backend/app/dist/css/adminlte.min.css" />
    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>


</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="rounded-circle animation__wobble" src="../uploads/<?php echo $foto_profil; ?>" alt="logo" height="60" width="60" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="../backend/app/#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../dashboard.php" class="brand-link">
                <img src="../../uploads/<?php echo $foto_profil ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light"><?php echo $username; ?></span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <nav class="mt-2">
                            <li class="nav-item">
                                <a href="../Dashboard.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../profil/profil.php" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profil
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item menu-open">
                                <a href="matakuliah.php" class="nav-link active">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Mata Kuliah
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../mahasiswa/mahasiswa.php" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Mahasiswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/Logout.php" class="nav-link">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>
                                        Log Out
                                    </p>
                                </a>
                            </li>
                        </nav>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">MAHASISWA | ABSENSI UNRI</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Mata Kuliah</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form id="editProfileForm" enctype="multipart/form-data" action="" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="namaMatkul">Nama Mata Kuliah:</label>
                                                        <input name="nama" type="text" class="form-control" id="namaMatkul" value="<?php echo $nama; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="jumlahMahasiswa">Jumlah Mahasiswa:</label>
                                                        <input name="jumlah" type="number" class="form-control" id="jumlahMahasiswa" value="<?php echo $jumlah; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2023<a href="instagram.com"> Ichsan Hanifdeal</a>.</strong>
    </footer>

    <!-- REQUIRED SCRIPTS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <!-- jQuery -->
    <script src="../../backend/app/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../backend/app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../backend/app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../backend/app/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->

    <!-- AdminLTE for demo purposes -->
    <script src="../../backend/app/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../backend/app/dist/js/pages/dashboard2.js"></script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_matkul = $_POST['id_matkul'];
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $querys = "UPDATE matakuliah SET
        nama = '$nama', 
        jumlah_mahasiswa = '$jumlah' WHERE id_matkul = '$id_matkul'";
        if (mysqli_query($conn, $querys)) {
            echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Data berhasil di edit!",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "matakuliah.php";
                    });
                </script>';
        } else {
            echo '<script>
                    swal.fire({
                        title: "Error",
                        text: "Error: ' . mysqli_error($conn) . '",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                </script>';
        }
    }
    ?>
</body>
</html>