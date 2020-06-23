<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
  if($_SESSION['curuserdesignation'] != 0){
    header("Location: ./index.php");
  }
  if(isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['designation']) && !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['designation'])){
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $password = md5($password);
    $designation = mysqli_real_escape_string($mysqli, $_POST['designation']);
    $query = "INSERT into `admins` (`name`, `username`, `password`, `designation`) VALUES ('$name', '$username', '$password', '$designation');";
    if($qr = mysqli_query($mysqli, $query)){
      $_SESSION['errormsg'] = 'User registered successfully';
    }
    else{
      $_SESSION['errormsg'] = 'Some error occured';
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
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="addusers">
    <div class="container">
      <div class="row">
        <form class="col s12 l6 offset-l3" action="./addusers.php" onsubmit="validateform()" method="post">
          <div class="row">
            <p class="flow-text">Create New User</p>
            <p class="center red-text" id="errortext"><?php echo $_SESSION['errormsg'] ?? '' ?></p>
            <div class="input-field col s12">
              <input type="text" name="name" id="name" required>
              <label for="name">Full Name</label>
            </div>
            <div class="input-field col s12">
              <input type="text" name="username" id="username" required>
              <label for="username">Username</label>
            </div>
            <div class="input-field col s12">
              <input type="password" name="password" id="password" required>
              <label for="password">Password</label>
            </div>
            <div class="input-field col s12">
              <input type="password" name="confirmpassword" id="confirmpassword" required>
              <label for="confirmpassword">Retype Password</label>
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
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
  <script type="text/javascript">
    function validateform(){
      var flag = 1;
      if($('#designation').val() == null){
        $('#errortext').html("Please select a designation");
        flag = 0;
      }
      if($('#password').val() != $('#confirmpassword').val()){
        $('#errortext').html("Passwords do not match");
        flag = 0;
      }
      if(flag == 0){
        event.preventDefault();
      }
    }
  </script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
  }
?>
