<?php
class Chanson
{
    private ?int $id_chanson = null;
    private ?string $lien = null;
    private $utilisateur;

    public function __construct($id = null, $lien, $utilisateur)
    {
        $this->id_chanson = $id;
        $this->lien = $lien;
        $this->utilisateur = $utilisateur;
    }

    public function getIdChanson()
    {
        return $this->id_chanson;
    }
    public function getLien()
    {
        return $this->lien;
    }


    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    public function getUtilisateur()
    {
        return $this->utilisateur;
    }


    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
