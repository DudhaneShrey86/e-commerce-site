<?php
  require '.././conn.php';
  if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
    if(isset($_GET['typeid']) && !empty($_GET['typeid'])){
      $typeid = mysqli_real_escape_string($mysqli, $_GET['typeid']);
      $query = "SELECT * FROM `type` WHERE `id` = '$typeid'";
      if($qr = mysqli_query($mysqli, $query)){
        if(mysqli_num_rows($qr) == 0){
          header("Location: ./manageproducttypes.php");
        }
        else{
          $row1 = mysqli_fetch_assoc($qr);
        }
      }
    }
    else{
      header("Location: ./manageproducttypes.php");
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
  <title>Edit Product Type Page</title>
  <?php include('.././partials/admincsslinks.php') ?>
  <link rel="stylesheet" href=".././css/manageusers.css">
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="editproducttypes">
    <div class="container">
      <div class="row">
        <br>
        <div class="col s12 l8 offset-l2 card">
          <div class="col s12">
            <p class="col s12 flow-text">Edit Product Type - <?php echo $row1['name']?></p>
            <form class="col s12" action="./addproducttypes.php" method="post">
              <?php
              if(isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])){
                ?>
                <p class="flow-text <?php echo $_SESSION['classes'] ?> darken-1" id="errortext"><?php echo $_SESSION['errormsg'];?></p>
                <?php
              }
              ?>
              <input type="hidden" name="editproducttype" value="yes">
              <input type="hidden" name="oldname" value="<?php echo $row1['name']; ?>">
              <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" id="name" name="name" required value="<?php echo $row1['name']; ?>">
                  <label for="name">Name</label>
                  <span class="helper-text"></span>
                </div>
                <div class="input-field col s12">
                  <textarea name="tags" class="materialize-textarea" id="tags" required><?php echo $row1['tags']; ?></textarea>
                  <label for="tags">Tags</label>
                  <small>Type in generic tags seperated by commas, these will be added to a product when you choose its type</small>
                  <span class="helper-text"></span>
                </div>
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
  }
?>
