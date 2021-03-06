<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
  $query = "SELECT `name` FROM `type`";
  $qr = mysqli_query($mysqli, $query);
  $res = "";
  if(mysqli_num_rows($qr) == 0){
    $res = "<option value='' disabled>No Product Types</option>";
  }
  else{
    while($row = mysqli_fetch_assoc($qr)){
      $res .= "<option value='".$row['name']."'>".$row['name']."</option>";
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
  <title>Admin Page</title>
  <?php include('.././partials/admincsslinks.php') ?>
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="addproducts">
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
          <p class="flow-text">Creating New Product</p>
          <form class="col s12" action="./addproductstodb.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="name" id="name" required class="validate">
                <label for="name">Product Name</label>
                <span class="helper-text" data-error="Required*"></span>
              </div>
              <div class="input-field col s12 l5">
                <input type="number" name="price" id="price" required class="validate">
                <label for="price">Price</label>
                <span class="helper-text" data-error="Required*"></span>
              </div>
              <div class="input-field col s12 l5 offset-l2">
                <input type="number" name="stock" id="stock" required class="validate">
                <label for="stock">Stock Available</label>
                <span class="helper-text" data-error="Required*"></span>
              </div>
              <div class="input-field col s12">
                <textarea name="description" id="description" class="materialize-textarea validate" required></textarea>
                <label for="description">Product Description</label>
                <span class="helper-text" data-error="Required*">Describe your product in short</span>
              </div>
              <div class="input-field col s12">
                <select name="type" required class="validate" id="type">
                  <option value="" disabled selected>Select Product Type</option>
                  <?php echo $res; ?>
                </select>
              </div>
              <div class="input-field col s12">
                <input type="text" id="phoneno" name="phoneno" required class="validate">
                <label for="phoneno">Your Phone No</label>
                <span class="helper-text" data-error="Required*">Enter your phone number to create a Whatsapp link</span>
                <small class="indigo-text">Please include the country code but do not include the '+' in the beginning, eg: 918798786858</small>
              </div>
              <div class="input-field col s12">
                <button id="generatewalink" type="button" class="btn waves-effect waves-light amber">Generate Whatsapp Link</button><br>
                <small>This link will be provided to the user to be able to contact the concerned authority</small>
              </div>
              <div class="input-field col s12">
                <input type="text" name="w_link" id="w_link" required class="validate">
                <span class="helper-text" data-error="Required*">Generated Whatsapp Link</span>
              </div>
              <div class="file-field col s12 input-field">
                <div class="btn">
                  <span>Upload Image</span>
                  <input type="file" name="productimage" id="productimage">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                  <label for="productimage">Upload an image of the product</label>
                </div>
              </div>
              <div class="input-field col s12">
                <button class="btn">Add Product</button>
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
