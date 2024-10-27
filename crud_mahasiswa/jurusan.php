<html>
    <head>
        <title>Input Data Jurusan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>
        <form method="POST">
            <table>
                <tr> <td>Kode Jurusan</td> <td><input type="number" name="kd_jurusan" size=10 required></td> </tr>
                <tr> <td>Nama Jurusan</td> <td><input type="text" name="nama_jurusan" size=30 required></td> </tr>
                <tr> <td colspan=2 align="center"><input type="submit" value="SIMPAN">&nbsp;
                <input type="reset" value="BATAL"> </td> </tr>
            </table>    
        </form>    


<?php
include "koneksi.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $kd = $_POST['kd_jurusan'];
    $nama = $_POST['nama_jurusan'];

$sql=mysqli_query($koneksi, "INSERT INTO tabel_jurusan(kode_jurusan,nama_jurusan) VALUES
('$kd', '$nama')");

if($sql){
    echo "Berhasil menyimpan";
} else {
    echo "gagal menyimpan".mysqli_error($koneksi);
}

}

echo "<table>";
echo "<tr><th>Kode Jurusan</th><th>Nama Jurusan</th></tr>";
$select=mysqli_query($koneksi, "SELECT * FROM tabel_jurusan order by kode_jurusan ASC");
while($data = mysqli_fetch_row($select)){
    echo "<tr><td>$data[0]</td><td>$data[1]</td></tr>";
}
echo "</table>";

mysqli_close($koneksi);
?>