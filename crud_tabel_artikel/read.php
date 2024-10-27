<?php
include 'connection.php';

// Get data
function ambilMahasiswa() {
    global $koneksi;
    $sql = "SELECT * FROM mahasiswa";
    $result = $koneksi->query($sql);
    return $result;
}

// Show data
function tampilkanTabelMahasiswa() {
    $mahasiswa = ambilMahasiswa();

    if ($mahasiswa->num_rows > 0) {
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Pesan</th>
                <th>Aksi</th>
              </tr>";
        
        while ($row = $mahasiswa->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["nim"] . "</td>
                    <td>" . $row["kelas"] . "</td>
                    <td>" . $row["pesan"] . "</td>
                    <td>
                        <a href='update.php?id=" . $row["id"] . "' class='btn btn-update'>Update</a>
                        <a href='delete.php?id=" . $row["id"] . "' class='btn btn-hapus'>Hapus</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data.";
    }
}

tampilkanTabelMahasiswa();
?>
