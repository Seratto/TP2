<?php
	class Genre
	{
		/* ATTRIBUTS */
		private $_id;
		private $_nom;
		
		/* ATTRIBUTS STATICS */
		private static $_nbGenreCree;
		
		/* CONSTRUCTEURS */
		public function __construct($id, $nom = "undefined") 
		{
			$this->_id = $id;
			$this->_nom = $nom; 
		}
		
		/* GETTERS/SETTERS */
		public function getId() 	{return $this->_id;}
		public function getNom() 	{return $this->_nom;}		
		public function setId($id) 		{$this->_id = $id;}
		public function setNom($nom) 	{$this->_nom = $nom;}
		
		/* METHODES */
		public function __toString(){return ("genre : ".$this->getNom());} 
	}
?> 