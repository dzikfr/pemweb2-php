<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO produk (nama, jenis, harga) VALUES ('$nama', '$jenis', '$harga')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT produk.id, produk.nama, kategori_produk.nama_jenis AS jenis, produk.harga
        FROM produk
        JOIN kategori_produk ON produk.jenis = kategori_produk.id_kategori
        WHERE produk.nama LIKE '%$search%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
</head>
<body>

    <h2>Tambah Produk</h2>
    <form method="post" action="">
        Nama Produk: <input type="text" name="nama" required><br>
        Jenis Produk: 
        <select name="jenis" required>
            <?php
            // Ambil kategori dari tabel kategori_produk
            $kategoriResult = $conn->query("SELECT * FROM kategori_produk");
            while ($row = $kategoriResult->fetch_assoc()) {
                echo "<option value='{$row['id_kategori']}'>{$row['nama_jenis']}</option>";
            }
            ?>
        </select><br>
        Harga: <input type="number" name="harga" required><br>
        <input type="submit" value="Tambah Produk">
    </form>

    <h2>Pencarian Produk</h2>
    <form method="get" action="">
        <input type="text" name="search" placeholder="Cari nama produk..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Cari">
    </form>

    <h2>Daftar Produk</h2>
    <?php
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

</body>
</html>
