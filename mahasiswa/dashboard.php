<?php 
session_start();
include '../backend/koneksi.php'; 
$username = $_SESSION['username'];

$sql = "SELECT * FROM mahasiswa WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$foto_profil = $row['foto_profil'];
$nip = $row['nim'];
$fotoprofil = $row['foto_profil'];
$username = $row['username'];
$nama = $row['nama'];
$alamat = $row['alamat'];
$kodepos = $row['kodepos'];
$tempat = $row['tempat'];
$tanggallahir = $row['tanggal_lahir'];
$jenisKelamin = $row['jenis_kelamin'];
$email = $row['email'];
$nohp = $row['nohp'];
$id_fakultas = $row['id_fakultas'];
$id_jurusan = $row['id_jurusan'];

$sqlf = "SELECT * FROM fakultas where id_fakultas = '$id_fakultas'";
$resultf = mysqli_query($conn, $sqlf);
$rowf = mysqli_fetch_assoc($resultf);
$fakultas = $rowf['nama_fakultas'];

$sqlj = "SELECT * FROM jurusan where id_jurusan = '$id_jurusan'";
$resultj = mysqli_query($conn, $sqlj);
$rowj = mysqli_fetch_assoc($resultj);
$jurusan = $rowj['nama_jurusan'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mahasiswa | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../backend/app/plugins/fontawesome-free/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../backend/app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../backend/app/dist/css/adminlte.min.css" />
    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="rounded-circle animation__wobble" src="../uploads/<?php echo $foto_profil; ?>" alt="AdminLTELogo" height="60" width="60" />
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="../uploads/<?php echo $foto_profil; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light"><?php echo $username; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class-->
                        <nav class="mt-2">
                            <li class="nav-item menu-open">
                                <a href="Dashboard.php" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Absensi/Absensi.php" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Absensi
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="laporan/laporan.php" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Laporan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../backend/logout.php" class="nav-link">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>
                                        Log Out
                                    </p>
                                </a>
                            </li>
                        </nav>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">DASHBOARD | ABSENSI UNRI</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex">
                        <div class="col-md-8">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h3 class="card-title">Map</h3>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success mb-2 mx-auto" id="getCurrentLocationBtn">Dapatkan Lokasi Terkini</button>
                                    <div id="map" style="height: 395px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h3 class="card-title">Calendar</h3>
                                </div>
                                <div class="card-body">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Mahasiswa</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row gutters">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="account-settings">
                                                            <div class="user-profile">
                                                                <a data-toggle="modal" data-target="#userAvatarModal">
                                                                    <img class="profile-user-img img-fluid" src="../uploads/<?php echo $fotoprofil; ?>" alt="User profile picture" style="width: 100%; height: auto;">
                                                                </a>
                                                                <!-- Modal for displaying the larger image -->
                                                                <div class="modal fade" id="userAvatarModal" tabindex="-1" role="dialog" aria-labelledby="userAvatarModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <img src="../uploads/<?php echo $fotoprofil; ?>" alt="User profile picture" style="width: 100%;">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br><br>
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
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="nim">Nim</label>
                                                                    <input type="number" class="form-control" id="nim" placeholder="NIM" value="<?php echo $nip ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $nama ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Alamat</label>
                                                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $alamat?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Kode Pos</label>
                                                                    <input type="varchar" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $kodepos ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Tempat</label>
                                                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $tempat ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $tanggallahir ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Jenis Kelamin</label>
                                                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $jenisKelamin ?>" readonly>
                                                                </div>
                                                            </div>    
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Email</label>
                                                                    <input type="email" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $email ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">No Hp</label>
                                                                    <input type="number" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $nohp ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Fakultas</label>
                                                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $fakultas ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="namalengkap">Jurusan</label>
                                                                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?php echo $jurusan ?>" readonly>
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
            </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <!-- jQuery -->
    <script src="../backend/app/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../backend/app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../backend/app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../backend/app/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->

    <!-- AdminLTE for demo purposes -->
    <script src="../backend/app/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../backend/app/dist/js/pages/dashboard2.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQqCVzh9CHvZAJrfAoR-mVZD-dZxap2Xo&callback=initMap" async defer></script>

<script>
    function initMap() {
        var defaultLocation = { lat: 0.47634959444839176, lng: 101.38091487979919 };
        var map = new google.maps.Map(document.getElementById('map'), {
            center: defaultLocation,
            zoom: 20
        });

        var infowindow = new google.maps.InfoWindow({
            content: '<b>Universitas Riau Panam</b><br>Lokasi Universitas Riau Panam.'
        });

        var marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            title: 'Universitas Riau Panam'
        });

        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });

        var getCurrentLocationBtn = document.getElementById('getCurrentLocationBtn');
        getCurrentLocationBtn.addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var currentLocationMarker = new google.maps.Marker({
                        position: currentLocation,
                        map: map,
                        title: 'Lokasi Anda'
                    });

                    var distance = google.maps.geometry.spherical.computeDistanceBetween(currentLocation, defaultLocation);

                    var request = {
                        origin: currentLocation,
                        destination: defaultLocation,
                        travelMode: 'DRIVING'
                    };

                    directionsService.route(request, function (result, status) {
                        if (status == 'OK') {
                            directionsRenderer.setDirections(result);
                            infowindow.setContent('<div style="color: #000;">Jarak Lokasi Anda ke Universitas Riau adalah: ' +
                            (distance / 1000).toFixed(2) + ' km</div>');
                            infowindow.open(map, marker);
                        } else {
                            console.error('Error calculating route:', status);
                        }
                    });
                }, function (error) {
                    console.error('Error getting current location:', error);
                });
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        });
    }
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
            });

            calendar.render();
        });
    </script>

</body>

</html>
  
