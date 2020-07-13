<?php
  require '.././conn.php';
  if(isset($_POST['getnames']) && !empty($_POST['getnames'])){
    $query = "SELECT `name`, `productimage`, `stock` FROM `products`";
    $res = "";
    if($qr = mysqli_query($mysqli, $query)){
      if(mysqli_num_rows($qr) == 0){
        $res = '{"name": "nok"}';
      }
      else{
        $res = '[';
        while($row = mysqli_fetch_assoc($qr)){
          $res .= '{"name": "'.$row['name'].'", "image": "'.$row['productimage'].'", "stock": "'.$row['stock'].'"}, ';
        }
        $res = chop($res, ', ');
        $res .= ']';
      }
      echo $res;
    }
  }
  if(isset($_POST['productname'], $_POST['stockpurchased']) && !empty($_POST['productname']) && !empty($_POST['stockpurchased'])){
    $productname = mysqli_real_escape_string($mysqli, $_POST['productname']);
    $stockpurchased = mysqli_real_escape_string($mysqli, $_POST['stockpurchased']);
    $query = "UPDATE `products` SET `stock` = `stock` - '$stockpurchased' WHERE `name` = '$productname'";
    if($qr = mysqli_query($mysqli, $query)){
      $_SESSION['errormsg'] = "Order Placed Succesfully!";
      $_SESSION['classes'] = "green-text";
    }
    else{
      $_SESSION['errormsg'] = "Some error occured";
      $_SESSION['classes'] = "red-text";
    }
    header("Location: ./orderedproducts.php");
  }
?>
