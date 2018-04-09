<?php
    require_once "init.php";
?>

<!DOCTYPE HTML>
<html>

  <head>
    <title>JSON | Module 214</title>
    <meta charset="utf-8" />
    <link rel="icon" href="images/index3.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>

  <body class="homepage">
    <form id="changeLang" action="index.php" method="GET">

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

        <!-- inner banner -->
        <section id="banner">
          <header>
            <h2><?php echo $tr['header']['title'] ?></h2>
            <p><?php echo $tr['header']['content'] ?></p>
          </header>
        </section>


        <?php
            /** echo  "Name : " . $filename . "<br />type : " . $filetype . "<br />size : " . $filesize . " bytes"; **/
        ?>

        <!-- uploaded file name -->
        <input type="hidden" id="userImgName" data-value="<?php echo $filename; ?>" />

        <!-- display-jsons -->
        <section id="section_tableJson">
          <div class="array-json">
            <h1 id="title"><?php echo $tr['JsonTable']['title'] ?></h1>
            <table id="tablejson" class="table table-striped w-50 p-3 text-centered">
              <thead class="thead-inverse">
                <tr></tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        </section>

        <!-- upload -->
        <div class"container">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <input type="file" name="uploadJsonFile">
              <input type="submit" value="Submit">
            </form>
        </div>

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
