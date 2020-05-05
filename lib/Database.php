<?php
  $filepath = realpath(dirname(__FILE__));
  require $filepath . '/../config/config.php';

  class Database {
    
    public $host = DB_HOST;
    public $db_name = DB_NAME;
    public $user = DB_USER;
    public $pass = DB_PASS;

    public $link;
    public $error;

    public function __construct() {
      $this->connectDB();
    }

    private function connectDB() {
      $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if(!$this->link) {
        $this->error = 'Connection fail ' . $this->link->connect_error;
        return false;
      }
    }

    public function select($query) {
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if($result->num_rows > 0) {
        return $result;
      } else {
        return false;
      }
    }

    public function insert($query) {
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if($result) {
        return true;
      } else {
        return false;
      }
    }

    public function update($query) {
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if($result) {
        return true;
      } else {
        return false;
      }
    }

    public function delete($query) {
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if($result) {
        return true;
      } else {
        return false;
      }
    }
    
  }


?>