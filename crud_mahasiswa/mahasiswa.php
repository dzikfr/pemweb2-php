<html>
<head>
    <title>Input Data Mahasiswa</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr> <td>NIM</td> <td><input type="number" name="nim" required></td> </tr>
            <tr> <td>Nama Mahasiswa</td> <td><input type="text" name="nama_mahasiswa" required></td> </tr>
            <tr> <td>Jenis Kelamin</td> <td><input type="text" name="jenis_kelamin" required></td> </tr>
            <tr> <td>Alamat</td> <td><textarea name="alamat" required></textarea></td> </tr>
            <tr> <td>Jurusan</td> <td><input type="text" name="jurusan" required></td> </tr>
            <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
            <input type="reset" value="BATAL"> </td> </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nim = $_POST['nim'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $jurusan = $_POST['jurusan'];

        $sql = mysqli_query($koneksi, "INSERT INTO tabel_mahasiswa(nim, nama_mahasiswa, jenis_kelamin, alamat, jurusan) VALUES ('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$alamat', '$jurusan')");

        if($sql){
            echo "Berhasil menyimpan";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }

    echo "<table border='1'>";
    echo "<tr><th>NIM</th><th>Nama Mahasiswa</th><th>Jenis Kelamin</th><th>Alamat</th><th>Jurusan</th></tr>";
    $result = mysqli_query($koneksi, "SELECT * FROM tabel_mahasiswa");
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['nim']}</td><td>{$row['nama_mahasiswa']}</td><td>{$row['jenis_kelamin']}</td><td>{$row['alamat']}</td><td>{$row['jurusan']}</td></tr>";
    }
    echo "</table>";

    mysqli_close($koneksi);
    ?>
</body>
</html>
