<?php
$nilai_siswa = [
    "Siswa 1" => [
        "Matematika" => 85,
        "Bahasa Inggris" => 90,
        "IPA" => 88
    ],
    "Siswa 2" => [
        "Matematika" => 78,
        "Bahasa Inggris" => 85,
        "IPA" => 84
    ],
    "Siswa 3" => [
        "Matematika" => 92,
        "Bahasa Inggris" => 88,
        "IPA" => 91
    ],
    "Siswa 4" => [
        "Matematika" => 80,
        "Bahasa Inggris" => 82,
        "IPA" => 79
    ]
];

$total_bhs_inggris = 0;
$jmlh_siswa = count($nilai_siswa);

foreach ($nilai_siswa as $nilai) {
    $total_bhs_inggris += $nilai["Bahasa Inggris"];
}

$mean_bhs_inggris = $total_bhs_inggris / $jmlh_siswa;
echo "Rata-rata nilai Bahasa Inggris: $mean_bhs_inggris <br>";

foreach ($nilai_siswa as $siswa => $nilai) {
    echo "Nilai $siswa:";
    foreach ($nilai as $mata_pelajaran => $skor) {
        echo "$mata_pelajaran: $skor, ";
    }
    echo "<br>";
}
?>