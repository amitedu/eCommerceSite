<?php
  $filepath = realpath(dirname(__FILE__));
  require_once $filepath . '/../lib/Database.php';
  require_once $filepath . '/../helpers/Helper.php';
?>
<?php

  class Customer {
    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Helper();
    }

    public function customerRegistration($post) {

      $name     = $this->fm->validation($post['name']);
      $name     = mysqli_real_escape_string($this->db->link, $name);

      $city     = $this->fm->validation($post['city']);
      $city     = mysqli_real_escape_string($this->db->link, $city);

      $zip      = $this->fm->validation($post['zip']);
      $zip      = mysqli_real_escape_string($this->db->link, $zip);

      $email    = $this->fm->validation($post['email']);
      $email    = mysqli_real_escape_string($this->db->link, $email);

      $state    = $this->fm->validation($post['state']);
      $state    = mysqli_real_escape_string($this->db->link, $state);

      $address  = $this->fm->validation($post['address']);
      $address  = mysqli_real_escape_string($this->db->link, $address);

      $phone    = $this->fm->validation($post['phone']);
      $phone    = mysqli_real_escape_string($this->db->link, $phone);
      
      $password = $post['password'];

      if(empty($name) || empty($city) || empty($zip) || empty($email) || empty($state) || empty($address) || empty($phone) || empty($password)) {
        return '<span>Field can not be empty!</span>';
      } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query    = "INSERT INTO tbl_customers(name, city, zip, email, state, address, phone, password) VALUES('$name', '$city', '$zip', '$email', '$state', '$address', '$phone', '$password')";
        if($this->db->insert($query)) {
          return '<span>Registration successfull</span>';
        } else {
          return '<span>ERROR:Registration Unsuccessfull</span>';
        }
        
      }
      
    }

    public function customerLogin($post) {
      $email    = $this->fm->validation($post['email']);
      $email    = mysqli_real_escape_string($this->db->link, $email);

      $password = mysqli_real_escape_string($this->db->link, $post['password']);

      if(empty($email) || empty($password)) {
        return '<span>Field can not be empty!</span>';
      } else {
        $query    = "SELECT * FROM tbl_customers WHERE email = '$email'";
        $customer = $this->db->select($query);
        if($customer != false) {
          $customerResult = $customer->fetch_assoc();
          Session::set("customerLogin", true);
          Session::set("customerId", $customerResult['id']);
          Session::set("customerName", $customerResult['name']);
          if(password_verify($password, $customerResult['password'])) {
            header("Location: order.php");
          } else {
            return 'Email and Password does not match';
          }
        }
      }
    }
    
  }

?>