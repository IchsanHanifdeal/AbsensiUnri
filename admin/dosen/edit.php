<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM admin WHERE username = '$username'";
$id_dosen = $_GET['id_dosen'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$foto_profil = $row['foto_profil'];
$sqld = "SELECT * FROM dosen WHERE id_dosen = '$id_dosen'";
$resultd = mysqli_query($conn, $sqld);
$rowd = mysqli_fetch_assoc($resultd);
$idDosen = $rowd['id_dosen'];
$no = 1;
$nip = $rowd['nip'];
$fotoprofil = $rowd['foto_profil'];
$username = $rowd['username'];
$nama = $rowd['nama'];
$alamat = $rowd['alamat'];
$kodepos = $rowd['kodepos'];
$gelardepan = $rowd['gelardepan'];
$gelarbelakang = $rowd['gelarbelakang'];
$tempat = $rowd['tempat'];
$tanggallahir = $rowd['tanggal_lahir'];
$jenisKelamin = $rowd['jenis_kelamin'];
$email = $rowd['email'];
$jabatan = $rowd['jabatan'];
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
                            <li class="nav-item menu-open">
                                <a href="dosen.php" class="nav-link active">
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

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">DOSEN | ABSENSI UNRI</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Data Dosen</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form id="editProfileForm" enctype="multipart/form-data" action="" method="POST">
                                        <div class="row gutters">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="account-settings">
                                                            <div class="user-profile">
                                                                <a data-toggle="modal" data-target="#profilePictureModal">
                                                                    <img class="profile-user-img img-fluid" src="../../uploads/<?php echo $fotoprofil; ?>" alt="User profile picture" style="width: 100%; height: auto;">
                                                                </a>
                                                                <div class="text-center">
                                                                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#changeProfilePictureModal">
                                                                        Ganti Foto
                                                                    </button>
                                                                </div>
                                                                <!-- Modal for displaying the larger image -->
                                                                <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body text-center">
                                                                                <img src="../../uploads/<?php echo $fotoprofil; ?>" alt="User profile picture" style="max-width: 100%;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal for changing profile picture -->
                                                                <div class="modal fade" id="changeProfilePictureModal" tabindex="-1" role="dialog" aria-labelledby="changeProfilePictureModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="changeProfilePictureModalLabel">Ganti Foto</h5>
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
                                                                <br>
                                                                <h5 class="user-name text-center"><?php echo $nama; ?></h5>
                                                                <h6 class="user-email text-center"><?php echo $email; ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <h6 class="mb-3 text-primary">Personal Details</h6>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" name="namalengkap" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $nama ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                                                    <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="Jenis Kelamin" value="<?php echo $jenisKelamin ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="Kode Pos">Kode Pos</label>
                                                                    <input type="number" class="form-control" name="kodepos" id="kodepos" placeholder="Kode Pos" value="<?php echo $kodepos ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="gelardepan">Gelar depan</label>
                                                                    <input type="text" class="form-control" name="gelardepan" id="gelardepan" placeholder="Jabatan Fungsional" value="<?php echo $gelardepan ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="gelarbelakang">Gelar belakang</label>
                                                                    <input type="text" class="form-control" name="gelarbelakang" id="gelarbelakang" placeholder="NIP" value="<?php echo $gelarbelakang ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="JabatanFungsional">Jabatan Fungsional</label>
                                                                    <input type="text" class="form-control" name="JabatanFungsional" id="JabatanFungsional" placeholder="Jabatan Fungsional" value="<?php echo $jabatan ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="nip">NIP</label>
                                                                    <input type="number" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $nip ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tempat">Tempat Lahir</label>
                                                                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir" value="<?php echo $tempat ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggallahir">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggal Lahir" value="<?php echo $tanggallahir ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggallahir">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                               <div class="text-right">
                                                                    <a type="button" id="submit" name="submit" class="btn btn-secondary" href="dosen.php">Cancel</a>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
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
        $nama = $_POST['namalengkap'];
        $jenisKelamin = $_POST['jeniskelamin'];
        $jabatan = $_POST['JabatanFungsional'];
        $nip = $_POST['nip'];
        $tempat = $_POST['tempat'];
        $tanggallahir = $_POST['tanggallahir'];
        $alamat = $_POST['alamat'];
        $kodepos = $_POST['kodepos'];
        $gelardepan = $_POST['gelardepan'];
        $gelarbelakang = $_POST['gelarbelakang'];
        $email = $_POST['email'];
        $fotoprofil = $_FILES['newProfilePicture']['name'];        
        $uploadDirectory = '../../uploads/';

        if (!empty($fotoprofil)) {
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
        $targetFilePath = $uploadDirectory . basename($fotoprofil);
        if (move_uploaded_file($_FILES['newProfilePicture']['tmp_name'], $targetFilePath)) {
            $querys = "UPDATE dosen SET 
            foto_profil ='$fotoprofil', 
            nip = '$nip',
            nama = '$nama',
            alamat = '$alamat', 
            kodepos = '$kodepos',
            gelardepan = '$gelardepan',
            gelarbelakang = '$gelarbelakang',
            tempat = '$tempat',
            tanggal_lahir = '$tanggallahir',
            jenis_kelamin = '$jenisKelamin',
            jabatan = '$jabatan',
            email = '$email'
            WHERE 
            id_dosen='$idDosen'";
        } else {
            echo '<script>
                swal.fire({
                    title: "Error",
                    text: "Error uploading file.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            </script>';
            exit; 
        }
    } else {
        $querys = "UPDATE dosen SET 
        nip = '$nip',
            nama = '$nama',
            alamat = '$alamat', 
            kodepos = '$kodepos',
            gelardepan = '$gelardepan',
            gelarbelakang = '$gelarbelakang',
            tempat = '$tempat',
            tanggal_lahir = '$tanggallahir',
            jenis_kelamin = '$jenisKelamin',
            jabatan = '$jabatan',
            email = '$email'
            WHERE 
            id_dosen='$idDosen'";
    }

    if (mysqli_query($conn, $querys)) {
        echo '<script>
                swal.fire({
                    title: "Sukses",
                    text: "Data Berhasil di Update!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "dosen.php";
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