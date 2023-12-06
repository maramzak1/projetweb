<?php
require 'C:/xampp/htdocs/ProjetWeb2A/config.php';
class reponseC
{

    function listReponses()
    {
      $sql = "SELECT * FROM reponse ORDER BY idReclamation ASC";
      $db = config::getConnexion();
      try {
          $liste = $db->query($sql);
          return $liste;
      } catch (Exception $e) {
          die('Error:' . $e->getMessage());
      }
    }
    function deleteReponse($ide)
    {
        $sql = "DELETE FROM reponse WHERE idReponse = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponse (idReponse,reponse,idReclamation) 
        VALUES (NULL, :reponse,:idReclamation) ";;
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'reponse' => $reponse->getReponse(),
               
                'idReclamation' => $reponse->getReclamation(),
              
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
        function showReponse($id)
        {
            $sql = "SELECT * from reponse where idReponse = $id";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
                $reclamation = $query->fetch();
                return $reclamation;
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
        public function updateReponse(reponse $reponse, int $idReponse) {
            // Connexion à la base de données
          $db = config::getConnexion();
            $sql = "UPDATE reponse SET
                reponse = :reponse,
                dateReponse = current_timestamp(),
                idReclamation= :idReclamation
                WHERE idReponse = :idReponse";
        
            $stmt =$db->prepare($sql);
      
            $stmt->bindParam(':idReponse', $idReponse);
            $stmt->bindParam(':reponse', $reponse->getReponse());
            $stmt->bindParam(':idReclamation', $reponse->getReclamation());
            $stmt->execute();
        }
      
        
}