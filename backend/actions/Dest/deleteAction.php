<?php
require_once '../../module/connection.php';
require_once '../../module/model/Dest/Dest.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Dest();
		$resultat = $model->deleteDest($id);
		if($resultat){
			echo("Suppression reussie");
		}else{
			echo("Echec de suppression");
		}
    	header("Refresh: 2;Location: ../../views/dest/editer.inc");
		
	}else{
		echo("Vous n'avez pas le droit d'acces a cette page !!");
		
	}
?>