<html>
    <head>
        <title>Input Data Dosen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>
        <form method="POST">
            <table>
                <tr> <td>Kode Dosen</td> <td><input type="number" name="kd_dosen" size=10 required></td> </tr>
                <tr> <td>Nama Dosen</td> <td><input type="text" name="nama_dosen" size=30 required></td> </tr>
                <tr> <td>Jenis Kelamin</td> 
                     <td>
                         <select name="jenis_kelamin" required>
                             <option value="L">Laki-laki</option>
                             <option value="P">Perempuan</option>
                         </select>
                     </td>
                </tr>
                <tr> <td>Alamat</td> <td><input type="text" name="alamat" size=50 required></td> </tr>
                <tr> <td>Telepon</td> <td><input type="number" name="telepon" size=15 required></td> </tr>
                <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
                <input type="reset" value="BATAL"> </td> </tr>
            </table>    
        </form>    

<?php
include "koneksi.php";

// Proses penyimpanan data dosen jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_dosen = $_POST['kd_dosen'];
    $nama_dosen = $_POST['nama_dosen'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Query untuk menambahkan data ke tabel_dosen
    $sql = mysqli_query($koneksi, "INSERT INTO tabel_dosen (kode_dosen, nama_dosen, jenis_kelamin, alamat, telepon) 
    VALUES ('$kd_dosen', '$nama_dosen', '$jenis_kelamin', '$alamat', '$telepon')");

    if ($sql) {
        echo "Berhasil menyimpan";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}

// Menampilkan isi tabel_dosen
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Kode Dosen</th><th>Nama Dosen</th><th>Jenis Kelamin</th><th>Alamat</th><th>Telepon</th></tr>";

$select = mysqli_query($koneksi, "SELECT * FROM tabel_dosen ORDER BY kode_dosen ASC");
while ($data = mysqli_fetch_row($select)) {
    echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>";
}
echo "</table>";

mysqli_close($koneksi); // Menutup koneksi database
?>
    </body>
</html>
