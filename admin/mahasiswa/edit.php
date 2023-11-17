<?php 
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['username'];
$idMahasiswa = $_GET['id_mahasiswa'];

$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$foto_profil = $row['foto_profil'];

$sqld = "SELECT * FROM mahasiswa WHERE id_mahasiswa='$idMahasiswa'";
$resultd = mysqli_query($conn, $sqld);
$rowd = mysqli_fetch_assoc($resultd);
$fotoprofil = $rowd['foto_profil'];
$nim = $rowd['nim'];
$nama = $rowd['nama'];
$alamat = $rowd['alamat'];
$tempat = $rowd['tempat'];
$kodepos = $rowd['kodepos'];
$tanggallahir = $rowd['tanggal_lahir'];
$jenisKelamin = $rowd['jenis_kelamin'];
$email = $rowd['email'];
$nohp = $rowd['nohp'];
$id_fakultas = $rowd['id_fakultas'];
$id_jurusan = $rowd['id_jurusan'];
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
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Nama Lengkap</label>
                                                                    <input type="text" name="namalengkap" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $nama; ?>">
                                                                </div>
                                                            </div>   
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="nim">Nim</label>
                                                                    <input type="number" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?php echo $nim; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tempat">Tempat</label>
                                                                    <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Tempat" value="<?php echo $tempat; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="kodepos">Kode Pos</label>
                                                                    <input type="number" name="kodepos" class="form-control" id="kodepos" placeholder="Kode Pos" value="<?php echo $kodepos; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="TanggalLahir">Tanggal Lahir</label>
                                                                    <input type="date" name="tanggallahir" class="form-control" id="TanggalLahir" placeholder="Tanggal Lahir" value="<?php echo $tanggallahir; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                                                    <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                                                                        <option value="undefined">Pilih Jenis Kelamin Anda</option>
                                                                        <option value="laki-laki" <?php echo ($jenisKelamin == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                                        <option value="Perempuan" <?php echo ($jenisKelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="No Hp">No Hp</label>
                                                                    <input type="number" name="nohp" class="form-control" id="nohp" placeholder="No Handphone" value="<?php echo $nohp; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="Fakultas">Fakultas</label>
                                                                    <select name="Fakultas" class="form-control">
                                                                        <option value="" disabled>Pilih Fakultas</option>
                                                                        <?php
                                                                        $sqlf = "SELECT id_fakultas, nama_fakultas FROM fakultas";
                                                                        $resultf = mysqli_query($conn, $sqlf);

                                                                        if ($resultf) {
                                                                            while ($rowf = mysqli_fetch_assoc($resultf)) {
                                                                                $id_fakultas = $rowf['id_fakultas'];
                                                                                $nama_fakultas = $rowf['nama_fakultas'];
                                                                                $selectedFakultas = ($rowData['id_fakultas'] == $id_fakultas) ? 'selected' : '';
                                                                                echo "<option value='$id_fakultas' $selectedFakultas>$nama_fakultas</option>";
                                                                            }
                                                                            mysqli_free_result($resultf);
                                                                        } else {
                                                                            echo '<option value="" disabled>Error fetching fakultas</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="Jurusan">Jurusan</label>
                                                                    <select name="Jurusan" class="form-control">
                                                                        <option value="" disabled>Pilih Jurusan</option>
                                                                        <?php
                                                                        $sqlj = "SELECT id_jurusan, nama_jurusan FROM jurusan";
                                                                        $resultj = mysqli_query($conn, $sqlj);

                                                                        if ($resultj) {
                                                                            while ($rowj = mysqli_fetch_assoc($resultj)) {
                                                                                $id_jurusan = $rowj['id_jurusan'];
                                                                                $nama_jurusan = $rowj['nama_jurusan'];
                                                                                $selectedJurusan = ($rowData['id_jurusan'] == $id_jurusan) ? 'selected' : '';
                                                                                echo "<option value='$id_jurusan' $selectedJurusan>$nama_jurusan</option>";
                                                                            }
                                                                            mysqli_free_result($resultj);
                                                                        } else {
                                                                            echo '<option value="" disabled>Error fetching jurusan</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                                        </div>
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                               <div class="text-right">
                                                                    <a type="button" id="submit" name="submit" class="btn btn-secondary" href="mahasiswa.php">Cancel</a>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $tempat = $_POST['tempat'];
    $kodepos = $_POST['kodepos'];
    $tanggallahir = $_POST['tanggallahir'];
    $jenisKelamin = $_POST['jeniskelamin'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $fakultas = $_POST['Fakultas'];
    $jurusan = $_POST['Jurusan'];
    $fotoprofil = $_FILES['newProfilePicture']['name'];        
    $uploadDirectory = '../../uploads/';

    if (!empty($fotoprofil)) {
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
        $targetFilePath = $uploadDirectory . basename($fotoprofil);

        if (move_uploaded_file($_FILES['newProfilePicture']['tmp_name'], $targetFilePath)) {
            $querys = "UPDATE mahasiswa SET 
                nama = '$nama',
                nim = '$nim',
                alamat = '$alamat',
                tempat = '$tempat',
                kodepos = '$kodepos',
                tanggal_lahir = '$tanggallahir',
                jenis_kelamin = '$jenisKelamin',
                email = '$email',
                nohp = '$nohp',
                id_fakultas = '$fakultas',
                id_jurusan = '$jurusan',
                foto_profil = '$fotoprofil'
                WHERE id_mahasiswa = '$idMahasiswa'";
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
        $querys = "UPDATE mahasiswa SET 
            nama = '$nama',
            nim = '$nim',
            alamat = '$alamat',
            tempat = '$tempat',
            kodepos = '$kodepos',
            tanggal_lahir = '$tanggallahir',
            jenis_kelamin = '$jenisKelamin',
            email = '$email',
            nohp = '$nohp',
            id_fakultas = '$fakultas',
            id_jurusan = '$jurusan'
            WHERE id_mahasiswa = '$idMahasiswa'";
    }

    if (mysqli_query($conn, $querys)) {
        echo '<script>
                swal.fire({
                    title: "Sukses",
                    text: "Data Berhasil di Update!",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "mahasiswa.php";
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