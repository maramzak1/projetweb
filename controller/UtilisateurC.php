<?php

require_once '../../config.php';
class  UtilisateurC
{

    public function listUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

  


    function deleteUtilisateur($idUtilisateur)
    {
        $sql = "DELETE FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idUtilisateur', $idUtilisateur);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function addUtilisateur($utilisateur)
{
    $sql = "INSERT INTO utilisateur (nom, prenom, email, tel, password_) VALUES (:nom, :prenom, :email, :tel, :password_)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getEmail(),
            'tel' => $utilisateur->getTel(),
            'password_' => $utilisateur->getPassword(),
            
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
    function showUtilisateur($idUtilisateur)
    {
        $sql = "SELECT * from utilisateur where idUtilisateur = $idUtilisateur";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $utilisateur= $query->fetch();
            return $utilisateur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




    ////////////////////////////////////////////////////////////////////////////////
//update d'un compte utilisateur
    function updateUtilisateur2($utilisateur, $email)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                nom = :nom, 
                prenom = :prenom, 
                email = :email, 
                tel = :tel,
                password_ = :password_
            WHERE email = :email'
        );
        
        $query->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getEmail(),
            'tel' => $utilisateur->getTel(),
            'password_' => $utilisateur->getPassword(), // Ajoutez cette ligne pour définir la valeur de :password_
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

////////////////////////prendre id a partir du mail de la session//////////////////////////////////////////////
function id_de_email($email)
{
  $sql = "SELECT idUtilisateur FROM utilisateur WHERE email = :email";

  $db = config::getConnexion();
  try {
    $query = $db->prepare($sql);
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetch();

    if ($result) {
      return $result['idUtilisateur'];
    } else {
      return null;
    }
  } catch (Exception $e) {
    die('Error: ' . $e->getMessage());
  }
}
/////////////////////////////////////////////////////////////////
public function getConfigurationUtilisateur($email) {
    $sql = "SELECT configuration FROM utilisateur WHERE email = :email";
    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetch();
        
        // Vérifiez si la requête a renvoyé un résultat
        if ($result) {
            return $result['configuration'];
        } else {
            // L'utilisateur n'a pas été trouvé, gérer l'erreur en conséquence
            return null;
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
///////////////////////////////////////////////////////////
public function getUtilisateurParID($idUtilisateur) {
    $sql = "SELECT * FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
///////////////////////////////////////////////////////////////////////////////
public function getEtatUtilisateur($email) {
    $sql = "SELECT etat FROM utilisateur WHERE email = :email";
    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetch();
        
        // Vérifiez si la requête a renvoyé un résultat
        if ($result) {
            return $result['etat'];
        } else {
            // L'utilisateur n'a pas été trouvé, gérer l'erreur en conséquence
            return null;
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


   ///////////////////////////////////////////////////////////////back office 
   /*
    function updateutilisateur($idUtilisateur, $configuration)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    configuration = :configuration
                WHERE idUtilisateur = :idUtilisateur'
            );
            
            $query->execute([
                'email' => $utilisateur, // Use the correct variable here
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'tel' => $utilisateur->getTel(),
                'password'=> $utilisateur->getPassword(),
            ]);
            
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }*/
    function updateutilisateur($idUtilisateur, $configuration)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                configuration = :configuration
            WHERE idUtilisateur = :idUtilisateur'
        );
        
        $query->execute([
            'configuration' => $configuration, // Utilisez le bon nom de champ
            'idUtilisateur' => $idUtilisateur,
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


///////////////////////////////////////////////////////////////////////////////////////
    //Login
    function connexionUser($email,$password_){
        $sql="SELECT * FROM utilisateur WHERE email='" . $email . "' and password_= '". $password_."'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) {
                $message = "pseudo ou le mot de passe est incorrect";
            } else {
                $x=$query->fetch();
                $message = $x['configuration'];
            }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }
      return $message;
    }
///////////////////////////////////////////////////////////////////////////////
public function DesactiverUtilisateur($idUtilisateur) {
    // Vérifier si l'idUtilisateur est valide (non vide, numérique, etc.)
    if (!empty($idUtilisateur) && is_numeric($idUtilisateur)) {
        // Inclure le fichier de configuration de la base de données et créer une instance de la connexion
        include_once "../../../config.php";
        $db = config::getConnexion();

        // Préparer la requête pour mettre à jour le champ etat
        $query = $db->prepare("UPDATE utilisateur SET etat = 1 WHERE idUtilisateur = :idUtilisateur");
        $query->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);

        // Exécuter la requête
        $query->execute();
    }
}

//////////////////////////////////////////////////////////////////////////////////

    public function activerUtilisateur($idUtilisateur,$etat)
    {
        // Vérifier si l'idUtilisateur est valide (non nul, etc.)
        if (!empty($idUtilisateur) && is_numeric($idUtilisateur)) {
            // Inclure le fichier de configuration de la base de données et créer une instance de la connexion
            include_once "../../../config.php";
            $db = config::getConnexion();

            // Préparer la requête pour mettre à jour le champ etat_activation
            $query = $db->prepare("UPDATE utilisateur SET etat_activation = 0 WHERE idUtilisateur = :idUtilisateur");
            $query->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);

            // Exécuter la requête
            $query->execute();
        }
    }
    //////////////////////////////////////////////
    function etatDuCompte($idUtilisateur, $etat)
    {   
        try {
            $db = config::getConnexion();
            
            // Mettre à jour le champ etat
            $query = $db->prepare(
                'UPDATE utilisateur 
                 SET etat = :etat
                 WHERE idUtilisateur = :idUtilisateur'
            );
            
            $query->execute([
                'etat' => $etat,
                'idUtilisateur' => $idUtilisateur,
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

}

    

