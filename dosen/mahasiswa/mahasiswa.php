<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$status = $_SESSION['role'];
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
                            <li class="nav-item">
                                <a href="../profil/profil.php" class="nav-link">
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
                            <li class="nav-item menu-open">
                                <a href="mahasiswa.php" class="nav-link active">
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
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Mahasiswa</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Tempat/Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Email</th>
                                                <th>No Hp</th>
                                                <th>Fakultas</th>
                                                <th>Jurusan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sqld = "SELECT * FROM mahasiswa";
                                            $resultd = mysqli_query($conn, $sqld);

                                            if ($resultd) {
                                                while ($rowd = mysqli_fetch_assoc($resultd)) {
                                                    $idMahasiswa = $rowd['id_mahasiswa'];
                                                    $nim = $rowd['nim'];
                                                    $nama = $rowd['nama'];
                                                    $tempat = $rowd['tempat'];
                                                    $tanggallahir = $rowd['tanggal_lahir'];
                                                    $jenisKelamin = $rowd['jenis_kelamin'];
                                                    $email = $rowd['email'];
                                                    $nohp = $rowd['nohp'];
                                                    $id_fakultas = $rowd['id_fakultas'];
                                                    $id_jurusan = $rowd['id_jurusan'];

                                                    $sqlf = "SELECT * FROM fakultas WHERE id_fakultas = '$id_fakultas'";
                                                    $resultf = mysqli_query($conn, $sqlf);
                                                    $fakultas = ($resultf && $rowf = mysqli_fetch_assoc($resultf)) ? $rowf['nama_fakultas'] : '';

                                                    $sqlj = "SELECT * FROM jurusan WHERE id_jurusan = '$id_jurusan'";
                                                    $resultj = mysqli_query($conn, $sqlj);
                                                    $jurusan = ($resultj && $rowj = mysqli_fetch_assoc($resultj)) ? $rowj['nama_jurusan'] : '';
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $nama ?></td>
                                                        <td><?php echo $nim ?></td>
                                                        <td><?php echo $tempat . "/" . $tanggallahir ?></td>
                                                        <td><?php echo $jenisKelamin ?></td>
                                                        <td><?php echo $email ?></td>
                                                        <td><?php echo $nohp; ?></td>
                                                        <td><?php echo $fakultas ?></td>
                                                        <td><?php echo $jurusan ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='10'>Tidak ada data.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
</body>
</html>