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
      $sql = "DELETE FROM reclamation WHERE id = :id";
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
        function résoudreReclamation(int $id, string $statut)
        {
            $pdo = config::getConnexion();
        
            $requete = $pdo->prepare("UPDATE reclamations SET statut = :statut WHERE id = :id");
            $requete->execute([
                "id" => $id,
                "statut" => $statut
            ]);
        }
}