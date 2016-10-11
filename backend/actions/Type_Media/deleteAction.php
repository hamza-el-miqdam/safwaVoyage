<?php
require_once '../../module/connection.php';
require_once '../../module/model/Type_Media/Type_Media.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Type_Media();
		$resultat = $model->deleteType_Media($id);
		if($resultat){
			echo("Suppression reussie");
		}else{
			echo("Echec de suppression");
		}
		header("Refresh: 2;Location: ../../views/type_media/editer.inc");
	}else{
		echo("Vous n'avez pas le droit d'acces a cette page !!");
		
	}
?>