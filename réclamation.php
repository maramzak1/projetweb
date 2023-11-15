<?php
class reclamation {
    private ?int $idReclamation=null;
    private ?string $titre=null;
    private ?string $description=null;
    private $dateEnregistrement;
    private ?string $etat=null;
  
    public function __construct($idReclamation=null, $titre, $description, $dateEnregistrement, $etat) {
      $this->idReclamation = $idReclamation;
      $this->titre = $titre;
      $this->description = $description;
      $this->dateEnregistrement = $dateEnregistrement;
      $this->etat = $etat;
    }
  
    public function getIdReclamation() {
      return $this->idReclamation;
    }
  
    /*public function setIdReclamation($idReclamation) {
      $this->idReclamation = $idReclamation;
    }*/
  
    public function getTitre() {
      return $this->titre;
    }
  
    public function setTitre($titre) {
      $this->titre = $titre;
    }
  
    public function getDescription() {
      return $this->description;
    }
  
    public function setDescription($description) {
      $this->description = $description;
    }
  
    public function getDateEnregistrement() {
      return $this->dateEnregistrement;
    }
  
    public function setDateEnregistrement($dateEnregistrement) {
      $this->dateEnregistrement = $dateEnregistrement;
    }
  
    public function getEtat() {
      return $this->etat;
    }
  
    public function setEtat($etat) {
      $this->etat = $etat;
    }
  }