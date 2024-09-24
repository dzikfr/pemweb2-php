<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $pesan = $_POST['pesan'];

    // Update by id
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', kelas='$kelas', pesan='$pesan' WHERE id='$id'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
