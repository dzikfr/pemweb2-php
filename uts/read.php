<?php
include 'koneksi.php';

$sql = "SELECT produk.id, produk.nama, kategori_produk.nama_jenis AS jenis, produk.harga
        FROM produk
        JOIN kategori_produk ON produk.jenis = kategori_produk.id_kategori";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jenis</th>
                <th>Harga</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['jenis']}</td>
                <td>{$row['harga']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

$conn->close();
?>
