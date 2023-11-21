<?php
require "../config.php";
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
    $sql = "INSERT INTO concert VALUES (NULL, :date,:lieu, :etat,:image)";
    $db = config::getConnexion();
    try 
    {
        $query = $db->prepare($sql);
        $query->execute([
            'date' => $concert->getDate(),
            'lieu' => $concert->getLieu(),
            'etat' => $concert->getEtat(),
            'image' => $concert->getimage()
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
                    image = :image
                WHERE id_concert= :id_concert'
            );
            
            $query->execute
            ([
                'id_concert' => $id,
                'date' => $concert->getdate(),
                'lieu' => $concert->getlieu(),
                'etat' => $concert->getEtat(),
                'image' => $concert->getimage()
               
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


}


?>