<?php
	require_once("genre.php");
	require_once("monPdo.php");
	class Album
	{
		/* ATTRIBUTS */
		private $id;
		private $nom;
		private $annee;
		private $genre;
		private $alb_art;
		/* ATTRIBUTS STATICS */
		private static $nbAlbumCree;
		
		/* CONSTRUCTEURS */
		public function __construct($nom = null, $annee = null, $genre = null, $artiste = null) 
		{
			if(!isset(Album::$nbAlbumCree))
				$nbAlbumCree = 0;
			$this->id = $nbAlbumCree;
			if($nom != null)
				$this->nom = $nom; 
			if($annee != null)
				$this->annee = $annee; 
			if($genre != null)
				$this->genre = $genre;
			if($artiste != null)
				$this->alb_art = $artiste;
			$nbAlbumCree ++;
		}
		
		/* GETTERS/SETTERS */
		public function getId() 	{return $this->id;}
		public function getNom() 	{return $this->nom;}
		public function getAnnee() 	{return $this->annee;}
		public function getGenre() 	{return $this->genre;}	
		public function getArtiste(){return $this->alb_art;}		
		public function setId($id) 		{$this->id = $id;}
		public function setNom($nom) 	{$this->nom = $nom;}
		public function setAnnee($annee){$this->annee = $annee;}
		public function setGenre($genre){$this->genre = $genre;}
		public function setArtiste($id) {$this->atriste = $alb_art;}
		
		/* METHODES */
		public function __toString(){return ("Album : ".$this->getId()." - nom : ".$this->getNom()." - genre :".$this->getGenre()." - Année : ".$this->getAnnee());} 
	
		/* METHODES STATIQUES */
		public static function ajouterAlbum($nom, $annee, $genre, $artiste)
		{
			$album = new Album($nom, $annee, $genre, $artiste);
			$req = MonPdo::getInstance()->prepare("INSERT INTO ALBUM (id, nom, annee, genre, alb_art) VALUES (:id, :nom, :annee, :genre, :artiste)");
			$req->bindParam(':id', $album->getId());
			$req->bindParam(':nom', $nom);
			$req->bindParam(':annee', $annee);
			$req->bindParam(':genre', $genre);
			$req->bindParam(':artiste', $artiste);
			$req->execute();			
		}
		public static function supprimerAlbum($id)
		{
			$req = MonPdo::getInstance()->prepare("DELETE FROM ALBUM WHERE id = :id");
			$req->bindParam(':id', $id);
			$req->execute();
		}
	}
?> 