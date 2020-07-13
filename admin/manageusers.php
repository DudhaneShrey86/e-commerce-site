<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
  if($_SESSION['curuserdesignation'] != 0){
    header("Location: ./index.php");
  }
  $res = "";
  $query = "SELECT `id`, `name`, `username` FROM `admins` WHERE `username` != '".$_SESSION['curuser']."'";
  $qr = mysqli_query($mysqli, $query);
  if(mysqli_num_rows($qr) == 0){
    $res = '<li class="collection-item"><p>No Users Found</p></li>';
  }
  else{
    while($row = mysqli_fetch_assoc($qr)){
      $res .= '<li class="collection-item row valign-wrapper parenttofind"><p class="col s8">'.$row['name'].' - '.$row['username'].'</p><div class="col s4 deletebuttondiv"><button class="btn waves-effect waves-light deletebutton red darken-2" data-id="'.$row['id'].'" data-tablename="admins" onclick="deleteitem($(this))">Delete</button></div></li>';
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
  <main data-id="addusers">
    <div class="container">
      <div class="row">
        <br>
        <div class="card col s12 l8 offset-l2">
          <ul class="tabs">
            <li class="tab"><a href="#addnewuser">Add User</a></li>
            <li class="tab"><a href="#managecurrentusers">Manage Current Users</a></li>
          </ul>
          <div class="divider">

          </div>
          <div class="row" id="addnewuser">
            <div class="col s12">
              <p class="flow-text col s12">Create New User</p>
              <form class="col s12" action="./addusers.php" onsubmit="validateform()" method="post">
                <div class="row">
                  <?php
                  if(isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])){
                    ?>
                    <p class="flow-text <?php echo $_SESSION['classes'] ?> darken-1" id="errortext"><?php echo $_SESSION['errormsg'];?></p>
                    <?php
                  }
                  ?>
                  <div class="input-field col s12">
                    <input type="text" name="name" id="name" required class="validate">
                    <label for="name">Full Name</label>
                    <span class="helper-text" data-error="Required*"></span>
                  </div>
                  <div class="input-field col s12">
                    <input type="text" name="username" id="username" required class="validate">
                    <label for="username">Username</label>
                    <span class="helper-text" data-error="Required*"></span>
                  </div>
                  <div class="input-field col s12">
                    <input type="password" name="password" id="password" required class="validate">
                    <label for="password">Password</label>
                    <span class="helper-text" data-error="Required*"></span>
                  </div>
                  <div class="input-field col s12">
                    <input type="password" name="confirmpassword" id="confirmpassword" required class="validate">
                    <label for="confirmpassword">Retype Password</label>
                    <span class="helper-text" data-error="Required*"></span>
                  </div>
                  <div class="input-field col s12">
                    <select name="designation" id="designation">
                      <option disabled selected>Select A Designation</option>
                      <option value="0">Admin</option>
                      <option value="1">Sub-admin</option>
                    </select>
                  </div>
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light">Add User</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row" id="managecurrentusers">
            <div class="col s12">
              <p class="flow-text">Manage Current Users</p>
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
  <script src=".././js/manageusers.js" charset="utf-8"></script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
    unset($_SESSION['classes']);
  }
?>
