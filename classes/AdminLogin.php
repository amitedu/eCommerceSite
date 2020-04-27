<?php
  require_once '../lib/Session.php';
  Session::checkLogin();
  require_once '../lib/Database.php';
  require_once '../helpers/Helper.php';
?>

<?php
  class AdminLogin {
    private $db;
    private $hl;
    public function __construct() {
      $this->db = new Database();
      $this->hl = new Helper();
    }

    public function adminLogin($adminUser, $adminPass) {
      $adminUser = $this->hl->validation($adminUser);
      $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
      
      if(empty($adminUser) || empty($adminPass)) {
        return 'Username or Password can not be empty';
      } else {
        $query  = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
        $result = $this->db->select($query);
        if($result != false) {
          $value = $result->fetch_assoc();
          Session::set('adminLogin', true);
          Session::set('adminId', $value['adminId']);
          Session::set('adminUser', $value['adminUser']);
          Session::set('adminName', $value['adminName']);
          header("Location: dashboard.php");
        } else {
          return 'Username and Password does not match';
        }
      }
    }
  }




?>