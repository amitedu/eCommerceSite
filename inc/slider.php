<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$productIphone = $pr->getLatestIphone();
					if($productIphone != false) {
						$latestIphone = $productIphone->fetch_assoc();
					}
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?previewProductId=<?= $latestIphone['productId'] ?>"> <img src="admin/<?= $latestIphone['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?= $latestIphone['productName']; ?></h2>
						<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
						<div class="button"><span><a href="preview.php?previewProductId=<?= $latestIphone['productId'] ?>">Add to cart</a></span></div>
				   </div>
				 </div>			

				 <?php
					$productSamsung = $pr->getLatestSamsung();
					if($productSamsung != false) {
						$latestSamsung = $productSamsung->fetch_assoc();
					}
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?previewProductId=<?= $latestSamsung['productId']; ?>"><img src="admin/<?= $latestSamsung['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?= $latestSamsung['productName']; ?></h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.php?previewProductId=<?= $latestSamsung['productId']; ?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>

			<?php
					$productAcer = $pr->getLatestAcer();
					if($productAcer != false) {
						$latestAcer = $productAcer->fetch_assoc();
					}
			?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?previewProductId=<?= $latestAcer['productId']; ?>"> <img src="admin/<?= $latestAcer['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?= $latestAcer['productName']; ?></h2>
						<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						<div class="button"><span><a href="preview.php?previewProductId=<?= $latestAcer['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>			

				 <?php
					$productCannon = $pr->getLatestCannon();
					if($productCannon != false) {
						$latestCannon = $productCannon->fetch_assoc();
					}
				?>
				 <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?previewProductId=<?= $latestCannon['productId'] ?>"><img src="admin/<?= $latestCannon['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?= $latestCannon['productName']; ?></h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.php?previewProductId=<? $latestCannon['productId']; ?>">Add to cart</a></span></div>
					</div>
				</div>

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>