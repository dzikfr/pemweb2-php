<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Form Tambah Buku</h2>
    <form action="insert_buku.php" method="POST">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" required><br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" required><br>

        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" required><br>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required><br>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" required><br>

        <input type="submit" value="Tambah Buku">
    </form>
</body>
</html>
