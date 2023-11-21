<?php

require '../../config.php';

class Regionc
{

    public function listRegion()   //selectioner les donnes de la base du tableau region, recuperer ces donnes et les renvoyer la ou il le faut 
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

    function deleteRegion($ide)    //suprrimer la ligne du tab regions de la base ou l id est :id ce qui va venir avce les requetes sql
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
        VALUES (NULL, :nom,:description,:image)";
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

    function showRegion($id)       //list region recuperi donne taa tableau kemel or quue  showregion taa une ligne selon el id       
    {
        $sql = "SELECT * from regions where id_region = $id";  //selectina el ligne a  afficher
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $region = $query->fetch();  //region la c pas la classe mais une variable qui contient les donnees eloi jbdnehom
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

                    
                WHERE id_region= :id_region'
            );
            
            $query->execute([
                'id_region' => $id,
                'nom' => $region->getNom(),
                'description' => $region->getDescription(),
                'image' => $region->getImage()
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
