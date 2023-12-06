<?php
// Assurez-vous d'inclure les fichiers nécessaires et d'initialiser votre classe postC

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez l'ID du post depuis la requête POST
    $postId = $_POST['id'];

    // Traitez la logique de like ici (par exemple, en utilisant la classe postC)
    include_once '../controller/postC.php';
    $postC = new postC();
    $postC->likePost($postId);

    // Réponse (vous pouvez renvoyer n'importe quelle réponse ici)
    echo "Like traité avec succès pour le post $postId";
}
?>
