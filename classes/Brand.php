<?php
  $filename = realpath(dirname(__FILE__));
  require_once $filename . '/../lib/Database.php';
  require_once $filename . '/../helpers/Helper.php';
?>

<?php

  class Brand {
    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Helper();
    }

    public function brandAdd($brandName) {
      $brandName = $this->fm->validation($brandName);
      $brandName = mysqli_real_escape_string($this->db->link, $brandName);

      if(empty($brandName)) {
        return '<span class="error">Error: Feild can not be empty!</span>';
      } else {
        $query = "INSERT INTO tbl_brands(brandName) VALUES('$brandName')";
        if($this->db->insert($query)) {
          return '<span class="success">Brand added successfully!</span>';
        } else {
          return '<span class="error">ERROR: Brand addition successfully!</span>';
        }
      }
    }

    public function brandShow() {
      $query = "SELECT * FROM tbl_brands ORDER BY brandId DESC";
      return $this->db->select($query);
    }
    
    public function brandDeleteById($brandId) {
      $brandId  = mysqli_real_escape_string($this->db->link, $brandId);
      $query    = "DELETE FROM tbl_brands WHERE brandId = '$brandId'";
      if($this->db->delete($query)) {
        return '<span class="success">Delete Successfull!</span>';
      } else {
        return '<span class="error">ERROR: Can not be Deleted!</span>';
      }
    }

    public function brandById($brandId) {
      $brandId  = mysqli_real_escape_string($this->db->link, $brandId);
      $query    = "SELECT * FROM tbl_brands WHERE brandId = '$brandId'";
      return $this->db->select($query);
    }
    
    public function brandUpdate($brandId, $brandName) {
      $brandName  = $this->fm->validation($brandName);
      $brandName  = mysqli_real_escape_string($this->db->link, $brandName);
      $brandId    = mysqli_real_escape_string($this->db->link, $brandId);

      if(empty($brandName)) {
        return '<span class="error">ERROR: Feild name can not be empty!</span>';
      } else {
        $query = "UPDATE tbl_brands SET brandName = '$brandName' WHERE brandId = '$brandId'";
        if($this->db->update($query)) {
          return '<span class="success">Brandname updated successfully!</span>';
        } else {
          return '<span class="error">ERROR: Brandname can not be updated!</span>';
        }
      }
    }
    
  }

?>