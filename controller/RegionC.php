<?php

require '../../config.php';

class Regionc
{
    public function listRegion()
    {
        $sql = "SELECT * FROM regions";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteRegion($ide)
    {
        $sql = "DELETE FROM regions  WHERE id_region = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addRegion($region)
    {
        $sql = "INSERT INTO regions  
                VALUES (NULL, :nom, :description, :image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $region->getNom(),
                'description' => $region->getDescription(),
                'image' => $region->getImage(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showRegion($id)
    {
        $sql = "SELECT * FROM regions WHERE id_region = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $region = $query->fetch();
            return $region;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateRegion($region, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE regions SET 
                    nom = :nom, 
                    description = :description,
                    image = :image
                WHERE id_region = :id_region'
            );

            $query->execute([
                'id_region' => $id,
                'nom' => $region->getNom(),
                'description' => $region->getDescription(),
                'image' => $region->getImage(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
