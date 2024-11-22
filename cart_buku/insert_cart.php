<?php

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $buku_id = $_POST['buku_id'];
    $jumlah = $_POST['jumlah'];

    $query = "INSERT INTO cart (buku_id, jumlah) VALUES ('$buku_id', '$jumlah')";
    
    if (mysqli_query($conn, $query)) {
        echo "Buku berhasil ditambahkan ke keranjang.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
