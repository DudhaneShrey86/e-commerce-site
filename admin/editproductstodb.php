<?php
require '.././conn.php';
/////////////edit product logic////////////////
if(isset($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['description'], $_POST['type'], $_POST['tags'], $_POST['w_link'])){
  if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['description']) && !empty($_POST['type']) && !empty($_POST['tags']) && !empty($_POST['w_link'])){
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $type = mysqli_real_escape_string($mysqli, $_POST['type']);
    $type = explode("|", $type);
    $type = $type[0];
    $tags = mysqli_real_escape_string($mysqli, $_POST['tags']);
    $w_link = mysqli_real_escape_string($mysqli, $_POST['w_link']);
    // file uploaded
    if(isset($_FILES["productimage"]["name"]) && !empty($_FILES["productimage"]["name"])){
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["productimage"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["productimage"]["tmp_name"]);
      if($check !== false) {
        if(file_exists($target_file)){
          $_SESSION['errormsg'] .= "A file with same name already exists!";
          $_SESSION['classes'] = "red-text";
        }
        else{
          $query = "SELECT `productimage` FROM `products` WHERE `id` = '$id'";
          $qr = mysqli_query($mysqli, $query);
          $row = mysqli_fetch_assoc($qr);
          unlink($row['productimage']);
          $query = "UPDATE `products` SET `name` = '$name', `price` = '$price', `stock` = '$stock', `description` = '$description', `type` = '$type', `tags` = '$tags', `w_link` = '$w_link', `productimage` = '$target_file' WHERE `id` = '$id'";
          if(move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file) && $qr = mysqli_query($mysqli, $query)){
            $_SESSION['errormsg'] = "Product Updated Succesfully!";
            $_SESSION['classes'] = "green-text";
          }
          else{
            $_SESSION['errormsg'] = "Some error occured";
            $_SESSION['classes'] = "red-text";
          }
        }
      }
      else{
        $_SESSION['errormsg'] .= "Please upload a proper image file.";
        $_SESSION['classes'] = "red-text";
      }
    }
    else{
      $query = "UPDATE `products` SET `name` = '$name', `price` = '$price', `stock` = '$stock', `description` = '$description', `type` = '$type', `tags` = '$tags', `w_link` = '$w_link' WHERE `id` = '$id'";
      if($qr = mysqli_query($mysqli, $query)){
        $_SESSION['errormsg'] = "Product Updated Succesfully!";
        $_SESSION['classes'] = "green-text";
      }
      else{
        $_SESSION['errormsg'] = "Some error occured";
        $_SESSION['classes'] = "red-text";
      }
    }
    header("Location: ./manageproducts.php");
  }
}
?>
