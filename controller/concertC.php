<?php
require_once "../../config.php";
class  concertC
{
    public function listconcert()
    {
        $sql = "SELECT * FROM concert";
        $db = config::getConnexion(); 
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function addconcert($concert)
{
    $sql = "INSERT INTO concert VALUES (NULL, :date,:lieu, :etat,:image,:utilisateur)";
    $db = config::getConnexion();
    try 
    {
        $query = $db->prepare($sql);
        $query->execute([
            'date' => $concert->getDate(),
            'lieu' => $concert->getLieu(),
            'etat' => $concert->getEtat(),
            'image' => $concert->getimage(),
            'utilisateur' => $concert->getUtilisateur()
        ]);
    }
     catch (Exception $e) 
     {
        echo 'Error: ' . $e->getMessage();
     }
}
function deleteconcert($ide)
    {
        $sql = "DELETE FROM concert WHERE id_concert = :id_concert";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_concert', $ide);

        try 
        {
            $req->execute();
        } 
        catch (Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function showconcert($id)
    {
        $sql = "SELECT * from concert where id_concert = $id";
        $db = config::getConnexion();
        try
         {
            $query = $db->prepare($sql);
            $query->execute();
            $concert = $query->fetch();
            return $concert;
        } 
        catch (Exception $e) 
        {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateconcert($concert, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare
            (
                'UPDATE concert SET 
                    date = :date, 
                    lieu = :lieu, 
                    etat = :etat,
                    image = :image,
                    utilisateur=:utilisateur
                WHERE id_concert= :id_concert'
            );
            
            $query->execute
            ([
                'id_concert' => $id,
                'date' => $concert->getdate(),
                'lieu' => $concert->getlieu(),
                'etat' => $concert->getEtat(),
                'image' => $concert->getimage(),
                'utilisateur' => $concert->getUtilisateur()
               
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showticket($id_concert)
    {
        
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("SELECT *FROM concert WHERE concert=: id" );
            $query->execute(['id'=>$id_concert]);
            return $query->fetchALL();
        
        } catch (PDOException $e) {
            echo $e->GetMessage;
        }
    }




function getConcertsByUserId($idUtilisateur)
{
    $sql = "SELECT * FROM concert WHERE utilisateur = :idUtilisateur";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':idUtilisateur', $idUtilisateur);
        $query->execute();

        $concerts = $query->fetchAll(PDO::FETCH_ASSOC);

        return $concerts;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}


}
?>