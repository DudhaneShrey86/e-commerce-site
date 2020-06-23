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
  <main data-id="addproducts">
    <div class="container">
      <div class="row">
        <div class="col s12 l8 offset-l2">
          <p class="flow-text">Creating New Product</p>
          <form class="" action="./addproducts.php" method="post">
            
            <button class="btn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
  <script type="text/javascript">

  </script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
  }
?>
