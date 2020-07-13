<?php
  require 'conn.php';
  if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $query = "SELECT * FROM `products` WHERE `id` = '$id'";
    if($qr = mysqli_query($mysqli, $query)){
      $product = mysqli_fetch_assoc($qr);
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Product Page</title>
    <?php include('./partials/csslinks.php') ?>
  </head>
  <body>
    <?php include('./partials/header.php'); ?>
    <main>
      <div class="container">
        <div class="row">
          <?php
          if(isset($_GET['id']) && !empty($_GET['id'])){
            ?>
            <nav class="z-depth-0 transparent" id="breadcrumbdiv">
              <div class="nav-wrapper col s12">
                <a href="./index.php" class="breadcrumb">Home</a><a href="./index.php?type=<?php echo $product['type']; ?>" class="breadcrumb"><?php echo $product['type']; ?></a><a href="./productpage.php?id=<?php echo $product['id']; ?>" class="breadcrumb" id="lasta"><?php echo $product['name']; ?></a>
              </div>
            </nav>
            <br>
            <div class="col s12 row">
              <div class="col s12 l5">
                <img src="./admin/<?php echo $product['productimage']; ?>" class="responsive-img materialboxed" alt="">
                <br><br>
              </div>
              <div class="row divider hide-on-med-and-up">

              </div>
              <div class="col s12 l6 offset-l1">
                <div class="row">
                  <div class="col s12">
                    <p class="flow-text"><?php echo $product['name']; ?></p>
                  </div>
                  <div class="col s6 marginall">
                    <b>Price</b>
                    <p><?php echo $product['price']; ?> /-</p>
                  </div>
                  <div class="col s6 marginall">
                    <b>Pieces Available</b>
                    <p><?php echo $product['stock']; ?></p>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col s12">
                    <a href="<?php echo $product['w_link']; ?>" class="btn waves-effect waves-light amber lighten-1">Check Availability</a>
                    <br>
                    <small>Proceed with purchase on Whatsapp</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 row">
              <p class="flow-text">Description</p>
              <p><?php echo nl2br($product['description']); ?></p>
            </div>
            <div class="col s12">
              <small>If the above button does not work please message us on Whatsapp on +<?php echo substr($product['w_link'], stripos($product['w_link'], "wa.me/") + 6, 12); ?></small>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </main>
    <?php include('./partials/jslinks.php') ?>
  </body>
</html>
