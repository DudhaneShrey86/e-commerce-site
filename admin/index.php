<?php
  require '.././conn.php';
  if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
    header("Location: ./addproducts.php");
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
    <main>

    </main>
    <?php include('.././partials/adminjslinks.php') ?>
  </body>
</html>
