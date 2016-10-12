<?php
/**
 * Created by PhpStorm.
 * User: ASUS ROG
 * Date: 10/12/2016
 * Time: 12:37 PM
 */

require_once '../backend/module/connection.php';
require_once '../backend/module/model/Media/Media.php';
require_once '../backend/module/model/Cat_Voyage/Cat_Voyage.php';
//require_once 'backend/module/model/Type_Reservation';

//$id = (isset($_GET["id"])) ? $_GET["id"] : "";


$media =new Media();
$cat =new Cat_Voyage();

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

//                                if($dataCat["id_cat_voy"] == $id)
//                                {
//                                    echo("class=\"active\" ");
//                                }

                                echo ("><a href=\"Voyage_view.php?id=".$dataCat["id_cat_voy"]."\" >");
                                echo($dataCat["nom_cat_voy"]);
                                echo("</a></li>");}
                            ?>

                            <li class="active"><a href="#" >Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="separateur"></div>
        <div class="container-fluid">
            <div class="col-md-10" >

        <h3>Les champs avec un * sont obligatoires.</h3>
                <div id="form" class=" container">
                    <form enctype="multipart/form-data" name="contactForm" action="../backend/actions/Contact/ajouterAction.php" method="post">
                        <div class="well row">
                            <table class="table table-hover">
                                <tr id="nom_contact" class="info">
                                    <td>
                                        <h3>Votre Nom *</h3>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="nom_contact"/>
                                    </td>
                                </tr>
                                <tr id="prenom_contact" class="info">
                                    <td>
                                        <h3>Votre Prenom</h3>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="prenom_contact"/>
                                    </td>
                                </tr>
                               <tr id="tel_contact" class="info">
                                    <td>
                                        <h3>Votre Telephone</h3>
                                    </td>
                                   <td>
                                       <input type="text" name="tel_contact" class="form-control">
                                   </td>
                               </tr>
                                <tr id="email_contact" class="info">
                                    <td>
                                        <h3>Votre E-mail</h3>
                                    </td>
                                    <td>
                                        <input type="text" name="email_contact" class="form-control">
                                    </td>
                                </tr>
                                <tr id="desc_contact" class="info">
                                    <td>
                                        <h3>Votre Message *</h3>
                                    </td>

                                    <td>
                                        <textarea class="form-control" name="desc_contact" rows="10"></textarea>
                                    </td>
                                </tr>


                                <tr class="info">
                                    <td colspan=2 align="center">
                                        <input  class="btn btn-success" type="button"  value="Reserver" onclick="valider(contactForm,'ajouterContact')" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>












<!--            </div>-->
<!--            <div class="col-md-2">-->
<!--                <div class="well">-->
<!--                    <p>Some text..</p>-->
<!--                </div>-->
<!--                <div class="well">-->
<!--                    <p>Some text..</p>-->
<!--                </div>-->
<!--            </div>-->
        </div><br>


    </div>
</div>


</body>
</html>
