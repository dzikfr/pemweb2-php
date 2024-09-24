<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form action="create_process.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>
        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas"><br><br>
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan"></textarea><br><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
