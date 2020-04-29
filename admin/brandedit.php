<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php 
  require_once '../classes/Brand.php';
  $brnd = new Brand();
?>
        <div class="grid_10">
          <div class="box round first grid">
            <h2>Add New Brand</h2>
            <?php
              if(isset($_GET['brandId'])) {
                $resultShow = $brnd->brandById($_GET['brandId']);
                $brand = $resultShow->fetch_assoc();
              }
            ?>
            <?php
              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $brnd->brandUpdate($_GET['brandId'], $_POST['catName']);
              }
            ?>
              <div class="block copyblock"> 
              <?php
                if(isset($result)) {
                  echo $result;
                }
              ?>
                 <form action="" method="POST">
                    <table class="form">					
                      <tr>
                        <td>
                          <input type="text" name="catName" value="<?=$brand['brandName']?>" class="medium" />
                        </td>
                      </tr>
                      <tr> 
                        <td>
                          <input type="submit" name="submit" Value="Save" />
                        </td>
                      </tr>
                    </table>
                </form>
              </div>
          </div>
        </div>
<?php include 'inc/footer.php';?>