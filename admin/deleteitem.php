<?php
  require '.././conn.php';
  $res = "";
  if(isset($_POST['id'], $_POST['tablename']) && !empty($_POST['id']) && !empty($_POST['tablename'])){
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $tablename = mysqli_real_escape_string($mysqli, $_POST['tablename']);
    $query = "DELETE FROM `$tablename` WHERE `id` = '$id'";
    if($qr = mysqli_query($mysqli, $query)){
      $res = 'ok';
    }
    else{
      $res = 'error';
    }
  }
  else{
    $res = "error";
  }
  echo $res;
?>
