<?php
	require_once("model/monPdo.php");
	require_once("model/artiste.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title> Discographie </title>
	</head>
	<body>
		<div class='conteneur' id='debut'>
			<?php
				// CONFIRMATION D'ACTIONS
				if(isset($_GET['action']))
					switch($_GET['action'])
					{
						case "ajoutAlb":
							echo "L'ajout de l'album à été réalisé avec succes  </br>";
							break;
						case "ajoutArt":
							echo "L'ajout de l'artiste à été réalisé avec succes  </br>";
							break;
						case "suppArt":
							echo "La suppression de l'artiste à été réalisé avec succes  </br>";
							break;
						case "suppAlb":
							echo "La suppression de l'album à été réalisé avec succes  </br>";
							break;
						case "errAlbum":
							echo "ERREUR ALBUM";
							break;
					}
				else
					echo "<b><u>TP 2 : Discographie</b></u>";
			?>
			<div class='droite' id='liens'>
				<?php
					// LIENS VERS LES PAGES
					if(!isset($_GET['page']) || $_GET['page'] != "artistes")
						echo "<a href='index.php?page=artistes'>Accéder aux artistes</a>";
					echo "</br>";
					if(!isset($_GET['page']) || $_GET['page'] != "albums")
						echo "<a href='index.php?page=albums'>Accéder aux albums</a>";
				?>
			</div>
		</div>
		<div class='conteneur'>
			<?php
				// AFFICHAGE DES INFORMATIONS
				if(isset($_GET['page']))
					switch($_GET['page'])
					{
					case "artistes":
						include("vue/listeArtistes.php");
						break;
					case "albums":
						include("vue/listeAlbums.php");
						break;
					case "albumsArt":
						if(isset($_GET['idArt'])) 
							include("vue/listeAlbumsArt.php");
						else 
							echo "tentative eronée pour afficher les albums d'un artiste";
						break;
					}
			?>
		</div>
	</body>
</html>




<?php
/*try
				{
					//affichage de tout les artistes
					//*************************************************
					/*MonPdo::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$req = MonPdo::getInstance()->prepare("SELECT * FROM ARTIST");
					$req->execute();
					$artistes = $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Artiste");
					foreach($artistes as $artist)
						echo $artist;*/
						
					//affichage d'un artiste dans une requette parametré
					//*************************************************
					/*$req2 = MonPdo::getInstance()->prepare("SELECT * FROM ARTIST WHERE nom = :nom");
					$nomAChercher = "Cali";
					$req2->bindParam(':nom', $nomAChercher);
					$req2->execute();
					$artistes = $req2->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Artiste");
					foreach($artistes as $artist)
						echo $artist;*/
						
					//ajout d'un artiste dans une requette parametré
					//*************************************************
					/*$req3 = MonPdo::getInstance()->prepare("INSERT INTO ARTIST (id, nom) VALUES (:id, :nom)");
					$id = 74;
					$nomAAjouter = "MINDFIELD";
					$req3->bindParam(':id', $id);
					$req3->bindParam(':nom', $nomAAjouter);
					$req3->execute();*/
					
					//supression d'un artiste dans une requette parametré
					//*************************************************
					/*$req4 = MonPdo::getInstance()->prepare("DELETE FROM ARTIST WHERE id = :id");
					$id = ;
					$req4->bindParam(':id', $id);
					$req4->execute();
				}
				catch(PDOException $e) {echo $e->getMessage();}*/?>