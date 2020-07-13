<?php
require '.././conn.php';
/////////////add product logic////////////////
if(isset($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['description'], $_POST['type'], $_POST['w_link'])){
  if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['description']) && !empty($_POST['type']) && !empty($_POST['w_link'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["productimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["productimage"]["tmp_name"]);
    if($check !== false) {
      if(file_exists($target_file)){
        $_SESSION['errormsg'] = "A file with same name already exists!";
        $_SESSION['classes'] = "red-text";
      }
      else{
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $price = mysqli_real_escape_string($mysqli, $_POST['price']);
        $stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
        $description = mysqli_real_escape_string($mysqli, $_POST['description']);
        $type = mysqli_real_escape_string($mysqli, $_POST['type']);
        $w_link = mysqli_real_escape_string($mysqli, $_POST['w_link']);
        $query = "INSERT into `products` (`name`, `price`, `stock`, `description`, `productimage`, `type`, `w_link`) VALUES ('$name', '$price', '$stock', '$description', '$target_file', '$type', '$w_link')";
        if($qr = mysqli_query($mysqli, $query) && move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file)){
          $_SESSION['errormsg'] = "Product added Succesfully!";
          $_SESSION['classes'] = "green-text";
        }
        else{
          $_SESSION['errormsg'] = "Product already exists!";
          $_SESSION['classes'] = "red-text";
        }
      }
    }
    else{
      $_SESSION['errormsg'] = "Please upload a proper image file.";
      $_SESSION['classes'] = "red-text";
    }
    header("Location: ./addproducts.php");
  }
}
?>
