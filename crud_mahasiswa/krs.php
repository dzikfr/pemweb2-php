<html>
<head>
    <title>Input Data KRS</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr> <td>NIM</td> <td><input type="number" name="nim" required></td> </tr>
            <tr> <td>ID Jadwal</td> <td><input type="number" name="id_jadwal" required></td> </tr>
            <tr> <td>Kode Semester</td> <td><input type="number" name="kode_semester" required></td> </tr>
            <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
            <input type="reset" value="BATAL"> </td> </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nim = $_POST['nim'];
        $id_jadwal = $_POST['id_jadwal'];
        $kode_semester = $_POST['kode_semester'];

        $sql = mysqli_query($koneksi, "INSERT INTO tabel_krs(nim, id_jadwal, kode_semester) VALUES ('$nim', '$id_jadwal', '$kode_semester')");

        if($sql){
            echo "Berhasil menyimpan";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>NIM</th><th>ID Jadwal</th><th>Kode Semester</th></tr>";
    $result = mysqli_query($koneksi, "SELECT * FROM tabel_krs");
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['id']}</td><td>{$row['nim']}</td><td>{$row['id_jadwal']}</td><td>{$row['kode_semester']}</td></tr>";
    }
    echo "</table>";

    mysqli_close($koneksi);
    ?>
</body>
</html>
