<html>
<head>
    <title>Input Data Mata Kuliah</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr> <td>Kode Mata Kuliah</td> <td><input type="text" name="kode_matakuliah" required></td> </tr>
            <tr> <td>Nama Mata Kuliah</td> <td><input type="text" name="nama_matakuliah" required></td> </tr>
            <tr> <td>SKS</td> <td><input type="number" name="sks" required></td> </tr>
            <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
            <input type="reset" value="BATAL"> </td> </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kode_matakuliah = $_POST['kode_matakuliah'];
        $nama_matakuliah = $_POST['nama_matakuliah'];
        $sks = $_POST['sks'];

        $sql = mysqli_query($koneksi, "INSERT INTO tabel_matakuliah(kode_matakuliah, nama_matakuliah, sks) VALUES ('$kode_matakuliah', '$nama_matakuliah', '$sks')");

        if($sql){
            echo "Berhasil menyimpan";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }

    echo "<table border='1'>";
    echo "<tr><th>Kode Mata Kuliah</th><th>Nama Mata Kuliah</th><th>SKS</th></tr>";
    $result = mysqli_query($koneksi, "SELECT * FROM tabel_matakuliah");
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['kode_matakuliah']}</td><td>{$row['nama_matakuliah']}</td><td>{$row['sks']}</td></tr>";
    }
    echo "</table>";

    mysqli_close($koneksi);
    ?>
</body>
</html>
