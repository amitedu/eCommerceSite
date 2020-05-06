<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
					<?php
						$productCategory = $pr->getProductsByCategory($_GET['productCategoryId']);
						$i = 0;
						if($productCategory != false) {
							while($category = $productCategory->fetch_assoc()) {
					?>
								<div class="grid_1_of_4 images_1_of_4" <?= $i%4 ? '' : 'style="margin-left:0"' ?>>
									<a href="preview.php?previewProductId=<?= $category['productId']; ?>"><img src="admin/<?= $category['image']; ?>" width="188.5" height="188.5" alt="" /></a>
									<h2><?= $category['productName']; ?> </h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
									<p><span class="price">$<?= $category['price']; ?></span></p>
									<div class="button"><span><a href="preview.php?previewProductId=<?= $category['productId']; ?>" class="details">Details</a></span></div>
								</div>					
					<?php
								$i++;
							}
						}
					?>
				
			</div>
    </div>
 </div>
</div>

<?php include 'inc/footer.php'; ?>
