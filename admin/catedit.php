<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/Category.php';?>

<?php
  // Update Category
  $ca = new Category();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $ca->categoryUpdate($_GET['catId'], $_POST['catName']);
  }
?>
<?php
  // Show Category
  if(isset($_GET['catId'])) {
    $resultShow = $ca->categoryShowById($_GET['catId']);
    $category = $resultShow->fetch_assoc();
  }
?>
        <div class="grid_10">
          <div class="box round first grid">
            <h2>Add New Category</h2>
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
                          <input type="text" name="catName" value="<?=$category['catName'];?>" class="medium" />
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