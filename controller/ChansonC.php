<?php

include_once  '../../config.php';

class ChansonC
{

   // Dans votre contrôleur ChansonC

public function listChanson()
{
    $db = config::getConnexion();
    $listeChansons = [];
    
    // À adapter selon votre structure de base de données
    $query = $db->prepare("SELECT chanson.id_chanson, chanson.lien, utilisateur.nom AS utilisateur_nom
                           FROM chanson
                           INNER JOIN utilisateur ON chanson.utilisateur = utilisateur.idUtilisateur");
    
    $query->execute();
    
    while ($row = $query->fetch()) {
        $listeChansons[] = [
            'id_chanson' => $row['id_chanson'],
            'lien' => $row['lien'],
            'utilisateur' => $row['utilisateur_nom'],
        ];
    }

    return $listeChansons;
}


    function deleteChanson($ide)    
    {
        $sql = "DELETE FROM chanson  WHERE id_chanson = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }




    public function addChanson($chanson)
{
    $sql = "INSERT INTO chanson 
            (lien, utilisateur)
            VALUES (:lien, :utilisateur)";

    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'lien' => $chanson->getLien(),
            'utilisateur' => $chanson->getUtilisateur(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    

    function showChanson($id)         
    {
        $sql = "SELECT * from chanson where id_chanson = $id";  
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $chanson = $query->fetch(); 
            return $chanson;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}