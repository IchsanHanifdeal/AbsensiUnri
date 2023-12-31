<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$foto_profil = $row['foto_profil'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | Profil</title>

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

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="rounded-circle animation__wobble" src="../../uploads/<?php echo $foto_profil ?>" alt="AdminLTELogo" height="60" width="60" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="../../backend/app/#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../dashboard.php" class="brand-link">
                <img src="../../uploads/<?php echo $foto_profil; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light"><?php echo $username ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
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
                                <a href="../fakultas/fakultas.php" class="nav-link">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>
                                        Fakultas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../jurusan/jurusan.php" class="nav-link">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Jurusan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../dosen/dosen.php" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Dosen
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
                                                <th>Aksi</th>
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
                                                        <td class="text-center">
                                                            <a href="detail.php?id_mahasiswa=<?php echo $idMahasiswa; ?>" class="btn btn-success">
                                                                <i class="fas fa-info-circle"></i>
                                                            </a>
                                                            <a href="edit.php?id_mahasiswa=<?php echo $idMahasiswa; ?>" class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-danger" href="#" onclick="confirmDelete(<?php echo $idMahasiswa; ?>)"><i class="fas fa-trash"></i></a>
                                                        </td>
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
                            <div class="text-right">
                            <a class="btn btn-primary" href="tambah.php"> Tambah </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2023<a href="instagram.com"> Ichsan Hanifdeal</a>.</strong>
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

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
    <script src="../../backend/app/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../backend/app/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../backend/app/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../backend/app/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../backend/app/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../backend/app/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../backend/app/plugins/jszip/jszip.min.js"></script>
    <script src="../../backend/app/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../backend/app/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../backend/app/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../backend/app/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../backend/app/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script src="../../backend/app/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../backend/app/dist/js/pages/dashboard2.js"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
    function confirmDelete(id_mahasiswa) {
    Swal.fire({
        title: "Apa kamu yakin?",
        text: "Ketika dihapus, Anda tidak dapat mengembalikan data ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "hapus.php?id_mahasiswa=" + id_mahasiswa;
        } else {
        }
    });
    }
    </script>

</body>

</html>