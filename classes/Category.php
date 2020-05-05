<?php
  $filepath = realpath(dirname(__FILE__));
  require_once $filepath . '/../lib/Database.php';
  require_once $filepath . '/../helpers/Helper.php';
?>
<?php
  class Category {
    private $db;
    private $fm;
    
    public function __construct() {
      $this->db = new Database();
      $this->fm = new Helper();
    }

    public function categoryAdd($catName) {
      $catName = $this->fm->validation($catName);
      $catName = mysqli_real_escape_string($this->db->link, $catName);

      if (empty($catName)) {
        return '<span class="error">Category Feild cannot be empty!</span>';
      } else {
        $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
        if ($this->db->insert($query)) {
          return '<span class="success">Category Feild successfully added!</span>';
        } else {
          return '<span class="error">ERROR:Category Feild cannot be added!</span>';
        }
      }
    }

    public function categoryShow() {
      $query = "SELECT * FROM tbl_category";
      $result = $this->db->select($query);
      return $result;
    }

    public function categoryShowById($id) {
      $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
      $result = $this->db->select($query);
      return $result;
    }

    public function categoryUpdate($id, $catName) {
      $id       = mysqli_real_escape_string($this->db->link, $id);
      $catName  = $this->fm->validation($catName);
      $catName  = mysqli_real_escape_string($this->db->link, $catName);

      if(empty($catName)) {
        return "Update Feild can not be empty!";
      } else {
        $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
        if($this->db->update($query)) {
          return "Update Successful";
        } else {
          return "Error: Update Unsuccessful";
        }
      }
    }

    public function categoryDeleteById($catId) {
      $catId     = mysqli_real_escape_string($this->db->link, $catId);
      $query  = "DELETE FROM tbl_category WHERE catId = '$catId'";
      if($this->db->delete($query)) {
        return '<span class="success">Delete Successfully!</span>';
      } else {
        return '<span class="error">Error: Delete Unsuccessfull!</span>';
      }
    }
    
  }



?>