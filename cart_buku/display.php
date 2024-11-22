<?php

include 'db_connection.php'; 

echo "<h2>Daftar Buku</h2>";

$query = "SELECT * FROM buku";
$result = mysqli_query($conn, $query);
echo "<table border='1'>
        <tr><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Harga</th><th>Stok</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['judul']}</td>
            <td>{$row['pengarang']}</td>
            <td>{$row['penerbit']}</td>
            <td>{$row['tahun_terbit']}</td>
            <td>Rp. {$row['harga']}</td>
            <td>{$row['stok']}</td>
          </tr>";
}
echo "</table>";

echo "<h2>Keranjang Belanja</h2>";

$query = "SELECT cart.id, buku.judul, buku.pengarang, buku.penerbit, buku.tahun_terbit, buku.harga, cart.jumlah
          FROM cart
          JOIN buku ON cart.buku_id = buku.id";
$result = mysqli_query($conn, $query);
echo "<table border='1'>
        <tr><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $total = $row['harga'] * $row['jumlah'];
    echo "<tr>
            <td>{$row['judul']}</td>
            <td>{$row['pengarang']}</td>
            <td>{$row['penerbit']}</td>
            <td>{$row['tahun_terbit']}</td>
            <td>Rp. {$row['harga']}</td>
            <td>{$row['jumlah']}</td>
            <td>Rp. {$total}</td>
          </tr>";
}
echo "</table>";
?>
