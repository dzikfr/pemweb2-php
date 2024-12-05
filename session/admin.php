<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak. Anda harus login sebagai admin.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: yellow;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .dashboard-container {
            background-color: yellow    ;
            border: 4px solid #000;
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 10px 10px 0px 0px #000;
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #000;
        }
        .logout-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border: 2px solid #000;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }
        .logout-button:hover {
            background-color: #333;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Selamat datang, Admin</h1>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
</body>
</html>
