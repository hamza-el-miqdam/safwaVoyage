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



if($name_paly_list!=""&&$desc_play_list!=""&&$idsmedia!=""&&$ids!="") {
    
switch ($ch) {
    case 0:
        $playlist = new Play_list(addslashes($name_paly_list), addslashes($desc_play_list), $idsmedia,'','',$ids);
    case 1:
        $playlist = new Play_list(addslashes($name_paly_list), addslashes($desc_play_list), $idsmedia,$ids,'','');
    case 2:
        $playlist = new Play_list(addslashes($name_paly_list), addslashes($desc_play_list), $idsmedia,'',$ids,'');
}

    $resultat = $playlist->savePlay_list();


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