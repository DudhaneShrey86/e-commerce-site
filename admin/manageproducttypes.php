<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
  $res = "";
  $query = "SELECT `id`, `name` FROM `type`";
  $qr = mysqli_query($mysqli, $query);
  if(mysqli_num_rows($qr) == 0){
    $res = '<li class="collection-item"><p>No Product Types Found!</p></li>';
  }
  else{
    while($row = mysqli_fetch_assoc($qr)){
      $res .= '<li class="collection-item row parenttofind" data-id="'.$row['id'].'"><p class="col s12">Product Type Name: <b>'.$row['name'].'</b></p><div class="col s12 deletebuttondiv"><a href="./editproducttypes.php?typeid='.$row['id'].'" class="btn waves-effect waves-light editbutton">Edit</a><button class="btn waves-effect waves-light red darken-1 deletebutton" data-id="'.$row['id'].'" data-tablename="type" onclick="deleteitem($(this))">Delete</button></div></li>';
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
  <link rel="stylesheet" href=".././css/manageusers.css">
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="manageproducttypes">
    <div class="container">
      <div class="row">
        <br>
        <div class="col s12 l8 offset-l2 card">
          <ul class="tabs">
            <li class="tab"><a href="#addtypes">Add</a></li>
            <li class="tab"><a href="#managetypes">Manage</a></li>
          </ul>
          <div class="divider">

          </div>
          <div class="row" id="addtypes">
            <div class="col s12">
              <p class="col s12 flow-text">Adding New Product Type</p>
              <form class="col s12" action="./addproducttypes.php" method="post">
                <?php
                if(isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])){
                  ?>
                  <p class="flow-text <?php echo $_SESSION['classes'] ?> darken-1" id="errortext"><?php echo $_SESSION['errormsg'];?></p>
                  <?php
                }
                ?>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" id="name" name="name" required>
                    <label for="name">Name</label>
                    <span class="helper-text"></span>
                  </div>
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row" id="managetypes">
            <div class="col s12">
              <p class="flow-text col s12">Manage Product Type</p>
              <ul class="collection">
                <?php echo $res; ?>
              </ul>
            </div>
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
