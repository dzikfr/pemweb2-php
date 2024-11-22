<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama_jenis'])) {
    $nama_jenis = $_POST['nama_jenis'];

    $sql = "INSERT INTO kategori_produk (nama_jenis) VALUES ('$nama_jenis')";

    if ($conn->query($sql) === TRUE) {
        echo "Jenis produk berhasil ditambahkan.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM kategori_produk WHERE nama_jenis LIKE '%$search%'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jenis Produk</title>
</head>
<body>

    <h2>Tambah Jenis Produk</h2>
    <form method="post" action="">
        Nama Jenis Produk: <input type="text" name="nama_jenis" required><br>
        <input type="submit" value="Tambah Jenis">
    </form>

    <h2>Pencarian Jenis Produk</h2>
    <form method="get" action="">
        <input type="text" name="search" placeholder="Cari jenis produk..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Cari">
    </form>

    <h2>Daftar Jenis Produk</h2>
    <?php

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Jenis</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_kategori']}</td>
                    <td>{$row['nama_jenis']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data.";
    }
    ?>

</body>
</html>
