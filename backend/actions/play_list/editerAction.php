<?php
require_once '../../module/connection.php';
require_once '../../module/model/Play_list/Play_list.php';

$ch=(isset($_POST{'selectplsylist'}))?$_POST{"selectplsylist"}:"";    // echo the choice
switch ($ch){
    case 0:
        $ids=(isset($_POST{"id_voy"}))?$_POST{"id_voy"}:"";
    case 1:
        $ids=(isset($_POST{"id_dest"}))?$_POST{"id_dest"}:"";
    case 2:
        $ids=(isset($_POST{"id_cat_voy"}))?$_POST{"id_cat_voy"}:"";
    default:
        $ids="";
}

$name_paly_list=(isset($_POST{"name_paly_list"}))?$_POST{"name_paly_list"}:"";
$desc_play_list=(isset($_POST{"desc_play_list"}))?$_POST{"desc_play_list"}:"";


$amedia = $_POST['media'];
$idsmedia= "";
if(!empty($amedia))
{
    $N = count($amedia);
    for($i=0; $i < $N; $i++)
    {
        $idsmedia = $idsmedia.$amedia[$i] . " ";
    }
}
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";



if($id!=""&&$name_paly_list!=""&&$desc_play_list!=""&&$idsmedia!=""&&$ids!="") {
    $playlist = new Play_list();
    switch ($ch) {
        case 0:
            $resultat = $playlist->updatePlay_list($id,addslashes($name_paly_list), addslashes($desc_play_list), $idsmedia,'','',$ids);
        case 1:
            $resultat = $playlist->updatePlay_list($id,addslashes($name_paly_list), addslashes($desc_play_list), $idsmedia,$ids,'','');
        case 2:
            $resultat = $playlist->updatePlay_list($id,addslashes($name_paly_list), addslashes($desc_play_list), $idsmedia,'',$ids,'');
        default:
            $resultat= false;
    }


    if ($resultat) {
        echo("Enregistrement reussie");
        header('Refresh: 2; URL = editer.inc');
    } else {
        echo("Echec d'enregistrement");
    }
    header("Refresh: 2;Location: ../../views/dest/editer.inc");
}else{
    echo("vous n'avez pas le droit d'accés à cette page");
}?>