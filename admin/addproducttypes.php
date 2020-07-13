<?php
  require '.././conn.php';
  if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    if(isset($_POST['editproducttype']) && !empty($_POST['editproducttype'])){
      if(isset($_POST['id'], $_POST['oldname']) && !empty($_POST['id']) && !empty($_POST['oldname'])){
        $id = mysqli_real_escape_string($mysqli, $_POST['id']);
        $oldname = mysqli_real_escape_string($mysqli, $_POST['oldname']);
        $query = "UPDATE `type` SET `name` = '$name' WHERE `id` = '$id'";
        $query1 = "UPDATE `products` SET `type` = '$name' WHERE `type` = '$oldname'";
        if($qr = mysqli_query($mysqli, $query) && $qr1 = mysqli_query($mysqli, $query1)){
          $_SESSION['errormsg'] = 'Product Type Updated!';
          $_SESSION['classes'] = 'green-text';
        }
        else{
          $_SESSION['errormsg'] = 'Some error occured';
          $_SESSION['classes'] = 'red-text';
        }
      }
      else{
        $_SESSION['errormsg'] = 'Some error occured';
        $_SESSION['classes'] = 'red-text';
      }
      header("Location: ./manageproducttypes.php");
    }
    else{
      $query = "INSERT into `type` (`name`) VALUES ('$name');";
      if($qr = mysqli_query($mysqli, $query)){
        $_SESSION['errormsg'] = 'Product Type Added!';
        $_SESSION['classes'] = 'green-text';
      }
      else{
        $_SESSION['errormsg'] = 'Some error occured';
        $_SESSION['classes'] = 'red-text';
      }
      header("Location: ./manageproducttypes.php");
    }
  }
  if(isset($_POST['deleteproducttype'], $_POST['id'])){
    $id = $_POST['id'];
    $query = "DELETE FROM `type` WHERE `id` = '$id'";
    if($qr = mysqli_query($mysqli, $query)){
      $res = 'ok';
    }
    else{
      $res = 'error';
    }
    echo $res;
  }

?>
