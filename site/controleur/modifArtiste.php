<?php
	require_once("../model/artiste.php");
	
	if(isset($_POST['nom']))
	{
		Artiste::ajouterArtist($_POST['nom']);
		header('Location: ../index.php?action=ajoutArt');
		exit();
	}
	if(isset($_GET['id']))
	{
		Artiste::supprimerArtist($_GET['id']);
		header('Location: ../index.php?action=suppArt');
		exit();
	}
?>