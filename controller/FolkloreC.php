
<?php

include_once  '../../config.php';

class FolkloreC
{

    public function listFolklore()   
    {
        $sql = "SELECT * FROM folklores";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteFolklore($ide)    
    {
        $sql = "DELETE FROM folklores  WHERE id_folklore = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }




    function addFolklore($folklore)
    {
        $sql = "INSERT INTO folklores  
                (nom, histoire, chanson, banner, region, artiste)
                VALUES (:nom, :histoire, :chanson, :banner, :region,:artiste)";
    
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $folklore->getNom(),
                'histoire' => $folklore->getHistoire(),
                'chanson' => $folklore->getChanson(),
                'banner' => $folklore->getBanner(),
                'region' => $folklore->getRegion(),
                'artiste' => $folklore->getArtiste(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function showFolklore($id)         
    {
        $sql = "SELECT * from folklores where id_folklore = $id";  
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $folklore = $query->fetch(); 
            return $folklore;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateFolklore($folklore, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE folklores SET 
                    nom = :nom, 
                    histoire = :histoire,
                    chanson = :chanson,
                    region = :region,
                    banner = :banner,
                    artiste = :artiste
                    
                WHERE id_folklore= :id_folklore'
            );

            $query->execute([
                'id_folklore' => $id,
                'nom' => $folklore->getNom(),
                'histoire' => $folklore->getHistoire(),
                'chanson' => $folklore->getChanson(),
                'region' => $folklore->getRegion(),
                'banner' => $folklore->getBanner(),
                'artiste' => $folklore->getArtiste()

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }





    function getFolkloresByRegion($id_region)
    {
        $sql = "SELECT * FROM folklores WHERE region = :id_region";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_region', $id_region);
            $query->execute();
            $folklores = $query->fetchAll(PDO::FETCH_ASSOC);
            return $folklores;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function submitRating($folklore, $rating)
    {
        $sql = "INSERT INTO ratings (folklore, rating) VALUES (:folklore, :rating)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                ':folklore' => $folklore,
                ':rating' => $rating,
            ]);
        } catch (Exception $e) {
            throw new Exception('Error: ' . $e->getMessage());
        }
       
    }

    public function getFolkloreRating($folkloreId)
    {
        $sql = "SELECT AVG(rating) AS average_rating FROM ratings WHERE folklore = :folkloreId";
        $db = config::getConnexion();
    
        try {
            // Utiliser une sous-requête pour calculer la moyenne en temps réel
            $subquery = "SELECT AVG(rating) FROM ratings WHERE folklore = :folkloreId";
            $query = $db->prepare("SELECT IFNULL(($subquery), 0) AS average_rating");
            $query->execute([':folkloreId' => $folkloreId]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
    
            return $result['average_rating'];
        } catch (Exception $e) {
            throw new Exception('Error: ' . $e->getMessage());
        }
    }
    
}

