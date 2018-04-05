<?php
    #debug
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    #### upload ####
    try {
        // Submit but no file given
        if (!isset($_FILES['img']['error']) ||
             is_array($_FILES['img']['error'])) {
                 session_destroy();
                 session_unset();
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

          move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/userFiles/" . $_FILES["img"]["name"]);

          $_SESSION['img'] = $_FILES['img']['name'];

      } else {
          session_destroy();
          session_unset();
      }

    } catch (RuntimeException $e) {
        echo $e->getMessage();

    }

    #### timer session ####
    if (isset($_SESSION['most_recent_activity']) &&
        (time() - $_SESSION['most_recent_activity'] > 60)) {

     //60 seconds = 1 minutes lol
     session_destroy();
     session_unset();

     }
     $_SESSION['most_recent_activity'] = time(); // the start of the session.


    #### Langue ####
    if (!isset($_GET['lang'])){
      $_GET['lang'] = 'fr';
    }


    $lang = $fr_class = $en_class = '';
    /* Récupération de la langue dans la chaîne get */
    $lang = (isset($_GET['lang']) && file_exists('assets/lang/'.$_GET['lang'].'.json')) ? $_GET['lang'] : 'fr';
    /* Définition de la class pour les liens de langue */
    if ($lang == 'fr'){
        $fr_class = ' class="active"';
    } else {
        $en_class = ' class="active"';
    }
    /* Récupération du contenu du fichier .json */
    $contenu_fichier_json = file_get_contents('assets/lang/'.$lang.'.json');
    /* Les données sont récupérées sous forme de tableau (true) */
    $tr = json_decode($contenu_fichier_json, true);
