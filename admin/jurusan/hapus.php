<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_jurusan']) && is_numeric($_GET['id_jurusan'])) {
    $id_jurusan = $_GET['id_jurusan'];

    $sql = "DELETE FROM jurusan WHERE id_jurusan = $id_jurusan";

    if ($conn->query($sql) === TRUE) {
        header("Location: jurusan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid faculty ID.";
}

$conn->close();
?>
