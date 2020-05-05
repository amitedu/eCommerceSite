<?php include 'inc/header.php'; ?>
<?php
	// UPDATE PRODUCT
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$update = $ct->cartQuantityUpdate($_POST['quantity'], $_POST['productId']);
		if(!$update) {
			echo 'ERROR: Quantity can not be updated!';
		}
	}
	// DELETE PRODUCT
	if(isset($_GET['deleteCartProductId']) && $_GET['deleteCartProductId'] != NULL) {
		$ct->deleteCartProduct($_GET['deleteCartProductId']);
	}
?>
<?php
	if(!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=live' />";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="25%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$cartProduct = $ct->getCartProduct();
								$i 				= 0;
								if($cartProduct != false) {
									$total		= 0;
									$subTotal = 0;
									while($result = $cartProduct->fetch_assoc()) {
										$i++;
							?>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $result['productName']; ?></td>
								<td><img src="admin/<?= $result['image']; ?>" width="20px" height="25px" alt=""/></td>
								<td><?= $result['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="quantity" value="<?= $result['quantity']; ?>"/>
										<input type="hidden" name="productId" value="<?= $result['productId']; ?>">
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?= $total = $result['quantity'] * $result['price']; ?></td>
								<td><a href="?deleteCartProductId=<?= $result['productId']; ?>">X</a></td>
							</tr>
							<?php $subTotal = $subTotal + $total; ?>
							<?php
									}
							?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?= $subTotal; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
									$vat = $subTotal * 0.1;
									echo $subTotal + $vat;
								?></td>
							</tr>
					   </table>
						 <?php
								} else {
									echo "Cart empty! " . '<a class="button" href="index.php">Shop Now</a>';
								}
								Session::set("cartTotalItems", "$i");
								// header("Location: cart.php");
							?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
	 
<?php include 'inc/footer.php'; ?>
