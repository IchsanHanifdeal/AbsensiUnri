<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$status = $_SESSION['role'];
$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_admin = $row['id_admin'];
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>


</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../../backend/app/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
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
                <img src="../../uploads/<?php echo $foto_profil; ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light"><?php echo $username; ?></span>
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
                            <li class="nav-item menu-open">
                                <a href="profil.php" class="nav-link active">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profil
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
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
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Users</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3 col-6">
                                            <a data-toggle="modal" data-target="#profilePictureModal">
                                                <img class="profile-user-img img-fluid" src="../../uploads/<?php echo $foto_profil; ?>" alt="User profile picture" style="width: 100%; height: auto;">
                                            </a>
                                            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#changeProfilePictureModal">
                                                Ganti Foto Profil
                                            </button>
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
                                            <!-- Modal for changing profile picture -->
                                            <div class="modal fade" id="changeProfilePictureModal" tabindex="-1" role="dialog" aria-labelledby="changeProfilePictureModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="changeProfilePictureModalLabel">Ganti Foto Profil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="changeProfilePictureForm" enctype="multipart/form-data" action="" method="POST">
                                                                <input type="file" name="newProfilePicture" id="newProfilePictureInput" style="display: none;" accept="image/*" onchange="displayNewFileName()">
                                                                <button type="button" class="btn btn-primary" onclick="document.getElementById('newProfilePictureInput').click()">Pilih Foto Baru</button>
                                                                <img id="newProfilePicturePreview" class="mt-2" style="max-width: 100%; display: none;">
                                                                <span id="newProfilePictureFileName" class="mt-2" style="display: none;"></span>
                                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-8 col-12">
                                            <form method="POST" action="">
                                                <div class="row">
                                                    <div class="col">Nama:</div>
                                                    <div class="col-sm-10">
                                                        <input name="nama" type="text" class="form-control" value="<?php echo $nama; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">Tempat:</div>
                                                    <div class="col-sm-10 mt-2">
                                                        <input name="tempat" type="text" class="form-control" value="<?php echo $tempat; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">Tanggal Lahir:</div>
                                                    <div class="col-sm-10 mt-2">
                                                        <input name="tanggal_lahir" type="date" class="form-control" value="<?php echo $tanggal_lahir; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">Alamat:</div>
                                                    <div class="col-sm-10 mt-2">
                                                        <input name="alamat" type="text" class="form-control" value="<?php echo $alamat; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">Jenis Kelamin:</div>
                                                    <div class="col-sm-10 mt-2">
                                                        <select name="jeniskelamin" class="form-control">
                                                            <option value="Laki-laki" <?php echo ($jeniskelamin == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                            <option value="Perempuan" <?php echo ($jeniskelamin == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                            <option value="Lainnya" <?php echo ($jeniskelamin == 'undefined') ? 'selected' : ''; ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">Status:</div>
                                                    <div class="col-sm-10 mt-2">
                                                        <input type="text" class="form-control" value="<?php echo $status; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="button-container text-right">
                                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                                    <a class="btn btn-secondary mt-3 ml-2" href="profil.php">Batal</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foto_profil = $_FILES['newProfilePicture']['name'];
    $tmp_name = $_FILES['newProfilePicture']['tmp_name'];

    if ($_FILES['newProfilePicture']['error'] === 0) {
        $newProfilePicturePath = '../../uploads/' . basename($foto_profil);

        if (move_uploaded_file($tmp_name, $newProfilePicturePath)) {
            $ambil = $conn->query("SELECT `foto_profil` FROM admin WHERE id_admin = '$id_admin'");
            $tampil = $ambil->fetch_assoc();
            $oldProfilePicturePath = $tampil['foto_profil'];

            if ($oldProfilePicturePath && file_exists($oldProfilePicturePath)) {
                unlink($oldProfilePicturePath);
            }

            $updateQuery = "UPDATE admin SET foto_profil = '$foto_profil' WHERE id_admin = '$id_admin'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                header("Location: profil.php");
                exit();
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload the profile picture.";
        }
    } else {
        echo "Tidak ada file gambar yang dipilih atau terjadi kesalahan.";
    }
}
?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];

    $update_query = "UPDATE admin SET nama='$nama', tempat='$tempat', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jenis_kelamin='$jeniskelamin' WHERE id_admin=$id_admin";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Profil berhasil diperbarui.',
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    window.location.href = 'profil.php';
                });
             </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal memperbarui profil. Silakan coba lagi.',
                });
             </script>";
    }
}

?>
</body>

</html>