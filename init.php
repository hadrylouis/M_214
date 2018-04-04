<?php
    #debug
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    #upload
    session_start();

    if (isset($_FILES['img'])){
          $filename = $_FILES['img']['name'];
          $filetype = $_FILES['img']['type'];
          $filesize = $_FILES['img']['size'];


          move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/userFiles/" . $_FILES["img"]["name"]);

          $_SESSION['img'] = $_FILES['img']['name'];

    }

    if (isset($_SESSION['most_recent_activity']) &&
        (time() - $_SESSION['most_recent_activity'] > 20)) {

     //60 seconds = 1 minutes
     session_destroy();
     session_unset();

     }
     $_SESSION['most_recent_activity'] = time(); // the start of the session.


    #Langue
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
