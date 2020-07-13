<?php
  require 'conn.php';
  if(isset($_GET['type']) && !empty($_GET['type'])){
    $type = mysqli_real_escape_string($mysqli, $_GET['type']);
    $query = "SELECT * FROM `products` WHERE `type` = '$type' ORDER BY `created_at` DESC";
    $result = "";
    if($qr = mysqli_query($mysqli, $query)){
      $result = '<nav class="z-depth-0 transparent" id="breadcrumbdiv"><div class="nav-wrapper col s12"><a href="./index.php" class="breadcrumb">Home</a><a href="./index.php?type='.$type.'" class="breadcrumb">'.$type.'</a></div></nav><br>';
      if(mysqli_num_rows($qr) == 0){
        $result .= '<div class="card col s12"><div class="card-content"><p class="flow-text">No Products currently available in '.$type.'</p><br><a href="index.php" class="btn waves-effect waves-light">Back to home</a></div></div>';
      }
      else{
        while($row = mysqli_fetch_assoc($qr)){
          $result .= '<div class="col s12 l4"><div class="card row nopaddingall"><div class="card-image col s4 l12"><a href="./productpage.php?id='.$row['id'].'"><img src="./admin/'.$row['productimage'].'" alt="'.$row['name'].'"></a></div><div class="card-content col s8 l12"><div class="card-title producttitle"><p class="flow-text">'.$row['name'].'</p></div><p>Price: '.$row['price'].' /- </p></div><div class="card-action col s12"><a href="./productpage.php?id='.$row['id'].'">Details</a></div></div></div>';
        }
      }
    }
  }
  else{
    $query = "SELECT DISTINCT `type` FROM `products`";
    $result = "";
    if($qr = mysqli_query($mysqli, $query)){
      while($row = mysqli_fetch_assoc($qr)){
        $type = $row['type'];
        $query1 = "SELECT * FROM `products` WHERE `type` = '$type' ORDER BY `created_at` DESC";
        if($qr1 = mysqli_query($mysqli, $query1)){
          if(mysqli_num_rows($qr1) == 0){
            $result = '<div class="col s12"><p class="flow-text">No Products available at this time</p></div>';
          }
          else{
            $result .= '<div class="col s12 grid"><br><p class="col s12 flow-text"><span>'.$type.'</span><a href="./index.php?type='.$type.'" class="right seeall">See All</a></p>';
            while($row1 = mysqli_fetch_assoc($qr1)){
              $result .= '<div class="col s12 l4"><div class="card row nopaddingall"><div class="card-image col s4 l12"><a href="./productpage.php?id='.$row1['id'].'"><img src="./admin/'.$row1['productimage'].'" alt=""></a></div><div class="card-content col s8 l12"><div class="card-title producttitle"><p class="flow-text">'.$row1['name'].'</p></div><p>Price: '.$row1['price'].' /- </p></div><div class="card-action col s12"><a href="./productpage.php?id='.$row1['id'].'">Details</a></div></div></div>';
            }
            $result .= '</div>';
          }
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <?php include('./partials/csslinks.php') ?>
  </head>
  <body>
    <?php include('./partials/header.php'); ?>
    <main>
      <div class="container">

      </div>
      <div class="row" id="productsdiv">
        <div class="container grid">

        </div>
        <div class="container grid">
          <?php echo $result; ?>
          <!-- THIS IS FOR INDIVIDUAL PRODUCT TYPE PAGES -->
          <!-- <div class="card col s12">
            <div class="card-content">
              <p class="flow-text">No Products available in Shoes</p>
              <br>
              <a href="index.php" class="btn waves-effect waves-light">Back to home</a>
            </div>
          </div> -->
          <!-- <div class="col s12 l4">
            <div class="card row nopaddingall">
              <div class="card-image col s4 l12">
                <a href="#"><img src="./admin/uploads/a.jpg" alt=""></a>
              </div>
              <div class="card-content col s8 l12">
                <div class="card-title">
                  <p class="flow-text">Adidas Superstars</p>
                </div>
                <p>Price: 4000 /- </p>
              </div>
              <div class="card-action col s12">
                <a href="#">Details</a>
              </div>
            </div>
          </div> -->
          <!-- <div class="col s12 grid">
            <br>
            <p class="col s12"><span class="flow-text">Shoes</span><a href="#" class="right">See All</a></p>
            <div class="col s12 l4">
              <div class="card row nopaddingall">
                <div class="card-image col s4 l12">
                  <a href="#"><img src="./admin/uploads/a.jpg" alt=""></a>
                </div>
                <div class="card-content col s8 l12">
                  <div class="card-title">
                    <p class="flow-text">Adidas Superstars</p>
                  </div>
                  <p>Price: 4000 /- </p>
                </div>
                <div class="card-action col s12">
                  <a href="#">Details</a>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </main>
    <?php include('./partials/jslinks.php') ?>
  </body>
</html>
