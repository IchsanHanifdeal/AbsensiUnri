<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_dosen']) && is_numeric($_GET['id_dosen'])) {
    $id_dosen = $_GET['id_dosen'];

    $sql = "DELETE FROM dosen WHERE id_dosen = $id_dosen";

    if ($conn->query($sql) === TRUE) {
        header("Location: dosen.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid dosen ID.";
}

$conn->close();
?>
