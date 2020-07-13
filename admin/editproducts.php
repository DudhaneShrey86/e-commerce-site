<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
  if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $query = "SELECT * FROM `products` WHERE `id` = '$id'";
    if($qr1 = mysqli_query($mysqli, $query)){
      if(mysqli_num_rows($qr1) == 0){
        header("Location: ./manageproducts.php");
      }
      else{
        $row1 = mysqli_fetch_assoc($qr1);
      }
    }
  }
  else{
    header("Location: ./manageproducts.php");
  }
  $query = "SELECT `name`, `tags` FROM `type`";
  $qr = mysqli_query($mysqli, $query);
  $res = "";
  if(mysqli_num_rows($qr) == 0){
    $res = "<option value='' disabled>No Product Types</option>";
  }
  else{
    while($row = mysqli_fetch_assoc($qr)){
      if($row['name'] == $row1['type']){
        $res .= "<option value='".$row['name']."|".$row['tags']."' selected>".$row['name']."</option>";
      }
      else{
        $res .= "<option value='".$row['name']."|".$row['tags']."'>".$row['name']."</option>";
      }
    }
  }
}
else{
  header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Edit Product Page</title>
  <?php include('.././partials/admincsslinks.php') ?>
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="editproducts">
    <div class="container">
      <div class="row">
        <div class="col s12 l8 offset-l2">
          <?php
            if(isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])){
              ?>
              <p class="flow-text <?php echo $_SESSION['classes'] ?> darken-1"> <?php echo $_SESSION['errormsg']; ?> </p>
              <?php
            }
          ?>
          <p class="flow-text">Edit Product - <?php echo $row1['name']; ?></p>
          <form class="col s12" action="./editproductstodb.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="name" id="name" value="<?php echo $row1['name']; ?>" required class="validate">
                <label for="name">Product Name</label>
                <span class="helper-text" data-error="Required*"></span>
              </div>
              <div class="input-field col s12 l5">
                <input type="number" name="price" id="price" value="<?php echo $row1['price']; ?>" required class="validate">
                <label for="price">Price</label>
                <span class="helper-text" data-error="Required*"></span>
              </div>
              <div class="input-field col s12 l5 offset-l2">
                <input type="number" name="stock" id="stock" value="<?php echo $row1['stock']; ?>" required class="validate">
                <label for="stock">Stock Available</label>
                <span class="helper-text" data-error="Required*"></span>
              </div>
              <div class="input-field col s12">
                <textarea name="description" id="description" class="materialize-textarea validate" required><?php echo $row1['description']; ?></textarea>
                <label for="description">Product Description</label>
                <span class="helper-text" data-error="Required*">Describe your product in short</span>
              </div>
              <div class="input-field col s12">
                <select name="type" required class="validate" id="type">
                  <option value="" disabled>Select Product Type</option>
                  <?php echo $res; ?>
                </select>
                <small>Some pre-defined tags will be added to the product</small>
              </div>
              <div class="input-field col s12">
                <input type="text" name="tags" id="tags" required class="validate" value="<?php echo $row1['tags']; ?>">
                <span class="helper-text" data-error="Required*">Tags</span>
              </div>
              <div class="input-field col s12">
                <button id="generatewalink" type="button" class="btn waves-effect waves-light amber">Generate New Link</button><br>
                <small>This link will be provided to the user to be able to contact the concerned authority</small>
              </div>
              <div class="input-field col s12">
                <input type="text" name="w_link" id="w_link" required class="validate" value="<?php echo $row1['w_link']; ?>">
                <span class="helper-text" data-error="Required*">Generated Whatsapp Link</span>
              </div>
              <div class="file-field col s12 input-field">
                <div class="btn">
                  <span>Upload Image</span>
                  <input type="file" name="productimage" id="productimage">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                  <label for="productimage">Leave blank if there is no change</label>
                </div>
              </div>
              <div class="input-field col s12">
                <button class="btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
  <script src=".././js/addproducts.js" charset="utf-8"></script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
    unset($_SESSION['classes']);
  }
?>
