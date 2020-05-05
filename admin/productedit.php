<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php' ?>
<?php include '../classes/Brand.php' ?>
<?php require_once '../classes/Product.php'; ?>
<?php
  $ca = new Category();
  $br = new Brand();
  $pr = new Product();
?>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $pr->productUpdate($_POST, $_FILES, $_GET['productEditId']);
  }
?>
<?php
  if(isset($_GET['productEditId'])) {
    $resultShow = $pr->productShowById($_GET['productEditId']);
  }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
        <?php
          if(isset($result)) {
            echo $result;
          }
        ?>
        <?php
          if($resultShow != false) {
            $product = $resultShow->fetch_assoc();
          }
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                      <label>Name</label>
                    </td>
                    <td>
                      <input type="text" name="productName" value="<?=$product['productName'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php
                              $result = $ca->categoryShow();
                              if($result != false) {
                                while($category = $result->fetch_assoc()) {
                            ?>
                              <option value="<?=$category['catId'];?>" <?= $category['catId'] == $product['catId'] ? 'selected' : ''; ?>><?=$category['catName']?></option>
                            <?php
                                }
                              }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php
                              $resultBrand = $br->brandShow();
                              if($resultBrand != false) {
                                while($brand = $resultBrand->fetch_assoc()) {
                            ?>
                                <option value="<?=$brand['brandId'];?>" <?= $brand['brandId'] == $product['brandId'] ? 'selected' : ''; ?> ><?= $brand['brandName']; ?></option>
                            <?php
                                }
                              }
                            ?>
                        </select>
                    </td>
                </tr>
        
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"><?=$product['body'];?></textarea>
                    </td>
                </tr>
        <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?=$product['price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
        
        <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <?php

                            ?>
                            <option>Select Type</option>
                            <option value="0" <?= $product['type'] == 0 ? 'selected' : ''; ?>>Featured</option>
                            <option value="1" <?= $product['type'] == 1 ? 'selected' : ''; ?>>General</option>
                        </select>
                    </td>
                </tr>

        <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


