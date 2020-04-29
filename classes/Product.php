<?php
  require_once '../lib/Database.php';
  require_once '../helpers/Helper.php';
?>
<?php

  class Product {
    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Helper();
    }

    public function categoryShow() {
      $query = "SELECT * FROM tbl_category";
      return $this->db->select($query);
    }

    public function brandShow() {
      $query = "SELECT * FROM tbl_brands";
      return $this->db->select($query);
    }
    
  }

?>