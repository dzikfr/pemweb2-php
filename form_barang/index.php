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
                <td>Nama Barang</td>
                <td><input type="text" name="namabarang"></td>
            </tr>
            <tr>
                <td>Harga satuan</td>
                <td><input type="text" name="hargasatuan"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlahbarang"></td>
            </tr>
            <tr>
                <td colspan = 2>
                    <input type="submit" value="tentukan diskon">&nbsp;
                    <input type="reset" value="batal">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_POST['hargasatuan'])){
        $nama = $_POST['namabarang'];
        $harga = $_POST['hargasatuan'];
        $jml = $_POST['jumlahbarang'];

        $total = $harga*$jml;
        $diskon = 0;

        if($total > 500000){
            $diskon = (2*$total)/100;
        }elseif($total > 700000){
            $diskon = (5*$total)/100;
        }elseif($total > 1000000){
            $diskon = (10*$total)/100;
        }

        $tbayar = $total-$diskon;

        echo"Nama Item : $nama<br>";
        echo"Harga : $harga<br>";
        echo"Jumlah : $jml<br>";
        echo"Diskon: $diskon<br>";
        echo"Bayar: $tbayar<br>";
    }
?>