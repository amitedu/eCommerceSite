<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	require_once '../classes/Category.php'; 
	$ca = new Category();
?>
<?php
  if(isset($_GET['catDelId'])) {
		$resultDelete = $ca->categoryDeleteById($_GET['catDelId']);
  }
?>
<?php
	$result = $ca->categoryShow();
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
									<?php
										if(isset($resultDelete)) {
											echo $resultDelete;
										}
									?>
                    <table class="data display datatable" id="example">
											<thead>
												<tr>
													<th>Serial No.</th>
													<th>Category Name</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if($result != false) {
														$i = 0;
														while($categoryList = $result->fetch_assoc()) {
															$i++;
												?>
												<tr class="odd gradeX">
													<td><?= $i; ?></td>
													<td><?= $categoryList['catName']; ?></td>
													<td><a href="catedit.php?catId=<?= $categoryList['catId']; ?>">Edit</a> || <a href="?catDelId=<?= $categoryList['catId']; ?>">Delete</a></td>
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

