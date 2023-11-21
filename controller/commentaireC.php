<?php

require '../config.php';

class commentaireC
{

    public function listecommentaire()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecommentaire($ide)
{
    $sql = "DELETE FROM commentaire WHERE comment_id = :comment_id"; // Modifier 'id' en 'comment_id'
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':comment_id', $ide); // Modifier ':id' en ':comment_id'

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}



    function addcommentaire($commentaire)
    {
        $sql = "INSERT INTO commentaire  
        VALUES (NULL,:comment_text,:author, :created_at)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'comment_text' => $commentaire->getcomment_text(),
                'author' => $commentaire->getauthor(),
                'created_at' => $commentaire->getcreated_at()
                 
                 
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showcommentaire($id)
    {
        $sql = "SELECT * from commentaire where comment_id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecommentaire($commentaire, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
               ' UPDATE commentaire SET 
                   comment_text = :comment_text,
                   author = :author,
                   created_at = :created_at
                  
                WHERE comment_id = :comment_id' // Correction ici, pas de virgule avant WHERE
            );
            
            $query->execute([
                'comment_id' => $id,
                'comment_text' => $commentaire->getcomment_text(),
                'author' => $commentaire->getauthor(),  // Correction ici, pas d'espace avant 'author'
                'created_at' => $commentaire->getcreated_at(),
               
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();  // Correction ici, afficher l'erreur
        }
    }
    
    
}
