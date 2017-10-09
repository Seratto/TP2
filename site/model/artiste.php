<?php
	require_once("album.php");
	require_once("monPdo.php");
	class Artiste
	{
		/* ATTRIBUTS */
		private $id;
		private $nom;
		private $albums = [];
		/* ATTRIBUTS STATICS */
		private static $nbArtisteCree;
		/* ATTRIBUTS UTILES */
		private $nbAlbum;
		
		 //CONSTRUCTEURS 
		public function __construct($nom = null) 
		{
			if(!isset(Artiste::$_nbArtisteCree))
				$_nbArtisteCree = 0;
			if($nom != null)
				$this->nom = $nom; 
			$this->nbAlbum = 0; 
			$this->id = $_nbArtisteCree;
			$_nbArtisteCree ++;			
		}
		public function Artiste() {}

		/* GETTERS/SETTERS */
		public function getId() 	{return $this->id;}
		public function getNom() 	{return $this->nom;}	
		public function getNbAlbum(){return $this->nbAlbum;}
		public function setId($id) 			{$this->id = $id;}
		public function setNom($nom) 		{$this->nom = $nom;}
		public function setNbAlbum($nbAlbum){$this->nbAlbum = $nbAlbum;}
		
		/* METHODES */
		public function addAlbum($album) 
		{
			$this->nbAlbum = (!isset($this->nbAlbum))? 0 : $this->nbAlbum; 
			$this->albums[$this->getNbAlbum()] = $album; 
			$this->nbAlbum ++;
		}
		public function __toString(){return ("</br> id : ".$this->getId()." - nom : ".$this->getNom());} 
		public function afficherAlbums() 
		{
			$fin = ""; 
			for ($i = 0; $i < $this->getNbAlbum(); $i++) 
				$fin = $fin.$this->albums[$i]."</br>"; 
			return $fin;
		}
		
		/* METHODES STATIQUES */
		public static function getAll()
		{
			MonPdo::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = MonPdo::getInstance()->prepare("SELECT * FROM ARTIST");
			$req->execute();
			return $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Artiste");
		}
		public static function ajouterArtist($nom)
		{
			$artiste = new Artiste($nom);
			$req = MonPdo::getInstance()->prepare("INSERT INTO ARTIST (id, nom) VALUES (:id, :nom)");
			$req->bindParam(':id', $artiste->getId());
			$req->bindParam(':nom', $nom);
			$req->execute();			
		}
		public static function supprimerArtist($id)
		{
			$req = MonPdo::getInstance()->prepare("DELETE FROM ARTIST WHERE id = :id");
			$req->bindParam(':id', $id);
			$req->execute();
		}
		public static function getById($id)
		{
			$req = MonPdo::getInstance()->prepare("SELECT * FROM ARTIST WHERE id = :id");
			$req->bindParam(':id', $id);
			$req->execute();
			$artistes = $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Artiste");
			return $artistes[array_shift(array_keys($artistes))]; //premiere case du tableau
		}
	}
?>