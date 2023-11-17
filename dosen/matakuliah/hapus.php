<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_matkul']) && is_numeric($_GET['id_matkul'])) {
    $id_matkul = $_GET['id_matkul'];

    $sql = "DELETE FROM matakuliah WHERE id_matkul = $id_matkul";

    if ($conn->query($sql) === TRUE) {
        header("Location: matakuliah.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid faculty ID.";
}

$conn->close();
?>
