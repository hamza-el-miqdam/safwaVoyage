<?php
require_once '../../module/connection.php';
require_once '../../module/model/Media/Media.php';

$media =new Media();

$listMedia = $media->getMedia();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../admin/css/style.css" rel="stylesheet" type="text/css" >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
<div class="container">
    <div class="well row">
<a href="../../views/play_list/editer.php">
    <div class="btn btn-primary">Editer les Play Liste</div></a>
    <a href="../../views/play_list/index.php">
    <div class="btn btn-primary">Actualiser la page</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class=" container">
    <form enctype="multipart/form-data" name="play_listForm" action="../../actions/Dest/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr class="danger">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="nom_play_list" class="info">
                <td>
                    <label>nom</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="name_paly_list"/>
                </td>
            </tr>
            <tr id="description_play_list" class="info">
                <td>
                    <label>Description</label>
                </td>
                
                <td>
                    <textarea class="form-control" name="desc_play_list"></textarea>
                </td>
            </tr>
            <tr id="choice_play_list" class="info">
            <td>
                <label>play list de :</label>
            </td>
            <td>
                <select name="choix">
                                <option value="0"  selected="selected" >Voyage </option>
                                <option value="1">Destination </option>
                                <option value="2">Categorie Voyage </option>

<p ></p>
                </select>
            </td>
            </tr>
            <tr id="idmedia" class="info">
            <td>
                <label>Media</label>
            </td>
            <td>

                    <?php
                    while($dataMedia=$listMedia->fetch()){
                        echo("<input type='checkbox' value='".$dataMedia["id_media"]."'>");
                        echo($dataMedia["nom_media"]);
                        echo("<br>");
                    }
                    ?>
<!--                   <input type="checkbox" name="vehicle1" value="Bike"> I have a bike<br>
                        <input type="checkbox" name="vehicle2" value="Car"> I have a car -->
            </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer play list" onclick="valider(play_listForm,'ajouterplay_list')" />
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>
