<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
		

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
					$product = $pr->getAllFeaturedProduct();
					if($product != false) {
						while($result = $product->fetch_assoc()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php"><img src="admin/<?=$result['image']?>" alt="" /></a>
					 <h2><?=$result['productName']?></h2>
					 <p><?=$fm->textShorten($result['body'], 8)?></p>
					 <p><span class="price">$<?=$result['price']?></span></p>
				     <div class="button"><span><a href="preview.php?previewProductId=<?=$result['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
					$newProduct = $pr->getAllnewProduct();
					if($newProduct != false) {
						while($resultNewProduct = $newProduct->fetch_assoc()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php"><img src="admin/<?=$resultNewProduct['image'];?>" alt="" /></a>
					 <h2><?=$resultNewProduct['productName'];?></h2>
					 <p><span class="price">$<?=$resultNewProduct['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?previewProductId=<?= $resultNewProduct['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
						}
					}
				?>
			</div>
    </div>
 </div>
</div>

<?php include 'inc/footer.php'; ?>