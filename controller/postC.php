<?php
require_once '../../config.php';
require_once '../../Model/post.php';  
 
class postC {

    public function listepost()   
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function addPost($post)
    {
        $sql = "INSERT INTO post (content, date, title, image,status) 
                VALUES (:content, :date, :title, :image,:status)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'content' => $post->getContent(),
                'date' => $post->getDate(),
                'title' => $post->getTitle(),
                'image' => $post->getImage(),
                'status' => 1,
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

    function getpostBycommentaire($comment_id)
    {
        $sql = "SELECT * FROM post WHERE commentaire = :comment_id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':comment_id', $comment_id);
            $query->execute();
            $post = $query->fetchAll(PDO::FETCH_ASSOC);
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deletePost($id) {
        try {
            $db = config::getConnexion();
            $sql = "DELETE FROM post WHERE id = :id";
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function updatepost($post, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET 
                    title = :title, 
                    content = :content,
                    date = :date,
                    image = :image
                WHERE id = :id '
            );
    
            $query->execute([
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'date' => $post->getDate(),
                'image' => $post->getImage(),
                'id' => $id,
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    

    function showpost($id)
    {
        $sql = "SELECT * from post where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    public function searchPostsByKeyword($keyword) {
        $sql = "SELECT * FROM post WHERE content LIKE :keyword OR title LIKE :keyword";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':keyword', '%' . $keyword . '%');
            $query->execute();
            $list = $query->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }
    /*function getPaginatedPosts($page = 1, $perPage = 10) {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM post WHERE etat = 1 ORDER BY date DESC LIMIT :offset, :perPage";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            $query->execute();
            $list = $query->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }*/
    function getTotalPosts() {
        $sql = "SELECT COUNT(*) as total FROM post";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        } 
    }
   function sendSMS() {
        $accountSid = 'AC21c8de495139705eeb49cb1e82c3f7ed'; 
        $authToken = 'f0ae7f8098b7b23b468df0cc241f95ab'; 
        $twilioClient = new Twilio\Rest\Client($accountSid, $authToken);

        // Send an SMS
        $twilioClient->messages->create(
            '+21650591799',
            array(
                'from' => '+15623726596',
                'body' => "Un nouvelle post a été ajoutée avec succès."
            )
        );
    }
    /*public function likePost($id) {
        $db = config::getConnexion();
        $sql = "UPDATE post SET likes = likes + 1 WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $success = $query->execute();
    
        return $success; // Indiquez le succès ou l'échec de l'opération
    }
    
    public function dislikePost($id) {
        $db = config::getConnexion();
        $sql = "UPDATE post SET dislikes = dislikes + 1 WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $success = $query->execute();
    
        return $success; // Indiquez le succès ou l'échec de l'opération
    }*/
    function recherchepost($post)
    {
        $sql = "SELECT * FROM post where post.title like '%$id%' or post.content like '%$id%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getAllPosts()
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function recherchePostParTitre($rech)
    {
        $sql = "SELECT * FROM post WHERE title LIKE '%$rech%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getPostsByUserId($userId)
    {
        $query = "SELECT * FROM posts WHERE user_id = :userId";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
     


    
}

?>
 