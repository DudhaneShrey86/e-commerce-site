<?php
  session_start();
  $mysqli = mysqli_connect('localhost', 'root', '', 'jitu');
  if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit("Unable to connect");
  }
?>
