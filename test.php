<?php
session_start();

if (isset($_FILES['img'])){
  $filename = $_FILES['img']['name'];
  $filetype = $_FILES['img']['type'];
  $filesize = $_FILES['img']['size'];


  echo $filename . " " . $filetype . " " . $filesize;
  move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/userFiles/" . $_FILES["img"]["name"]);

  $_SESSION['img'] = $_FILES['img']['name'];

  if(isset($_SESSION['img'])){
    echo "Your image : "  . $_SESSION['img'];
  }

}



//var_dump($_FILES);


?>

<form class="" action="" method="post" enctype="multipart/form-data">
  <input name="name" type="text" value="">
  <input type="file" name="img">
  <input type="submit" value="Submit">
</form>

<a href="index.php">Back to Menu</a>
