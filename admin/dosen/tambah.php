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
                                    <h3 class="card-title">Tambah Dosen</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form id="editProfileForm" enctype="multipart/form-data" action="" method="POST">
                                        <div class="row gutters">
                                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="fotoprofil">Foto Profil</label>
                                                                    <img id="preview" src="#" alt="Preview" style="display: block; margin: 0 auto; max-width: 100%; max-height: 200px; margin-top: 10px; display: none;"><br>
                                                                        <label class="btn btn-primary" style="display: block; margin: 0 auto;">
                                                                            Pilih File
                                                                            <input type="file" class="form-control-file" name="fotoprofil" id="fotoprofil" onchange="previewImage()" style="display: none;">
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="id">Id Dosen</label>
                                                                    <input type="number" class="form-control" name="IdDosen" id="idDosen" placeholder="Id Dosen" value="" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" name="namalengkap" id="namalengkap" placeholder="Nama Lengkap" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <div class="input-group">
                                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="nip">NIP</label>
                                                                    <input type="number" class="form-control" name="nip" id="nip" placeholder="NIP" value="">
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                                                    <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                                                                        <option value="undefined">Pilih Jenis Kelamin Anda</option>
                                                                        <option value="laki-laki">Laki-laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="Kode Pos">Kode Pos</label>
                                                                    <input type="number" class="form-control" name="kodepos" id="kodepos" placeholder="Kode Pos" value="<">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="gelardepan">Gelar depan</label>
                                                                    <input type="text" class="form-control" name="gelardepan" id="gelardepan" placeholder="Gelar Depan" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="gelarbelakang">Gelar belakang</label>
                                                                    <input type="text" class="form-control" name="gelarbelakang" id="gelarbelakang" placeholder="Gelar Belakang" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tempat">Tempat Lahir</label>
                                                                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir" value="">
                                                                </div>
                                                            </div>       
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggallahir">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggal Lahir" value="">
                                                                </div>
                                                            </div>                                                     
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="JabatanFungsional">Jabatan Fungsional</label>
                                                                    <input type="text" class="form-control" name="JabatanFungsional" id="JabatanFungsional" placeholder="Jabatan Fungsional" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggallahir">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                               <div class="text-right">
                                                                    <a type="button" id="submit" name="submit" class="btn btn-secondary" href="dosen.php">Cancel</a>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    function generateRandom4Digit() {
        return Math.floor(1000 + Math.random() * 9000);
    }

    document.getElementById('idDosen').value = generateRandom4Digit();
    </script>

    <script>
    function previewImage() {
        var input = document.getElementById('fotoprofil');
        var preview = document.getElementById('preview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
    </script>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idDosen = $_POST['IdDosen'];
    $username = $_POST['username'];
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
    $fotoprofil = isset($_FILES['fotoprofil']['name']) ? $_FILES['fotoprofil']['name'] : 'error.png';
    $uploadDirectory = '../../uploads/';

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $targetFilePath = $uploadDirectory . basename($fotoprofil);

    if (isset($_FILES['fotoprofil']['tmp_name']) && move_uploaded_file($_FILES['fotoprofil']['tmp_name'], $targetFilePath)) {
        $querys = "INSERT INTO dosen 
            (foto_profil, id_dosen, nip, nama, alamat, kodepos, gelardepan, gelarbelakang, tempat, tanggal_lahir, jenis_kelamin, jabatan, email, username)
            VALUES
            ('$fotoprofil', '$idDosen', '$nip', '$nama', '$alamat', '$kodepos', '$gelardepan', '$gelarbelakang', '$tempat', '$tanggallahir', '$jenisKelamin', '$jabatan', '$email', '$username')";

        if (mysqli_query($conn, $querys)) {
            $password = $_POST['password'];
            $role = "dosen";
            $lastInsertId = mysqli_insert_id($conn);

            $queryu = "INSERT INTO users (id_dosen, username, password, role)
                VALUES ('$lastInsertId', '$username', '$password', '$role')";

            if (mysqli_query($conn, $queryu)) {
                echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Data Berhasil di Insert!",
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
    } else {
        $querys = "INSERT INTO dosen 
            (foto_profil, id_dosen, nip, nama, alamat, kodepos, gelardepan, gelarbelakang, tempat, tanggal_lahir, jenis_kelamin, jabatan, email, username)
            VALUES
            ('error.png', '$idDosen', '$nip', '$nama', '$alamat', '$kodepos', '$gelardepan', '$gelarbelakang', '$tempat', '$tanggallahir', '$jenisKelamin', '$jabatan', '$email', '$username')";

        if (mysqli_query($conn, $querys)) {
            $password = $_POST['password'];
            $role = "dosen";
            $lastInsertId = mysqli_insert_id($conn);

            $queryu = "INSERT INTO users (id_dosen, username, password, role)
                VALUES ('$lastInsertId', '$username', '$password', '$role')";

            if (mysqli_query($conn, $queryu)) {
                echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Data Berhasil di Insert!",
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
        } else {
            echo '<script>
                swal.fire({
                    title: "Error",
                    text: "Error inserting default image.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            </script>';
        }
    }
}
?>


    </body>

</html>