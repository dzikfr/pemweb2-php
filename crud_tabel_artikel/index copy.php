<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 3px;
        }
        .btn-tambah {
            background-color: #4CAF50;
        }
        .btn-update {
            background-color: #2196F3;
        }
        .btn-hapus {
            background-color: #f44336;
        }
    </style>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>
    <a href="create.php" class="btn btn-tambah">Tambah Mahasiswa</a>
    <?php
    include 'read.php';
    ?>

</body>
</html>
