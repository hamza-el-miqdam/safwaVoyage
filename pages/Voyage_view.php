<?php
require_once '../backend/module/connection.php';
require_once '../backend/module/model/Media/Media.php';
require_once '../backend/module/model/Cat_Voyage/Cat_Voyage.php';
require_once '../backend/module/model/Voyage/Voyage.php';
//require_once 'backend/module/model/Type_Reservation';
    
$id = (isset($_GET["id"])) ? $_GET["id"] : "";

$voyage =new Voyage();
$media =new Media();
$cat =new Cat_Voyage();

$listVoyage =$voyage->getVoyage();
$listMedia = $media->getMedia();
$listCat = $cat->getCat_Voyage();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Safwa Voyage</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <script src="../js/jquery-1.12.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>


</head>
<body>
<div id="globale">
    <div id="content" class="container">
        <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top">
            <div id="navbar-cont" class="container-fluid">
                <div id="header" class="row">
                    <div class="col-md-4">
                        <img id="logo" src="../image/logo-safwa-final.png" width="165px" height="70px">
                    </div>
                    <div id="teldiv" class="col-md-4">
                        <h2 class="tel">Pour plus d'informations</h2>
                        <h3 class="tel">Tel:+212535536263</h3>
                    </div>
                    <div id="titrediv" class="col-md-4">
                        <h2 id="titre">Agence de voyage</h2>
                    </div>
                </div>
                <div id="bardenav" class="well">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Safwa Voyage</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Home</a></li>

                            <?php
                              while($dataCat=$listCat->fetch()){

                                echo("<li ");

                                if($dataCat["id_cat_voy"] == $id)
                                {
                                    echo("class=\"active\" ");
                                }

                                echo ("><a href=\"Voyage_view.php?id=".$dataCat["id_cat_voy"]."\" >");
                                echo($dataCat["nom_cat_voy"]);
                                echo("</a></li>");}
                            ?>
                    
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="separateur"></div>
           <div class="container-fluid">
            <div class="col-md-10" >
                <ul class="list-group">
                    <?php   
                    while($datavoy=$listVoyage->fetch()){
                        
                        if($datavoy["id_cat_voy"]==$id&&$datavoy["visible_voy"]){

                            $idvoymedia = $datavoy["id_media_voy"];

                            $ilusts = $media->getMedia();

                            while($ilust= $ilusts->fetch()){

                                if($ilust["id_media"] == $idvoymedia)
                                {

                                    $srcimage=$ilust["source_media"];

                                }
                            }
                        echo("<li id='listevoyage' class='well row'>");
                        echo('<div class="col-md-5">');
                        echo('<a href="presentation.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'"><img class="img-rounded" src="../image/'.$srcimage.'" width="350px" height="250px"/></a>');
                        echo('</div><div class="col-md-7">');
                        echo('<a href="presentation.php?id='.$id.'&idvoy='.$datavoy["id_voy"].'"><h2>'.$datavoy["titre_voy"].'</h2></a>');
                        echo('<h3>'.$datavoy["s_titre_voy"].'</h3>');
                        echo('<div class="well cadredhs"><p class="dh">DHs</p><h1>'.$datavoy["prix_voy"].'</h1></div>');
                        echo('</div>');
                        echo("</li>");
                            
                        }
                    }
                     ?>
                </ul>
            </div>
            <div class="col-md-2">
                <div class="well">
                 <p>Some text..</p>
                </div>
                <div class="well">
                   <p>Some text..</p>
                </div>
            </div>
            </div><br>

        <footer class="container-fluid text-center">
          <p>Footer Text</p>
        </footer>
    </div>
</div>
</body>
</html>
