<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_mahasiswa']) && is_numeric($_GET['id_mahasiswa'])) {
    $id_mahasiswa = $_GET['id_mahasiswa'];

    $conn->query("SET foreign_key_checks = 0");
    $sql_users = "DELETE FROM users WHERE id_mahasiswa = $id_mahasiswa";

    $sql_dosen = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    if ($conn->query($sql_users) === TRUE && $conn->query($sql_dosen) === TRUE) {
        $conn->query("SET foreign_key_checks = 1");

        header("Location: mahasiswa.php");
        exit();
    } else {
        echo "Error: " . $sql_dosen . "<br>" . $conn->error;
    }
} else {
    echo "Invalid dosen ID.";
}

$conn->close();
?>
