<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/Brand.php';?>
        <div class="grid_10">
          <div class="box round first grid">
            <h2>Add New Brand</h2>
            <?php
              $brnd = new Brand();
              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $result = $brnd->brandAdd($_POST['catName']);
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
                          <input type="text" name="catName" placeholder="Enter Brand Name..." class="medium" />
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