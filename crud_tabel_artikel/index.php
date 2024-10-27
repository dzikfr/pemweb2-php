<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Berita</title>
</head>
<body>
    <h1>Formm Berita</h1>
    <form method="post">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis"></td>
            </tr>
            <tr>
                <td>Lead</td>
                <td><textarea name="lead" id="lead"></textarea></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea name="content" id="content"></textarea></td>
            </tr>
            <tr>
                <td colspan=2><input type="submit" value="simpan"></td>
                <td colspan=2><input type="sub" value="hapus"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php

include "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $judul = $_POST['judul'];

}


?>