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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="assets/style/login.css" />
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form method="POST" action="backend/login.php">
      <h3>ABSENSI FMIPA</h3>
      <label for=" username">Username</label>
    <input type="text" placeholder="Username" id="username" name="username" />
    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password" />
    <button type="submit" name>Log In</button>
  </form>
</body>
</html>