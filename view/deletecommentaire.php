<?php
include '../controller/commentaireC.php';

// Check if comment_id is set in the URL
if (isset($_GET["comment_id"])) {
    $comment_id = $_GET["comment_id"];

    $commentaireC = new commentaireC();
    $commentaireC->deletecommentaire($comment_id);

    echo "Deleted comment with ID: " . $comment_id; // Message de débogage

    header('Location: listecommentaire.php');
    exit();
} else {
    // Handle the case when comment_id is not set in the URL
    echo "Comment ID not provided. Check the URL parameters.";
}
?>
