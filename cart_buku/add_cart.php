<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah ke Keranjang</title>
</head>
<body>
    <h2>Form Tambah ke Keranjang</h2>
    <form action="insert_cart.php" method="POST">
        <label for="buku_id">Pilih Buku:</label>
        <select name="buku_id" required>
            <?php
            include 'db_connection.php'; 

            $query = "SELECT * FROM buku";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['judul']} - Rp. {$row['harga']}</option>";
            }
            ?>
        </select><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" required><br>

        <input type="submit" value="Tambah ke Keranjang">
    </form>
</body>
</html>