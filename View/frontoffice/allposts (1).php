<?php
include_once "../../Controller/postC.php";
include_once "../../controller/commentaireC.php";

$postC = new postC();
$commentaireC = new commentaireC();

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $posts = $postC->recherchePostParTitre($searchTerm);
} else {
    $posts = $postC->getAllPosts();
}

$totalPosts = $postC->getTotalPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 180px 0 0 0; /* Ajouter une marge en haut de 20px */
        padding: 0;
        color: #fff;
        background-color: transparent;
    }

    .container {
        max-width: 100%;
        margin: 0 auto; /* Centrer le contenu horizontalement */
        overflow: hidden;
        text-align: center;
        padding-bottom: 20px; /* Ajouter un padding en bas de 20px */
    }

    form {
        margin-bottom: 20px;
        display: inline-block;
    }

    input[type="text"] {
        padding: 8px;
        font-size: 16px;
    }

    button {
        padding: 8px 16px;
        font-size: 16px;
        cursor: pointer;
        background-color: #d2b48c;
        color: #fff;
        border: none;
        border-radius: 4px;
    }

    button:hover {
        background-color:  #e74c3c;
    }

    .post {
        float: left;
        width: calc(50% - 20px);
        margin: 0 40px 40px 10px;
        padding: 15px;
        background-color: transparent;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .post:hover {
        transform: scale(1.05);
    }

    h3 {
        color: white;
    }

    p {
        margin-bottom: 10px;
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-top: 10px;
    }

    .comments-container {
        display: none;
        margin-top: 10px;
        padding: 10px;
        border-top: 1px solid #ddd;
        clear: both;
    }

    .comment {
        margin: 10px 0;
        padding: 8px;
        border-radius: 4px;
    }

    .total-posts {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: bold;
    }

    @media (min-width: 750px) {
        .post {
            width: calc(20% - 10px);
        }
    }
</style>



     
</head>

<body style="background-image: url('../assets/frontoffice/HTML/img/logo/post2.jpg'); background-size: cover; background-position: center;">
<div class="container">
     
        <!-- Search form -->
        <form action="allposts.php" method="GET">
            <input type="text" name="search" placeholder="Search by Title">
            <button type="submit">Search</button>
        </form>

        <!-- Total posts count -->
        <div class="total-posts">Total Posts: <?= $totalPosts; ?></div>

        <?php foreach ($posts as $post) : ?>
    <div class="post <?= isset($_GET['search']) ? 'search-result' : ''; ?>" onclick="toggleComments(this)">
        <h3><?= $post['title']; ?></h3>
        <p><?= $post['content']; ?></p>
        <img src="<?= $post['image']; ?>" alt="Post Image" class="<?= isset($_GET['search']) ? 'search-image' : ''; ?>" width="300">


        <p>Posted on <?= $post['date']; ?></p>
                <!-- Comment button -->
                <button type="button" onclick="redirectToCommentPage(<?= $post['id']; ?>, '<?= $post['title']; ?>')">Comment</button>
                
                <!-- Comments container -->
                <div class="comments-container" id="comments_<?= $post['id']; ?>">
                    <?php
                    $comments = $commentaireC->getcommentaireBypost($post['id']);
                    if (!empty($comments)) {
                        echo '<div class="comments-section">';
                        foreach ($comments as $comment) :
                    ?>
                            <div class="comment">
                                <p><?= $comment['comment_text']; ?></p>
                                <p>Commented by <?= $comment['author']; ?> on <?= $comment['created_at']; ?></p>
                            </div>
                    <?php
                        endforeach;
                        echo '</div>';
                    } else {
                        echo '<p>No comments yet.</p>';
                    }
                    ?>
                </div>
                
                <script>
                    function redirectToCommentPage(id, title) {
                        var url = "addcommentaire.php?id=" + id + "&title=" + encodeURIComponent(title);
                        <?php if (isset($_GET['comment_added'])) echo 'url += "&comment_added=1";'; ?>
                        window.location.href = url;
                    }
                </script>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function toggleComments(postElement) {
            var commentsContainer = postElement.querySelector('.comments-container');
            commentsContainer.style.display = (commentsContainer.style.display === 'none' || commentsContainer.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>


</html>
 

</html>
