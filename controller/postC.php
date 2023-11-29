<?php
include "../config.php";
require_once '../model/post.php';  

class postC {
    
    function addPost($post) {
        $sql = "INSERT INTO post (content, date, title, image, status) 
                VALUES (:content, :date, :title, :image, :status)";
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
    
    function getPostList() {
        $sql = "SELECT * FROM post WHERE status = 1 ORDER BY date DESC LIMIT 100 ";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function getPostById($id) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('SELECT * FROM post WHERE id = :id');
            $query->execute(['id' => $id]);
            $post = $query->fetch(PDO::FETCH_ASSOC);

            return $post;
        } catch (PDOException $e) {
            // Handle the exception (e.g., log or display an error message)
            echo "Error: " . $e->getMessage();
            return null;
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
               ' UPDATE post SET 
                   content = :content,
                   title = :title,
                   date= :date
                  
                WHERE id= :id'  
            );
            
            $query->execute([
                'id' => $id,
                'content' => $post->getcontent(),
                'author' => $post->gettitle(),   
                'date' => $post->getdate(),
               
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
   /* function getLatestPosts($limit = 5) {
        $sql = "SELECT * FROM post WHERE etat = 1 ORDER BY date DESC LIMIT :limit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':limit', $limit, PDO::PARAM_INT);
            $query->execute();
            $list = $query->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }*/

   /* function searchPostsByKeyword($keyword) {
        $sql = "SELECT * FROM post WHERE etat = 1 AND (content LIKE :keyword OR title LIKE :keyword)";
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
    }*/

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
}

?>
