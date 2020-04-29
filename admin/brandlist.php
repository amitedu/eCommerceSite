<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	require_once '../classes/Brand.php'; 
	$brnd = new Brand();
?>
<?php
  if(isset($_GET['brandDelId'])) {
		$resultDelete = $brnd->brandDeleteById($_GET['brandDelId']);
  }
?>
<?php
	$result = $brnd->brandShow();
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
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
													<th>Brand Name</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                        <?php
                          if($result != false) {
                            $i = 0;
                            while($brandList = $result->fetch_assoc()) {
                              $i++;
                        ?>
                          <tr class="odd gradeX">
                            <td><?= $i; ?></td>
                            <td><?= $brandList['brandName']; ?></td>
                            <td><a href="brandedit.php?brandId=<?= $brandList['brandId']; ?>">Edit</a> || <a href="?brandDelId=<?= $brandList['brandId']; ?>">Delete</a></td>
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

