<?php
require 'C:/xampp/htdocs/ProjetWeb2A/config.php';
class reclamationC
{

    function listReclamations()
    {
      $sql = "SELECT * FROM reclamation";
      $db = config::getConnexion();
      try {
          $liste = $db->query($sql);
          return $liste;
      } catch (Exception $e) {
          die('Error:' . $e->getMessage());
      }
    }
    function deleteReclamation($ide)
    {
        $sql = "DELETE FROM reclamation WHERE idReclamation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addReclamation($titre, $description, $etat)
        {
          // Connexion à la base de données
          $pdo = config::getConnexion();

          // Préparation de la requête
          $sql = "INSERT INTO reclamation (titre, description, etat) VALUES (:titre, :description, :etat)";
          $stmt = $pdo->prepare($sql);

          // Association des valeurs aux paramètres
          $stmt->bindParam(':titre', $titre);
          $stmt->bindParam(':description', $description);
          $stmt->bindParam(':etat', $etat);

          // Exécution de la requête
          $stmt->execute();

          // Récupération de l'identifiant de la réclamation
          $idReclamation = $pdo->lastInsertId();

          return $idReclamation;
        }
        function showReclamation($id)
        {
            $sql = "SELECT * from reclamation where idReclamation = $id";
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
        public function update(reclamation $reclamation, int $idReclamation) {
            // Connexion à la base de données
          $pdo = config::getConnexion();
            $sql = "UPDATE reclamation SET
                titre = :titre,
                description = :description,
                dateEnregistrement = current_timestamp()
                WHERE idReclamation = :idReclamation";
        
            $stmt =$pdo->prepare($sql);
            $stmt->bindParam(':titre', $reclamation->getTitre());
            $stmt->bindParam(':description', $reclamation->getDescription());
            $stmt->bindParam(':idReclamation', $idReclamation);
        
            $stmt->execute();
        }
        public function changerEtat(int $idReclamation,string $etat)
        {
        // Connexion à la base de données
        $pdo = config::getConnexion();
        $sql = "UPDATE reclamation SET
            etat = :etat
            WHERE idReclamation = :idReclamation";
    
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':idReclamation', $idReclamation);
    
        $stmt->execute();
        }
}