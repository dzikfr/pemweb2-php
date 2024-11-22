<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO produk (nama, jenis, harga) VALUES ('$nama', '$jenis', '$harga')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="post" action="create.php">
    Nama Produk: <input type="text" name="nama" required><br>
    Jenis Produk: 
    <select name="jenis" required>
        <?php
        $result = $conn->query("SELECT * FROM kategori_produk");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_kategori']}'>{$row['nama_jenis']}</option>";
        }
        ?>
    </select><br>
    Harga: <input type="number" name="harga" required><br>
    <input type="submit" value="Tambah Produk">
</form>
