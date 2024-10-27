<html>
<head>
    <title>Input Data Semester</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr> <td>Kode Semester</td> <td><input type="number" name="kode_semester" required></td> </tr>
            <tr> <td>Nama Semester</td> <td><input type="text" name="semester" required></td> </tr>
            <tr> <td>Status</td> <td><input type="number" name="status" required></td> </tr>
            <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
            <input type="reset" value="BATAL"> </td> </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kode_semester = $_POST['kode_semester'];
        $semester = $_POST['semester'];
        $status = $_POST['status'];

        $sql = mysqli_query($koneksi, "INSERT INTO tabel_semester(kode_semester, semester, status) VALUES ('$kode_semester', '$semester', '$status')");

        if($sql){
            echo "Berhasil menyimpan";
        } else {
            echo "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }

    echo "<table border='1'>";
    echo "<tr><th>Kode Semester</th><th>Semester</th><th>Status</th></tr>";
    $result = mysqli_query($koneksi, "SELECT * FROM tabel_semester");
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['kode_semester']}</td><td>{$row['semester']}</td><td>{$row['status']}</td></tr>";
    }
    echo "</table>";

    mysqli_close($koneksi);
    ?>
</body>
</html>
