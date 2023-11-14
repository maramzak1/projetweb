<?php 
require "../config.php";
include_once "commentaire.php";
class commentairecontroller
{


public function listCommentaire()

    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();// data base
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
}
    ?> 