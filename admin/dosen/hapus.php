<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_dosen']) && is_numeric($_GET['id_dosen'])) {
    $id_dosen = $_GET['id_dosen'];

    $conn->query("SET foreign_key_checks = 0");
    $sql_users = "DELETE FROM users WHERE id_dosen = $id_dosen";

    $sql_dosen = "DELETE FROM dosen WHERE id_dosen = $id_dosen";

    if ($conn->query($sql_users) === TRUE && $conn->query($sql_dosen) === TRUE) {
        $conn->query("SET foreign_key_checks = 1");

        header("Location: dosen.php");
        exit();
    } else {
        echo "Error: " . $sql_dosen . "<br>" . $conn->error;
    }
} else {
    echo "Invalid dosen ID.";
}

$conn->close();
?>
