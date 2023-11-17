<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$status = $_SESSION['role'];
$sql = "SELECT * FROM dosen WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_dosen = $row['id_dosen'];
$foto_profil = $row['foto_profil'];
$nama = $row['nama'];
$tempat = $row['tempat'];
$alamat = $row['alamat'];
$tanggal_lahir = $row['tanggal_lahir'];
$jeniskelamin = $row['jenis_kelamin'];
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
                            <li class="nav-item menu-open">
                                <a href="profil.php" class="nav-link active">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profil
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../matakuliah/matakuliah.php" class="nav-link">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">PROFIL | ABSENSI UNRI</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

                        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-title">Profile</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-3 col-6">
                                            <a data-toggle="modal" data-target="#profilePictureModal">
                                                <img class="profile-user-img img-fluid" src="../../uploads/<?php echo $foto_profil; ?>" alt="User profile picture" style="width: 100%; height: auto;">
                                            </a>
                                            <!-- Modal for displaying the larger image -->
                                            <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <img src="../../uploads/<?php echo $foto_profil; ?>" alt="User profile picture" style="max-width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6 col-6">
                                            <div class="row">
                                                <div class="col"><strong>Nama:</strong></div>
                                                <div class="col-sm-6"><?php echo $nama ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><strong>Tempat/Tanggal Lahir:</strong></div>
                                                <div class="col-sm-6"><?php echo $tempat ."/". $tanggal_lahir; ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><strong>Alamat:</strong></div>
                                                <div class="col-sm-6"><?php echo $alamat ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><strong>Jenis Kelamin:</strong></div>
                                                <div class="col-sm-6"><?php echo $jeniskelamin ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><strong>Status:</strong></div>
                                                <div class="col-sm-6"><?php echo $status ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                        </div>
            </section>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2023<a href="instagram.com"> Ichsan Hanifdeal</a>.</strong>
        </div>
        </footer>
    </div>

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
</body>
</html>