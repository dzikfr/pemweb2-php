<?php
class kendaraan{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar;
    var $harga;
    var $merk;

    function statusHarga(){
        if($this->harga > 5000000) $status = 'Mahal';
        else $status = 'Murah';
        return $status;
    }

    function setMerk($x){
        $this->merk = $x;
    }

    function setHarga($x){
        $this->harga = $x;
    }

    function setJumlahRoda($x){
        $this->jumlahRoda = $x;
    }

    function setWarna($x){
        $this->warna = $x;
    }

    function setBahanBakar($x){
        $this->bahanBakar = $x;
    }
}

$kendaraan1 = new kendaraan();
$kendaraan1->setMerk('Yamaha Mio');
$kendaraan1->setHarga(1000000);

$kendaraan2 = new kendaraan();
$kendaraan2->setMerk('Toyota Yaris');
$kendaraan2->setJumlahRoda(4);
$kendaraan2->setHarga(160000000);
$kendaraan2->setWarna('Merah');
$kendaraan2->setBahanBakar('Premium');

$kendaraan3 = new kendaraan();
$kendaraan3->setMerk('Honda Scoopy');
$kendaraan3->setJumlahRoda(2);
$kendaraan3->setHarga(13000000);
$kendaraan3->setWarna('Putih');
$kendaraan3->setBahanBakar('Premium');

$kendaraan4 = new kendaraan();
$kendaraan4->setMerk('Isuzu Panther');
$kendaraan4->setJumlahRoda(4);
$kendaraan4->setHarga(170000000);
$kendaraan4->setWarna('Hitam');
$kendaraan4->setBahanBakar('Solar');


$semuaKendaraan = [$kendaraan1, $kendaraan2, $kendaraan3, $kendaraan4];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Kendaraan</title>
</head>
<body>

<table>
    <tr>
        <th>Merk</th>
        <th>Jumlah Roda</th>
        <th>Warna</th>
        <th>Bahan Bakar</th>
        <th>Harga</th>
        <th>Status Harga</th>
    </tr>
    <?php foreach ($semuaK  endaraan as $kendaraan): ?>
        <tr>
            <td><?= $kendaraan->merk ?></td>
            <td><?= $kendaraan->jumlahRoda ?? 'N/A' ?></td>
            <td><?= $kendaraan->warna ?? 'N/A' ?></td>
            <td><?= $kendaraan->bahanBakar ?? 'N/A' ?></td>
            <td><?= 'Rp ' . number_format($kendaraan->harga, 0, ',', '.') ?></td>
            <td><?= $kendaraan->statusHarga() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>