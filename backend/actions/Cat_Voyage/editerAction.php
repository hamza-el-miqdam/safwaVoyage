<?php
require_once '../../module/connection.php';
require_once '../../module/model/Cat_Voyage/Cat_Voyage.php';

$nom=(isset($_POST{"nom_cat_voyage"}))?$_POST{"nom_cat_voyage"}:"";
$desc=(isset($_POST{"description_cat_voyage"}))?$_POST{"description_cat_voyage"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($id!=""&&$nom!=""&&$desc!="") {
    $categorie = new Cat_Voyage();
    $resultat = $categorie->updateCat_Voyage($id,addslashes($nom),addslashes($desc));
    if ($resultat) {
        echo("Enregistrement reussie");
    } else {
        echo("Echec d'enregistrement");
    }
        header("Refresh: 2;Location: ../../views/cat_voyage/editer.inc");

}else{
    echo("vous n'avez pas le droit d'acces a cette page");
}?>