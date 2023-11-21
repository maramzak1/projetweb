<?php
// Utilisateur.php

class Utilisateur {
    private ?int $idUtilisateur = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $tel = null;

    public function __construct($id = null, $n, $p, $a, $d) {
        $this->idUtilisateur = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->tel = $d;
    }

    // Getters et Setters ici
}
?>
