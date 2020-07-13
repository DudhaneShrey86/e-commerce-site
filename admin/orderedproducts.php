<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){

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
  <main data-id="orderedproducts">
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
          <p class="flow-text">Submit a product order</p>
          <form class="col s12" action="./getnames.php" method="post">
            <div class="row">
              <div class="col s12 input-field">
                <input type="text" name="productname" id="productname" required class="autocomplete validate">
                <label for="productname">Product Name</label>
                <span class="helper-text" data-error="Required*">Type something to see the products</span>
              </div>
              <div class="col s12 input-field">
                <input type="number" name="stockpurchased" id="stockpurchased" class="validate" required value="">
                <label for="stockpurchased">Stock Purchased</label>
                <span class="helper-text" data-error="Required*">Number of items purchased</span>
              </div>
              <div class="col s12">
                <button class="btn waves-effect waves-light">Submit</button>
              </div>
              <div class="col s12">
                <br>
                <div class="marginall">
                  <b>Stock Remaining</b>
                  <p id="stockremaining">Choose a product to see its remaining stock</p>
                </div>
              </div>
              <div class="col s12 l6">
                <p class="flow-text">Product image</p>
                <img src=".././images/selectproduct.png" class="responsive-img" id="productimage" alt="">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
  <script src=".././js/orderedproducts.js" charset="utf-8"></script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
    unset($_SESSION['classes']);
  }

?>
