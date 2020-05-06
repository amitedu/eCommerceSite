<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath . '/../lib/Database.php';
  include_once $filepath . '/../helpers/Helper.php';
?>
<?php

  class Product {
    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Helper();
    }

    public function productAdd($postData, $file) {
      $productName = $postData['productName'];
      $body        = $postData['body'];
      $price       = $postData['price'];
      $catId       = $postData['catId'];
      $brandId     = $postData['brandId'];
      $type        = $postData['type'];

      $productName = $this->fm->validation($productName);
      $productName = mysqli_real_escape_string($this->db->link, $productName);

      $body        = $this->fm->validation($body);
      $body        = mysqli_real_escape_string($this->db->link, $body);

      $price       = $this->fm->validation($price);
      $price       = mysqli_real_escape_string($this->db->link, $price);

      $image       = $file['image'];

      $permitted   = Array('jpg', 'jpeg', 'png', 'gif');

      if(empty($productName) || empty($body) || empty($price) || empty($catId) || empty($brandId)) {
        return '<span class="error">Feilds can not be empty!</span>';
      } else {
          if($image['name']) {
            if($image['size'] > 200000) {
              return 'Image size can not exceed 200KB!';
            } else {
              $imageName  = $image['name'];
              $imageTemp  = $image['tmp_name'];
              
              $div        = explode('.',$imageName);
              $imageExt   = strtolower(end($div));
              $uniqeName  = substr(md5(time()), 0, 10) . '.' . $imageExt;
              $imageDest  = "upload/" . $uniqeName;

              if(move_uploaded_file($imageTemp, $imageDest)) {
                $query    = "INSERT INTO tbl_products(productName, catId, brandId, body, price, image, type) VALUES('$productName', '$catId', '$brandId', '$body', '$price', '$imageDest', '$type')" ;
                if($this->db->insert($query)) {
                  return '<span class="success">Product added successfully</span>';
                } else {
                  return '<span class="error">ERROR:Product could not be added!</span>';
                }
              } else {
                return '<span class="error">ERROR:Image file can not be updated!</span>';
              }
            }
          } else {
            return '<span>Image feild can not be empty!</span>';
          }
      }
    }

    public function productShow() {
      $query = "SELECT tbl_products.*, tbl_category.catName, tbl_brands.brandName
      FROM tbl_products
      inner join tbl_category
      on tbl_products.catId = tbl_category.catId
      inner join tbl_brands
      on tbl_products.brandId = tbl_brands.brandId";
      return $this->db->select($query);
    }

    public function productShowById($productId) {
      $query = "SELECT * FROM tbl_products WHERE productId = '$productId'";
      return $this->db->select($query);
    }

    public function productUpdate($postData, $file, $productId) {
      $productName = $postData['productName'];
      $body        = $postData['body'];
      $price       = $postData['price'];
      $catId       = $postData['catId'];
      $brandId     = $postData['brandId'];
      $type        = $postData['type'];

      $productName = $this->fm->validation($productName);
      $productName = mysqli_real_escape_string($this->db->link, $productName);

      $body        = $this->fm->validation($body);
      $body        = mysqli_real_escape_string($this->db->link, $body);

      $price       = $this->fm->validation($price);
      $price       = mysqli_real_escape_string($this->db->link, $price);

      $image       = $file['image'];

      $permitted   = Array('jpg', 'jpeg', 'png', 'gif');

      if(empty($productName) || empty($body) || empty($price) || empty($catId) || empty($brandId)) {
        return '<span class="error">Feilds can not be empty!</span>';
      } else {
          if($image['name']) {
            if($image['size'] > 200000) {
              return 'Image size can not exceed 200KB!';
            } else {
              $imageName  = $image['name'];
              $imageTemp  = $image['tmp_name'];
              
              $div        = explode('.',$imageName);
              $imageExt   = strtolower(end($div));
              $uniqeName  = substr(md5(time()), 0, 10) . '.' . $imageExt;
              $imageDest  = "upload/" . $uniqeName;

              if(move_uploaded_file($imageTemp, $imageDest)) {
                $query    = "UPDATE tbl_products SET productName = '$productName', catId = '$catId', brandId = '$brandId', body = '$body', price = '$price', image = '$imageDest', type = '$type' WHERE productId = '$productId'";
                if($this->db->insert($query)) {
                  return '<span class="success">Product added successfully</span>';
                } else {
                  return '<span class="error">ERROR:Product could not be added!</span>';
                }
              } else {
                  return '<span class="error">ERROR:Image file can not be updated!</span>';
              }
            }
          } else {
            $query    = "UPDATE tbl_products SET productName = '$productName', catId = '$catId', brandId = '$brandId', body = '$body', price = '$price', type = '$type' WHERE productId = '$productId'";
            if($this->db->insert($query)) {
              return '<span class="success">Product added successfully</span>';
            } else {
              return '<span class="error">ERROR:Product could not be added!</span>';
            }
          }
      }
    }
  
    public function productDelete($productId) {
      $catId     = mysqli_real_escape_string($this->db->link, $productId);
      $query = "DELETE FROM tbl_products WHERE productId = '$productId'";
      if($this->db->delete($query)) {
        return '<span class="success">Delete Successfully!</span>';
      } else {
        return '<span class="error">Error: Delete Unsuccessfull!</span>';
      }
    }

    public function checkDuplicateProduct($productId) {
      $productId = mysqli_real_escape_string($this->db->link, $productId);
      $sesId     = session_id();
      $query     = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sesId = '$sesId'";
      if($this->db->select($query)) {
        return true;
      } else {
        return false;
      }
    }

    public function getAllFeaturedProduct() {
      $query = "SELECT * FROM tbl_products WHERE type='0' ORDER BY productId LIMIT 4";
      return $this->db->select($query);
    }

    public function getAllnewProduct() {
      $query = "SELECT * FROM tbl_products WHERE type='1' ORDER BY productId DESC limit 4";
      return $this->db->select($query);
    }

    public function getAllProductsByCategory() {
      $query = "SELECT * FROM tbl_category";
      return $this->db->select($query);
    }

    public function getProductsByCategory($catId) {
      $query = "SELECT * FROM tbl_products WHERE catId = '$catId'";
      return $this->db->select($query);
    }
    
    public function productPreview($productId) {
      $query = "SELECT tbl_products.*, tbl_category.catName, tbl_brands.brandName
      FROM tbl_products
      inner join tbl_category
      on tbl_products.catId = tbl_category.catId
      inner join tbl_brands
      on tbl_products.brandId = tbl_brands.brandId
      WHERE productId = '$productId'";
      return $this->db->select($query);
    }

    public function getLatestIphone() {
      $query = "SELECT * FROM tbl_productS WHERE brandId = '6' ORDER BY productId DESC LIMIT 1";
      return $this->db->select($query);
    }

    public function getLatestSamsung() {
      $query = "SELECT * FROM tbl_productS WHERE brandId = '7' ORDER BY productId DESC LIMIT 1";
      return $this->db->select($query);
    }

    public function getLatestAcer() {
      $query = "SELECT * FROM tbl_productS WHERE brandId = '8' ORDER BY productId DESC LIMIT 1";
      return $this->db->select($query);
    }

    public function getLatestCannon() {
      $query = "SELECT * FROM tbl_productS WHERE brandId = '9' ORDER BY productId DESC LIMIT 1";
      return $this->db->select($query);
    }

    
  }
  
?>