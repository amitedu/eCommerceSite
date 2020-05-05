<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Product.php';?>
<?php require_once '../helpers/Helper.php'; ?>
<?php
	$pr = new Product();
	$fm = new Helper();
?>
<?php
	if(isset($_GET['productDeleteid'])) {
		$resultDelete = $pr->ProductDelete($_GET['productDeleteid']);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
			<h2>Post List</h2>
			<div class="block">  
				<?= isset($resultDelete) ? $resultDelete : ''; ?>
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>productName</th>
							<th>CatId</th>
							<th>BrandId</th>
							<th>Body</th>
							<th>Price</th>
							<th>Image</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$result = $pr->productShow();
						if($result != false) {
							$i = 0;
							while($product = $result->fetch_assoc()) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?=$i;?></td>
							<td><?=$product['productName']?></td>
							<td><?=$product['catName']?></td>
							<td><?=$product['brandName']?></td>
							<td><?=$fm->textShorten($product['body'], 50);?></td>
							<td>$<?=$product['price']?></td>
							<td><img src="<?=$product['image']?>" height="50px" width="40px"></td>
							<td><?= $product['type'] ? 'General' : 'Featured';?></td>
							<td><a href="productedit.php?productEditId=<?=$product['productId'];?>">Edit</a> || <a href="?productDeleteid=<?=$product['productId'];?>">Delete</a></td>
						</tr>
					<?php
							}
						}
					?>
					</tbody>
				</table>
       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
