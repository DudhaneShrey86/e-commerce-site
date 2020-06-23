<?php
  require '.././conn.php';
  if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
    header("Location: ./index.php");
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <?php include('.././partials/admincsslinks.php') ?>
    <style media="screen">
      header, main, footer{
        padding-left: 0;
      }
      .sidenav, .sidenav-trigger{
        display: none;
      }
    </style>
  </head>
  <body>
    <?php include('.././partials/adminheader.php'); ?>
    <div class="container row">
      <br>
      <form class="col s12 l6 offset-l3 card row" action="./checklogin.php" method="post">
        <p class="col s12 flow-text">Admin Login</p>
        <div class="col s12 divider"></div>
        <p class="col s12 center red-text"><?php echo $_SESSION['errormsg'] ?? '' ?></p>
        <div class="col s12 input-field">
          <input type="text" name="username" id="username" required>
          <label for="username">Username</label>
        </div>
        <div class="col s12 input-field">
          <input type="password" name="password" id="password" required>
          <label for="password">Password</label>
        </div>
        <div class="col s12 input-field">
          <button class="btn waves-effect waves-light">Login</button>
        </div>
      </form>
    </div>
    <?php include('.././partials/adminjslinks.php') ?>
  </body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
  }
?>
