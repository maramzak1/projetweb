<?php 
require "../config1.php";
 
class  postcontroller
{


public function listpost()

    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();// data base
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
}
    ?> 