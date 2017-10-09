<?php
	if(isset($_GET['idArt']))
	{
		echo "L'artiste sélectionné à créer les albums suivants : </br>";
		$req = MonPdo::getInstance()->prepare("SELECT * FROM ALBUM WHERE alb_art = :id");
		$req->bindParam(':id', $_GET['idArt']);
		$req->execute();
		$albums = $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"ALBUM");
		foreach($albums as $album)
			echo $album."</br>";
	}
?>

