<?php

require_once '../config.php';

class CommentaireC
{
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
        $sql = "INSERT INTO commentaire VALUES (NULL, :comment_text, :author, :created_at)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'comment_text' => $commentaire->getCommentText(),
                'author' => $commentaire->getAuthor(),
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

    public function updateCommentaire($commentaire, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                   comment_text = :comment_text,
                   author = :author,
                   created_at = :created_at
                WHERE comment_id = :comment_id'
            );

            $query->execute([
                'comment_id' => $id,
                'comment_text' => $commentaire->getCommentText(),
                'author' => $commentaire->getAuthor(),
                'created_at' => $commentaire->getCreatedAt(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
