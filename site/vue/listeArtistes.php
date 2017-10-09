<div class='center'>
	<form method="post" action="./controleur/modifArtiste.php">
		<label for="nom">Saisir le nom d'un artiste à ajouter : </label>
		<input type="text" name="nom" id="nom" /> 
		<input type="submit" value="Ajouter l'artiste" />
	</form>
</div>
<?php
	require_once("model/monPdo.php");
	require_once("model/artiste.php");
	
	MonPdo::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$req = MonPdo::getInstance()->prepare("SELECT * FROM ARTIST");
	$req->execute();
	$artistes = $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Artiste");
	foreach($artistes as $artist)
		echo $artist."\t <a href='controleur/modifArtiste.php?id=".$artist->getId()."' class='droite'>Supprimer</a>\t <a href='index.php?page=albumsArt&idArt=".$artist->getId()."' class='droite'>Voir les albums</a>";
?>