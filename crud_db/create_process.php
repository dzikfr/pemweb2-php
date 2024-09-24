<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO mahasiswa (nama, nim, kelas, pesan) VALUES ('$nama', '$nim', '$kelas', '$pesan')";
    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
