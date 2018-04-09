<?php
    #debug
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    #### upload ####
    try {
        // Submit but no file given
        if (!isset($_FILES['uploadJsonFile']['error']) ||
             is_array($_FILES['uploadJsonFile']['error'])) {
                 session_destroy();
                 session_unset();
                 throw new RuntimeException('Invalid parameters.');
        }


        // Check $_FILES['uploadJsonFile']['error'] value.
        switch ($_FILES['uploadJsonFile']['error']) {
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
        if ($_FILES['uploadJsonFile']['size'] > 3000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        /* To do :
         * check file type : P.S. json MIME type => application/javascript
         */


        if (isset($_FILES['uploadJsonFile'])){

          $filename = $_FILES['uploadJsonFile']['name'];
          $filetype = $_FILES['uploadJsonFile']['type'];
          $filesize = $_FILES['uploadJsonFile']['size'];
          $filedir = "uploads/userFiles";
          $fileextesion = strtolower(pathinfo($filedir . $filename ,PATHINFO_EXTENSION));

          /** Check if uploaded file is JSON type **/
          if($fileextesion != "json" ) {
            throw new RuntimeException('Error NO JSON');
          } else {
            move_uploaded_file($_FILES["uploadJsonFile"]["tmp_name"], "uploads/userFiles/" . $_FILES["uploadJsonFile"]["name"]);
            $_SESSION['uploadJsonFile'] = $_FILES['uploadJsonFile']['name'];
          }

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


    #### load languge file ####

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
