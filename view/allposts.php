<?php
include_once "../controller/postC.php";

// Créez une instance de la classe postC
$postC = new postC();

// Vérifiez s'il y a un terme de recherche dans l'URL
if (isset($_GET['search'])) {
    // Utilisez la fonction recherchePostParTitre pour obtenir les résultats de la recherche
    $searchTerm = $_GET['search'];
    $posts = $postC->recherchePostParTitre($searchTerm);
} else {
    // Si aucun terme de recherche n'est spécifié, obtenez tous les posts
    $posts = $postC->getAllPosts();
}

// Obtenez tous les posts
$totalPosts = $postC->getTotalPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <!-- Ajoutez tout balisage méta et les feuilles de style nécessaires -->
</head>

<body>
    <div class="container">
        <h2>All Posts</h2>

        <!-- Ajoutez un formulaire de recherche -->
        <form action="allposts.php" method="GET">
            <input type="text" name="search" placeholder="Search by Title">
            <button type="submit">Search</button>
        </form>

        <!-- Affichez le nombre total de posts -->
        <div class="total-posts">Total Posts: <?= $totalPosts; ?></div>

        <!-- Affichez la liste des posts -->
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <h3><?= $post['title']; ?></h3>
                <p><?= $post['content']; ?></p>
                <img src="<?= $post['image']; ?>" alt="Post Image" width="300">
                <p>Posted on <?= $post['date']; ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</body>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #ff6666, #e8491d);
            color: #333;
            margin: 0;
            padding: 0;
            opacity: 0;
            animation: fadeIn ease-in 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            animation: fadeIn ease-in 1s forwards;
        }

        h2 {
            color: #e8491d;
        }

        .post {
            width: 100%;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .post:hover {
            background-color: #f9f9f9;
        }

        h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 15px 0;
        }

        .total-posts {
            background-color: #e8491d;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 18px;
        }
    </style>
</html>
