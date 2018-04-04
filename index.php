<?php

    require_once "init.php";
    session_start();

    if(!isset($_GET['lang'])){
      $_GET['lang'] = 'fr';
    }


    $lang = $fr_class = $en_class = '';
    /* Récupération de la langue dans la chaîne get */
    $lang = (isset($_GET['lang']) && file_exists('assets/lang/'.$_GET['lang'].'.json')) ? $_GET['lang'] : 'fr';
    /* Définition de la class pour les liens de langue */
    if ($lang == 'fr'){
        $fr_class = ' class="active"';
    }else{
        $en_class = ' class="active"';
    }
    /* Récupération du contenu du fichier .json */
    $contenu_fichier_json = file_get_contents('assets/lang/'.$lang.'.json');
    /* Les données sont récupérées sous forme de tableau (true) */
    $tr = json_decode($contenu_fichier_json, true);

?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>JSON | Module 214</title>
    <meta charset="utf-8" />
    <link rel="icon" href="/images/index3.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
  <body class="homepage">
    <form id="changeLang" class="" action="" method="GET">

      <?php
        if($_GET['lang'] == "fr"){
            echo ' <input type="hidden" name="lang" value="en">';
        } else if($_GET['lang'] == "en"){
            echo '<input type="hidden" name="lang" value="fr">';
        }
      ?>
      <div id="language" class="language_margin">
        <?php
        if($_GET['lang'] == "fr"){
          echo '<img src="images/flag/en.png" alt="EN Flag"  class="langIMG">';
        } else {
          echo '<img src="images/flag/fr.png" alt="FR Flag"  class="langIMG">';
        }
       ?>

      </div>
    </form>

    <!-- TEST IMAGE -->
    <?php
    if(isset($_SESSION['img'])){
      echo "Your image :"  . $_SESSION['img'];
      echo '<img src="uploads/userFiles/'. $_SESSION['img'] .'" alt="imgLoaded" height="100" width="">';
    } else {
        echo "go to /test.php to load an image (THIS IS TEST)";
    }
    ?>

    <div id="page-wrapper">
        <div id="header" class="">
            <div id="header_menu" class="inner animated fadeInUpBig">
              <header>
                <h1 id="logo">JSON</h1>
                <h3 id="module">Module 214</h3>
                <p id="owner">Richard Martins Tenorio | Hadrien Louis</p>
              </header>
              <footer>
                <a id="start_button" href="#banner" class="button circled scrolly"><?php echo $tr['header']['start'] ?></a>
              </footer>
            </div>
        </div>
        <section id="banner">
          <header>
            <h2><?php echo $tr['header']['title'] ?></h2>
            <p>
              <?php echo $tr['header']['content'] ?>
            </p>
          </header>
        </section>
        <section id="section_tableJson">
          <div class="">
            <h1 id="title"><?php echo $tr['JsonTable']['title'] ?></h1>

            <div id="id="tablejson"" class="">
            </div>

            <table id="tablejson" class="table table-striped w-50 p-3 text-centered">
              <thead class="thead-inverse">
                <tr></tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </section>
        <div id="footer">
          <div class="container">
            <div class="row">
              <div class="12u">
                  <div class="copyright">
                    <ul class="menu">
                      <li>&copy; 2018. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP / helios</a></li><li> &lt;/&gt; with &hearts; by <a href="https://www.github.com/richmartins/">@richmartins</a> |  <a href="https://www.github.com/hadrylouis/">@hadrylouis</a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.dropotron.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.scrolly.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.onvisible.min.js" type="text/javascript"></script>
    <script src="assets/js/skel.min.js" type="text/javascript"></script>
    <script src="assets/js/util.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/js/custom.js" type="text/javascript"></script>
  </body>
</html>
