<?php
// artist.php

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$image = $_POST['image'];

// Générer le contenu souhaité
echo '<div class="featured-element">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <!-- featured item -->
                <div class="featured-item ">
                    <!-- image container -->
                    <div class="figure">
                        <!-- image -->
                        <img class="img-responsive" src="' . $image . '" alt="" />
                        <!-- paragraph -->
                        <p>' . $description . '</p>
                    </div>
                    <!-- featured information -->
                    <div class="featured-item-info">
                        <!-- featured title -->
                        <h4>Album </h4>
                        <!-- some response from social media or web likes -->
                        <a href="ecouterchonson.php" class="btn btn-primary">Ecouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
?>
