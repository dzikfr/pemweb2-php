<?php

include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_buku'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, harga, stok) 
                  VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$harga', '$stok')";
        mysqli_query($conn, $query);
    }

    if (isset($_POST['submit_cart'])) {
        $buku_id = $_POST['buku_id'];
        $jumlah = $_POST['jumlah'];

        $query = "INSERT INTO cart (buku_id, jumlah) VALUES ('$buku_id', '$jumlah')";
        mysqli_query($conn, $query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Tambah Buku</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" name="pengarang" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" name="tahun_terbit" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" required>
        </div>
        <button type="submit" name="submit_buku" class="btn btn-primary">Tambah Buku</button>
    </form>

    <hr>

    <h2>Tambah ke Keranjang</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="buku_id" class="form-label">Pilih Buku</label>
            <select name="buku_id" class="form-select" required>
                <?php
                $query = "SELECT * FROM buku";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['judul']} - Rp. {$row['harga']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" required>
        </div>
        <button type="submit" name="submit_cart" class="btn btn-success">Tambah ke Keranjang</button>
    </form>

    <hr>

    <h2>Daftar Buku</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM buku";
            $result = mysqli_query($conn, $query);
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
            ?>
        </tbody>
    </table>

    <hr>

    <h2>Keranjang Belanja</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT cart.id, buku.judul, buku.pengarang, buku.penerbit, buku.tahun_terbit, buku.harga, cart.jumlah
                      FROM cart
                      JOIN buku ON cart.buku_id = buku.id";
            $result = mysqli_query($conn, $query);
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
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
