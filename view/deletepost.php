<?php
include '../controller/postC.php';

// Check if post_id is set in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $postC = new postC();
    $postC->deletePost($id);
    

    echo "Deleted post with ID: " . $id; // Debugging message

    header('Location: listepost.php');
} else {
    // Handle the case when post_id is not set in the URL
    echo "Post ID not provided.";
}
?>
