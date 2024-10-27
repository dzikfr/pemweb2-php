<html>
<head>
    <title>Input Data Jadwal</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr> <td>Kode Mata Kuliah</td> <td><input type="text" name="kode_matakuliah" required></td> </tr>
            <tr> <td>Kode Dosen</td> <td><input type="number" name="kode_dosen" required></td> </tr>
            <tr> <td>Hari</td> <td><input type="text" name="hari" required></td> </tr>
            <tr> <td>Jam</td> <td><input type="text" name="jam" required></td> </tr>
            <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
            <input type="reset" value="BATAL"> </td> </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kode_matakuliah = $_POST['kode_matakuliah'];
        $kode_dosen = $_POST['kode_dosen'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];

        $sql = mysqli_query($koneksi, "INSERT INTO tabel_jadwal(kode_matakuliah, kode_dosen, hari, jam) VALUES ('$kode_matakuliah', '$kode_dosen', '$hari', '$jam')");

        if($sql){
            echo "Berhasil menyimpan";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Kode Mata Kuliah</th><th>Kode Dosen</th><th>Hari</th><th>Jam</th></tr>";
    $result = mysqli_query($koneksi, "SELECT * FROM tabel_jadwal");
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['id']}</td><td>{$row['kode_matakuliah']}</td><td>{$row['kode_dosen']}</td><td>{$row['hari']}</td><td>{$row['jam']}</td></tr>";
    }
    echo "</table>";

    mysqli_close($koneksi);
    ?>
</body>
</html>
