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