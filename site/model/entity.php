<?php
	abstract class Entity
	{
		/* ATTRIBUTS */
		private $id;
		private $nom;
		
		 //CONSTRUCTEURS 
		public function __construct($id, $nom = null) 
		{
			$this->id = $id;
			if($nom != null)
				$this->nom = $nom; 		
		}

		/* GETTERS/SETTERS */
		public function getId() 	{return $this->id;}
		public function getNom() 	{return $this->nom;}	
		public function setId($id) 	{$this->id = $id;}
		public function setNom($nom){$this->nom = $nom;}
	}
?>