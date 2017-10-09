<?php
	//require_once("../model/artiste.php");
?>

<!-- FORMULAIRE -->
<div class='center'>
	<form method="post" action="controleur/modifAlbum.php">
		<!-- TITRE -->
		<label for="titre">Titre   : </label>
		<input type="text" name="titre" id="titre" class='reduire'/> </br>
		<!-- ANNEE -->
		<label for="annee">Annee : </label>
		<input type="number" name="annee" id="annee" min="1800" max="2020" step="1" class='reduire'> </br>
		<!-- GENRE -->
		<label for="genre">Genre  : </label>
		<input type="text" name="genre" id="genre" class='reduire'/> </br>
		<!-- ARTISTE -->
		<label for="artist">Artiste : </label>
		<select name="artist" id="artist" class='reduire'>
			<?php
				$lesartiste = Artiste::getAll();
				var_dump($lesartiste);
				foreach($lesartiste as $artiste)
				{
					echo "<option value='".$artiste->getId()."'>".$artiste->getNom()."</option>";
				}
			?>
		</select> </br>
		<input type="submit" value="Ajouter l'album" />
	</form>
</div>
<?php
	//require_once("../model/monPdo.php"); 
	
	MonPdo::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$req = MonPdo::getInstance()->prepare("SELECT * FROM ALBUM");
	$req->execute();
	$albums = $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"ALBUM");
	foreach($albums as $album)
		echo $album."\t <a href='controleur/modifAlbum.php?id=".$album->getId()."' class='droite'>Supprimer</a> </br>";
?>