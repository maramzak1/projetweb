<?php
// UtilisateurC.php

include '../config.php'; 

class UtilisateurC {
    public function addUtilisateur($utilisateur) {
        $sql = "INSERT INTO utilisateur  
            VALUES (NULL, :nom,:prenom, :email,:tel)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'email' => $utilisateur->getEmail(),
                'tel' => $utilisateur->getTel(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
