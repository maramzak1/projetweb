<?php
require_once "../config.php";
class  ticketC
{
    public function listticket()
    {
        $sql = "SELECT * FROM ticket";
        $db = config::getConnexion(); 
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function addticket($ticket)
{
    $sql = "INSERT INTO ticket VALUES (NULL, :date,:prix,:date_limite,:quantite,:heure,:lieu,;concert)";
    $db = config::getConnexion();
    try 
    {
        $query = $db->prepare($sql);
        $query->execute([
            'date' => $ticket->getDate(),
            'prix' => $ticket->getPrix(),
            'date_limite' => $ticket->getDate_limite(),
            'quantite' => $ticket->getQuantite(),
            'heure' => $ticket->getHeure(),
            'lieu' => $ticket->getLieu(),
            'concert' => $ticket->getconcert()
           
            
            
            
            
        ]);
    }
     catch (Exception $e) 
     {
        echo 'Error: ' . $e->getMessage();
     }
}
function deleteticket($ide)
    {
        $sql = "DELETE FROM ticket WHERE id_ticket = :id_ticket";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_ticket', $ide);

        try 
        {
            $req->execute();
        } 
        catch (Exception $e)
        {
            die('Error:' . $e->getMessage());
        }
    }
    function showticket($id)
    {
        $sql = "SELECT * from ticket where id_ticket = $id";
        $db = config::getConnexion();
        try
         {
            $query = $db->prepare($sql);
            $query->execute();
            $ticket = $query->fetch();
            return $ticket;
        } 
        catch (Exception $e) 
        {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateticket($ticket, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare
            (
                'UPDATE ticket SET 
                    date = :date, 
                    prix = :prix,
                    date_limite= :date_limite,
                    quantite=:quantite,
                    heure= :heure,
                    lieu = :lieu,
                    concert = :concert

                WHERE id_ticket= :id_ticket'
            );
            
            $query->execute
            ([
                'id_ticket' => $id,
                'date' => $ticket->getDate(),
                'prix' => $ticket->getPrix(),
                'date_limite' => $ticket->getDate_limite(),
                'quantite' => $ticket->getQuantite(),
                'heure' => $ticket->getHeure(),
                'lieu' => $ticket->getLieu(),
                'concert' => $ticket->getconcert()
                
               
               
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function getticketByconcert($id_concert)
    {
        $sql = "SELECT * FROM ticket WHERE concert = :id_concert";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_concert', $id_concert);
            $query->execute();
            $ticket = $query->fetchAll(PDO::FETCH_ASSOC);
            return $ticket;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }





}


?>