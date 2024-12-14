<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "produk";

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_error) {
  die("Koneksi gagal: " . $db->connect_error);
}

class Product {
  private $name;
  private $price;
  private $category;
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function setCategory($category) {
    $this->category = $category;
  }

  public function save() {
    $query = "INSERT INTO products (name, price, category) VALUES (?, ?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("sds", $this->name, $this->price, $this->category);
    $stmt->execute();
  }

  public static function getAll($db) {
    $query = "SELECT * FROM products";
    $result = $db->query($query);
    $products = array();
    while ($row = $result->fetch_assoc()) {
      $products[] = $row;
    }
    return $products;
  }
}

if (isset($_POST['submit'])) {
  $product = new Product($db);
  $product->setName($_POST['name']);
  $product->setPrice($_POST['price']);
  $product->setCategory($_POST['category']);
  $product->save();
  header("Location: index.php");
  exit;
}

$products = Product::getAll($db);
?>

<form action="" method="post">
  <label for="name">Nama Produk:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="price">Harga:</label>
  <input type="number" id="price" name="price"><br><br>
  <label for="category">Kategori:</label>
  <input type="text" id="category" name="category"><br><br>
  <input type="submit" name="submit" value="Simpan">
</form>

<h2>Daftar Produk</h2>
<table border="1">
  <tr>
    <th>No</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Kategori</th>
  </tr>
  <?php
  $no = 1;
  foreach ($products as $product) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $product['name']; ?></td>
      <td><?php echo $product['price']; ?></td>
      <td><?php echo $product['category']; ?></td>
    </tr>
    <?php
  }
  ?>
</table>