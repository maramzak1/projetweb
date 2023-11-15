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
}
function addconcert($concert)
    {
        $sql = "INSERT INTO concert VALUES (NULL, :date,:lieu, :etat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $concert->getDate(),
                'lieu' => $concert->getLieu(),
                'etat' => $concert->getEtat(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

?>
