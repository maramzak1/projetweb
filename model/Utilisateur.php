<?php
class Utilisateur
{
    private ?int $idUtilisateur = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $tel = null;
    private ?string $password_ = null;
    private $configuration=null;
    private $etat=null;

    public function __construct($id = null, $n, $p, $a, $d,$pm)
    {
        

        // Affectation des valeurs après validation

        $this->idUtilisateur = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->tel = $d;
        $this->password_ = $pm;
    }


    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPassword()
    {
        return $this->password_;
    }


    public function setPassword($pm)
    {
        $this->password_ = $pm;

        return $this;
    }


    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

   
} 