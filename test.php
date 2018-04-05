<?php
    session_start();

    try {

        if (
            !isset($_FILES['img']['error']) ||
            is_array($_FILES['img']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['img']['error'] value.
        switch ($_FILES['img']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // Check filesize
        if ($_FILES['img']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        /* To do :
         * check file type : P.S. json MIME type => application/javascript
         */

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

    } catch (RuntimeException $e) {
        echo $e->getMessage();

    }


    ?>

    <form action="test.php" method="post" enctype="multipart/form-data">
      <input name="name" type="text" value="">
      <input type="file" name="img">
      <input type="submit" value="Submit">
    </form>

    <a href="index.php">Back to Menu</a>
