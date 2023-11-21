<?php

require '../config.php';

class  UtilisateurC
{

    public function listUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

  


    function deleteUtilisateur($idUtilisateur)
    {
        $sql = "DELETE FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idUtilisateur', $idUtilisateur);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

/*
    function addUtilisateur($utilisateur)
    {
        $sql = "INSERT INTO utilisateur  VALUES (NULL, :nom, :prenom, :email, :tel ,:password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'email' => $utilisateur->getEmail(),
                'tel' => $utilisateur->getTel(),
                'password' => $utilisateur->getPassword(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }*/
    function addUtilisateur($utilisateur)
{
    $sql = "INSERT INTO utilisateur (nom, prenom, email, tel, password) VALUES (:nom, :prenom, :email, :tel, :password)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getEmail(),
            'tel' => $utilisateur->getTel(),
            'password' => $utilisateur->getPassword(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    


    function showUtilisateur($idUtilisateur)
    {
        $sql = "SELECT * from utilisateur where idUtilisateur = $idUtilisateur";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $utilisateur= $query->fetch();
            return $utilisateur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateutilisateur($utilisateur, $idUtilisateur)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    tel = :tel,
                    password =:password
                   
                WHERE idUtilisateur= :idUtilisateur'
            );
            
            $query->execute([
                'idUtilisateur' => $idUtilisateur,
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'email' => $utilisateur->getEmail(),
                'tel' => $utilisateur->getTel(),
                'password'=> $utilisateur->getPassword(),

            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
