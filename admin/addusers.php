<?php
  require '.././conn.php';
  if(isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['designation']) && !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['designation'])){
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $password = md5($password);
    $designation = mysqli_real_escape_string($mysqli, $_POST['designation']);
    $query = "INSERT into `admins` (`name`, `username`, `password`, `designation`) VALUES ('$name', '$username', '$password', '$designation');";
    if($qr = mysqli_query($mysqli, $query)){
      $_SESSION['errormsg'] = 'User registered successfully';
      $_SESSION['classes'] = 'green-text';
    }
    else{
      $_SESSION['errormsg'] = 'Some error occured';
      $_SESSION['classes'] = 'red-text';
    }
    header("Location: ./manageusers.php");
  }
  if(isset($_POST['deleteuser'], $_POST['id']) && !empty($_POST['deleteuser']) && !empty($_POST['id'])){
    $id = $_POST['id'];
    $query = "DELETE FROM `admins` WHERE `id` = '$id'";
    if($qr = mysqli_query($mysqli, $query)){
      $res = 'ok';
    }
    else{
      $res = 'error';
    }
    echo $res;
  }
?>
