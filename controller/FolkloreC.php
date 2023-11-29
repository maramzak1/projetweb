<?php

require '../../config.php';

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
        VALUES (NULL, :nom,:histoire,:chanson,:region,:banner)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $folklore->getNom(),
                'histoire' => $folklore->getHistoire(),
                'chanson' => $folklore->getChanson(),
                'region' => $folklore->getRegion(),
                'banner' => $folklore->getBanner(),
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
                    banner = :banner
                    
                WHERE id_folklore= :id_folklore'
            );

            $query->execute([
                'id_folklore' => $id,
                'nom' => $folklore->getNom(),
                'histoire' => $folklore->getHistoire(),
                'chanson' => $folklore->getChanson(),
                'region' => $folklore->getRegion(),
                'banner' => $folklore->getBanner()

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





}



