<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hitung Luas Segitiga</title>
</head>
<body>
	<form method="POST">
		<label>Alas</label>
		<input type="text" name="alas" required>
		<label>Tinggi</label>
		<input type="text" name="tinggi" required>
		<button type="submit">Hitung</button>
	</form>
</body>
</html>

<?php
$alasInput = $_POST['alas'];
$tinggiInput = $_POST['tinggi'];

function hitungLuas($alas, $tinggi){
    echo "<table border='1' cellpadding='10'>";
	echo "<tr><th>No</th><th>Alas</th><th>Tinggi</th><th>Hasil Luas</th></tr>";

	for ($i = 1; $i <= 5; $i++) {
		$hitung = 0.5 * $alas * $tinggi;
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>$alas</td>";
		echo "<td>$tinggi</td>";
		echo "<td>$hitung</td>";
		echo "</tr>";
	}
	echo "</table>";
}

hitungLuas($alasInput, $tinggiInput);
?>