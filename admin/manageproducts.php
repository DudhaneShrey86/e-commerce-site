<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
  $query = "SELECT * FROM `products`";
  $qr = mysqli_query($mysqli, $query);
  $res = "";
  if(mysqli_num_rows($qr) == 0){
    $res = "<p class='flow-text'>No products found!</p>";
  }
  else{
    while($row = mysqli_fetch_assoc($qr)){
      $res .= '<div class="card row parenttofind" data-id="'.$row['id'].'"><div class="card-content col s12"><span class="card-title productname">'.$row['name'].'</span><div class="divider"></div><div class="row marginall"><div class="col s12 l4 "><img src="./'.$row['productimage'].'" class="responsive-img" alt=""></div><div class="col s12 l7 offset-l1"><p class="flow-text">Description:</p><p>'.nl2br($row['description']).'</p></div><div class="col s12"><p class="flow-text">Details</p><div class="col s6"><b>Price</b><p>'.$row['price'].' /-</p></div><div class="col s6"><b>Stock</b><p>'.$row['stock'].'</p></div><div class="col s12"><b>Type</b><p>'.$row['type'].'</p></div></div></div></div><div class="card-action col s12"><a href="./editproducts.php?id='.$row['id'].'" class="btn waves-effect waves-light">Edit</a>&nbsp;&nbsp;<button type="button" data-id="'.$row['id'].'" data-tablename="products" onclick="deleteitem($(this))" class="btn waves-effect waves-light red darken-1">Delete</button></div></div>';
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
  <style media="screen">
    #search{
      margin-bottom: 0;
      border: 0;
    }
  </style>
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="manageproducts">
    <div class="container">
      <div class="row">
        <div class="col s12 l10 offset-l1 card input-field">
          <i class="material-icons prefix">search</i>
          <input type="text" id="search" placeholder="Search product by name">
        </div>
        <div class="col s12 l10 offset-l1">
          <?php
            if(isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])){
              ?>
              <p class="flow-text <?php echo $_SESSION['classes'] ?> darken-1"> <?php echo $_SESSION['errormsg']; ?> </p>
              <?php
            }
          ?>
          <div>
            <p class="flow-text" id="nofound">No products found!</p>
            <?php echo $res; ?>
            <!-- <div class="card row parenttofind" data-id="1">
              <div class="card-content col s12">
                <span class="card-title productname">Nike</span>
                <div class="divider"></div>
                <div class="row marginall">
                  <div class="col s12 l4 ">
                    <img src="./uploads/me.png" class="responsive-img" alt="">
                  </div>
                  <div class="col s12 l7 offset-l1">
                    <p class="flow-text">Description:</p>
                    <p>DUDUDE</p>
                  </div>
                  <div class="col s12">
                    <p class="flow-text">Details</p>
                    <div class="col s6">
                      <b>Price</b>
                      <p>4500 /-</p>
                    </div>
                    <div class="col s6">
                      <b>Stock</b>
                      <p>5</p>
                    </div>
                    <div class="col s12">
                      <b>Tags</b>
                      <p>Tag1, tag2</p>
                    </div>
                    <div class="col s12">
                      <b>Type</b>
                      <p>Shoes</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action col s12">
                <button type="button" class="btn waves-effect waves-light">Edit</button>&nbsp;&nbsp;
                <button type="button" data-id="'.$row['id'].'" data-tablename="products" onclick="deleteitem($(this))" class="btn waves-effect waves-light red darken-1">Delete</button>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
  <script src=".././js/manageproducts.js" charset="utf-8"></script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
    unset($_SESSION['classes']);
  }
?>
