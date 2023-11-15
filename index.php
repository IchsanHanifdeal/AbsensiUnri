<?php
session_start();
include 'backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensi FMIPA Unri</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="assets/style/login.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form method="POST" action="">
      <h3>ABSENSI FMIPA</h3>
      <label for=" username">Username</label>
    <input type="text" placeholder="Username" id="username" name="username" />
    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password" />
    <button type="submit" name>Log In</button>
  </form>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: admin/dashboard.php");
            } elseif ($user['role'] == 'mahasiswa') {
                header("Location: mahasiswa/dashboard.php");
            } elseif ($user['role'] == 'dosen') {
                header("Location: dosen/dashboard.php");
            } else {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: 'Peran tidak valid!',
                        }).then(function() {
                            window.location.href = 'index.php';
                        });
                      </script>";
            }
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'Username atau password salah!',
                    }).then(function() {
                        window.location.href = 'index.php';
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan!',
                }).then(function() {
                    window.location.href = 'index.php';
                });
              </script>";
    }
    $stmt->close();
}
mysqli_close($conn);
?>
</html>