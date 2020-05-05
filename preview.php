<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
						$product = $pr->productPreview($_GET['previewProductId']);
						if($product != false) {
							$result = $product->fetch_assoc();
						}
						$flag = $pr->checkDuplicateProduct($_GET['previewProductId']);
					?>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST') {
							$ct->addToCart($_GET['previewProductId'], $_POST['quantity']);
						}
					?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/<?= $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?= $result['productName']; ?></h2>
					<div class="price">
						<p>Price: <span><?= $result['price']; ?></span></p>
						<p>Category: <span><?= $result['catName']; ?></span></p>
						<p>Brand:<span><?= $result['brandName']; ?></span></p>
					</div>
					<div class="add-cart">
						<?php
							if(!$flag) {
						?>
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1"/>
									<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
								</form>
						<?php
							} else {
						?>
									<div class="button"><span><a href="index.php">Back</a></span></div>
									<div><span>Product Already Added</span></div>
						<?php
							}
						?>
					</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?= $result['body']; ?></p>
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
				      <li><a href="productbycat.php">Desktop</a></li>
				      <li><a href="productbycat.php">Laptop</a></li>
				      <li><a href="productbycat.php">Accessories</a></li>
				      <li><a href="productbycat.php#">Software</a></li>
					   <li><a href="productbycat.php">Sports & Fitness</a></li>
					   <li><a href="productbycat.php">Footwear</a></li>
					   <li><a href="productbycat.php">Jewellery</a></li>
					   <li><a href="productbycat.php">Clothing</a></li>
					   <li><a href="productbycat.php">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.php">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.php">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
	 
<?php include 'inc/footer.php'; ?>
