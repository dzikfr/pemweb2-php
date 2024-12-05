<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pelanggan') {
    die("Akses ditolak. Anda harus login sebagai pelanggan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan Dashboard</title>
</head>
<body>
    <h1>Selamat datang, Pelanggan <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
