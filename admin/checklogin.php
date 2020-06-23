<?php
  require '.././conn.php';
  $res = '';
  if(isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && $_POST['password']){
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $password = md5($password);
    $query = "SELECT * FROM `admins` WHERE `username` = '$username' AND `password` = '$password'";
    if($qr = mysqli_query($mysqli, $query)){
      if(mysqli_num_rows($qr) != 0){
        $row = mysqli_fetch_assoc($qr);
        $_SESSION['curuser'] = $row['username'];
        $_SESSION['curuserdesignation'] = $row['designation'];
      }
      else{
        $_SESSION['errormsg'] = 'Incorrect Username/Password combination';
      }
      header('Location: ./index.php');
    }
  }
?>
