<?php
$mataKuliah = [
    "Pemrograman Web 2" => 3,
    "Pemrograman Visual" => 3,
    "Pengantar Teknologi Informasi" => 2,
    "Bahasa Indonesia" => 2,
    "Bahasa Inggris" => 2
];

foreach ($mataKuliah as $matKul => $sks) {
    printf("Mata kuliah %s berbobot %d SKS<br>", $matKul, $sks);
}
?>