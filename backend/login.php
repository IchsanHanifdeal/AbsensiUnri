<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['name']) && isset($_POST['Password'])) {
    $username = $_POST['name'];
    $password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE Nama = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id = $data['id'];
        $namalengkap = $data['NamaLengkap'];

        if ($data['role'] == "admin") {
            $_SESSION['Nama'] = $username;
            $_SESSION['role'] = "admin";
            $_SESSION['id'] = $id;
            $_SESSION['logged_in'] = true;
            header("Location: ../admin/dashboard.php");
            exit();
        } elseif ($data['role'] == "owner") {
            $_SESSION['Nama'] = $username;
            $_SESSION['role'] = "owner";
            $_SESSION['id'] = $id;
            $_SESSION['logged_in'] = true;
            header("Location: ../dosen/dasboard.php");
            exit();
        } elseif ($data['role'] == "user") {
            $_SESSION['Nama'] = $username;
            $_SESSION['NamaLengkap'] = $namalengkap;
            $_SESSION['role'] = "user";
            $_SESSION['id'] = $id;
            $_SESSION['logged_in'] = true;
            header("Location: ../mahasiswa/dasboard.php");
            exit();
        }
    } else {
        echo "<div class='col-md-3 col-md-offset-3 mx-auto'>";
        echo "<div class='alert alert-danger text-center'> Login Gagal </div>";
        echo "</div>";
    }
}