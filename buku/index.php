<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
class Buku {
    public $judul;
    public $pengarang;
    public $penerbit;
    public $tahun_terbit;
    public $harga;
    public $stok;

    public function __construct($judul, $pengarang, $penerbit, $tahun_terbit, $harga, $stok) {
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->penerbit = $penerbit;
        $this->tahun_terbit = $tahun_terbit;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function dapatDiskon() {
        return $this->tahun_terbit < 2014;
    }
}

class Cart {
    public $items = [];
    public function tambahBuku($buku, $stok) {
        if (isset($this->items[$buku->judul])) {
            $this->items[$buku->judul]['jumlah'] += $stok;
        } else {
            $this->items[$buku->judul] = [
                'buku' => $buku,
                'jumlah' => $stok
            ];
        }

        if ($this->items[$buku->judul]['jumlah'] > $buku->stok) {
            echo "Stok tidak cukup untuk buku '{$buku->judul}'.<br>";
            $this->items[$buku->judul]['jumlah'] = $buku->stok;
        }
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['buku']->harga * $item['jumlah'];
        }
        return $total;
    }

    public function tampilkanKeranjang() {
        echo "<h3>Keranjang Belanja:</h3>";
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr></thead>";
        echo "<tbody>";
        foreach ($this->items as $item) {
            $buku = $item['buku'];
            $totalBuku = $buku->harga * $item['jumlah'];
            echo "<tr>";
            echo "<td>{$buku->judul}</td>";
            echo "<td>{$buku->pengarang}</td>";
            echo "<td>{$buku->penerbit}</td>";
            echo "<td>{$buku->tahun_terbit}</td>";
            echo "<td>Rp. {$buku->harga}</td>";
            echo "<td>{$item['jumlah']}</td>";
            echo "<td>Rp. {$totalBuku}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}

$buku1 = new Buku("Belajar HTML", "Fulan", "Penerbit A", 2012, 50000, 10);
$buku2 = new Buku("Belajar CSS", "Fulana", "Penerbit B", 2020, 70000, 5);
$buku3 = new Buku("Belajar PHP", "Fulani", "Penerbit B", 2018, 80000, 8);
$buku4 = new Buku("Belajar Laravel", "Fulano", "Penerbit B", 2010, 60000, 3);

$cart = new Cart();

$cart->tambahBuku($buku1, 3);
$cart->tambahBuku($buku2, 2);
$cart->tambahBuku($buku3, 5);
$cart->tambahBuku($buku4, 1);

$cart->tampilkanKeranjang();
$totalHarga = $cart->calculateTotal();
echo "<br><strong>Total Harga: Rp. {$totalHarga}</strong>";

?>