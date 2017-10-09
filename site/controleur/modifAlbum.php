<?php
	require_once("../model/album.php");
	
	if(isset($_POST['titre']) && isset($_POST['annee']) && isset($_POST['genre']) && isset($_POST['artist']) )
	{
		Album::ajouterAlbum($_POST['titre'], $_POST['annee'], $_POST['genre'], $_POST['artist']);
		header('Location: ../index.php?action=ajoutAlb');
		exit();
	}
	if(isset($_GET['id']))
	{
		Album::supprimerAlbum($_GET['id']);
		header('Location: ../index.php?action=suppAlb');
		exit();
	}
	header('Location: ../index.php?action=errAlbum');
?>