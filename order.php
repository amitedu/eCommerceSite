<?php require_once 'inc/header.php'; ?>
<?php
  if(Session::get("customerLogin") == false) {
    header("Location: order.php");
  }
?>

<h2>Order Page</h2>