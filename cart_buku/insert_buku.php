<?php

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, harga, stok) 
              VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$harga', '$stok')";
    
    if (mysqli_query($conn, $query)) {
        echo "Buku berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
