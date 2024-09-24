<?php
include 'connection.php';

// Check id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete
    $sql = "DELETE FROM mahasiswa WHERE id = '$id'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil dihapus!";
        header("Location: index.php");
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
