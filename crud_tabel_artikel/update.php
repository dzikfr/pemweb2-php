<?php
include 'connection.php';

// Check id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get
    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $nim = $row['nim'];
        $kelas = $row['kelas'];
        $pesan = $row['pesan'];
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Mahasiswa</title>
</head>
<body>
    <h2>Update Mahasiswa</h2>
    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required><br><br>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>" required><br><br>
        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" value="<?php echo $kelas; ?>"><br><br>
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan"><?php echo $pesan; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
