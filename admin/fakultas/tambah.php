<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username']; 
$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$foto_profil = $row['foto_profil'];
$sqlf = "SELECT * FROM fakultas";
$resultf = mysqli_query($conn, $sqlf);
$rowf = mysqli_fetch_assoc($resultf);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | Fakultas</title>

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
                            <li class="nav-item menu-open">
                                <a href="fakultas.php" class="nav-link active">
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
                            <li class="nav-item">
                                <a href="../mahasiswa/mahasiswa.php" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Mahasiswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/logout.php" class="nav-link">
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

                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">FAKULTAS | ABSENSI UNRI</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Fakultas</h3>
                                </div>
                                <div class="card-body">
                                <form id="editProfileForm" enctype="multipart/form-data" action="" method="POST">
                                    <div class="row">
                                        <div class="col-sm-3 col-6">
                                            <img id="newProfilePicturePreview" class="mt-2" style="max-width: 100%; display: none;">
                                            <span id="newProfilePictureFileName" class="mt-2" style="display: none;"></span>
                                            <label for="newProfilePictureInput" class="btn btn-primary mt-2">
                                                Pilih Foto Baru
                                                <input type="file" name="newProfilePicture" id="newProfilePictureInput" style="display: none;" accept="image/*" onchange="displayNewFileName()">
                                            </label>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <div class="col">Nama:</div>
                                                <div class="col-sm-10">
                                                    <input name="nama" type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-2">Deskripsi:</div>
                                                <div class="col-sm-10 mt-2">
                                                    <textarea name="deskripsi" type="text" class="form-control" value=""></textarea>
                                                </div>
                                            </div>
                                            <div class="button-container text-right">
                                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                                <a class="btn btn-secondary mt-3 ml-2" href="fakultas.php">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    <!-- AdminLTE for demo purposes -->
    <script src="../../backend/app/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../backend/app/dist/js/pages/dashboard2.js"></script>
    <script>
        function displayNewFileName() {
        var input = document.getElementById('newProfilePictureInput');
        var fileNameContainer = document.getElementById('newProfilePictureFileName');
        var previewImage = document.getElementById('newProfilePicturePreview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);

            fileNameContainer.textContent = input.files[0].name;
            fileNameContainer.style.display = 'block';
        }
    }    
    </script>
    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $fotoprofil = $_FILES['newProfilePicture']['name'];
    $uploadDirectory = '../../uploads/';

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $targetFilePath = $uploadDirectory . basename($fotoprofil);

    if (move_uploaded_file($_FILES['newProfilePicture']['tmp_name'], $targetFilePath)) {
        $querys = "INSERT INTO fakultas (nama_fakultas, deskripsi, foto_profil) VALUES ('$nama','$deskripsi','$fotoprofil')";

        if (mysqli_query($conn, $querys)) {
            echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Data berhasil di input!",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "fakultas.php";
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
    } else {
        echo '<script>
                swal.fire({
                    title: "Error",
                    text: "Error uploading file.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            </script>';
    }
}
?>

</body>

</html>
