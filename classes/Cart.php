<?php
  $filepath = realpath(dirname(__FILE__));
  require_once $filepath . '/../lib/Database.php';
  require_once $filepath . '/../helpers/Helper.php';
?>

<?php

  class Cart {
    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Helper();
    }

    public function addToCart($productId, $quantity) {
      $quantity  = $this->fm->validation($quantity);
      $quantity  = mysqli_real_escape_string($this->db->link, $quantity);
      $productId = mysqli_real_escape_string($this->db->link, $productId);
      $sesId     = session_id();

      $queryGetProduct = "SELECT * FROM tbl_products WHERE productId = '$productId'";
      $product = $this->db->select($queryGetProduct);
      if($product != false) {
        $result = $product->fetch_assoc();
      } else {
        echo 'queryGetProduct does not work';
      }

      $productName = $result['productName'];
      $price       = $result['price'];
      $image       = $result['image'];
      
      $query     = "INSERT INTO tbl_cart(productId, sesId, productName, price, quantity, image) VALUES('$productId', '$sesId', '$productName', '$price', '$quantity', '$image')";
      if($this->db->insert($query)) {
        header("Location: cart.php");
      } else {
        header("Location: 404.php");
      }
      
    }

    public function getCartProduct() {
      $sesId = session_id();

      $query = "SELECT * FROM tbl_cart WHERE sesId = '$sesId'";
      return $this->db->select($query);
    }
    
    public function cartQuantityUpdate($quantity, $productId) {
      $quantity  = mysqli_real_escape_string($this->db->link, $quantity);
      $productId = mysqli_real_escape_string($this->db->link, $productId);
      $sesId     = session_id();
      $query     = "UPDATE tbl_cart SET quantity = '$quantity' WHERE productId = '$productId' AND sesId = '$sesId'";
      return $this->db->update($query);
    }
  
    public function deleteCartProduct($productId) {
      $productId = mysqli_real_escape_string($this->db->link, $productId);
      $sesId     = session_id();
      $query     = "DELETE FROM tbl_cart WHERE productId = '$productId' AND sesId = '$sesId'";
      if($this->db->delete($query)) {
        header("Location: cart.php");
      } else {
        echo 'Error: Product can not be deleted from Cart';
      }
    }
    
  }

?>