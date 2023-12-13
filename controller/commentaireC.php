<?php

require_once '../../config.php';

class CommentaireC
{
    function getcommentaireBypost($id)
    {
        $sql = "SELECT * FROM commentaire WHERE post = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $post = $query->fetchAll(PDO::FETCH_ASSOC);
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());    
        }
    }
    public function listeCommentaire()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCommentaire($id)
    {
        $sql = "DELETE FROM commentaire WHERE comment_id = :comment_id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':comment_id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addCommentaire($commentaire)
{
    $sql = "INSERT INTO commentaire (comment_text, author, post, created_at)
            VALUES (:comment_text, :author, :post, :created_at)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'comment_text' => $commentaire->getCommentText(),
            'author' => $commentaire->getAuthor(),
            'post' => $commentaire->getPost(),
            'created_at' => $commentaire->getCreatedAt()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    public function showCommentaire($id)
    {
        $sql = "SELECT * FROM commentaire WHERE comment_id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecommentaire($commentaire, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                    comment_text = :comment_text, 
                    author = :author,
                    created_at = :created_at,
                    post = :post
                WHERE comment_id = :comment_id'
            );
    
            $query->execute([
                'comment_id' => $id,
                'comment_text' => $commentaire->getCommentText(),
                'author' => $commentaire->getAuthor(),
                'created_at' => $commentaire->getCreatedAt(),
                'post' => $commentaire->getPost()
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
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
                'body' => "Un nouveau commentaire a été ajoutée avec succès."
            )
        );
    }
    
    
}
