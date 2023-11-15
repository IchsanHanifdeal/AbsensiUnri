<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_fakultas']) && is_numeric($_GET['id_fakultas'])) {
    $id_fakultas = $_GET['id_fakultas'];

    $sql = "DELETE FROM fakultas WHERE id_fakultas = $id_fakultas";

    if ($conn->query($sql) === TRUE) {
        header("Location: fakultas.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid faculty ID.";
}

$conn->close();
?>
