<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table border=1 cellpadding=0>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Nilai tugas</td>
                <td><input type="text" name="ntugas"></td>
            </tr>
            <tr>
                <td>UTS</td>
                <td><input type="text" name="nuts"></td>
            </tr>
            <tr>
                <td>UAS</td>
                <td><input type="text" name="nuas"></td>
            </tr>
            <tr>
                <td colspan = 2>
                    <input type="submit" value="hitung">&nbsp;
                    <input type="reset" value="batal">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_POST['ntugas'])){
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $ntugas = $_POST['ntugas'];
        $nuts = $_POST['nuts'];
        $nuas = $_POST['nuas'];

        $nilai = ($ntugas+$nuts+$nuas)/3;

        echo"Nama : $nama<br>";
        echo"Jurusan : $jurusan<br>";
        echo"Total nilai : $nilai<br>";
    }
?>