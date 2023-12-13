<?php
session_start();
include "../../Controller/UtilisateurC.php";
include "../../Model/Utilisateur.php";

// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location:Region.php');
}
$utilisateur = null;
$utilisateurC = new UtilisateurC();

// Obtenez la configuration de l'utilisateur
$configUtilisateur = $utilisateurC->getConfigurationUtilisateur($_SESSION['e']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Utilisateur</title>
    <meta charset="utf-8">
    <title>Melodi</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('../../Assets/frontoffice/img/media/arabic (1).jpg');
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .text {
            font-size: 20px;
            font-weight: bold;
            color: #404040;
            margin-bottom: 20px;
        }

        button {
            background-color: #800000;
    color: #ffffff;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #660000;
        }

        a {
            text-decoration: none;
            color: #ffffff;
        }

        .logo-container {
        margin-left: auto;
        margin-right: 0px;
        text-align: right; /* Aligner le texte à droite */
    }

    .app-brand-logo {
        max-width: 100px; /* Réduire la taille maximale du logo à 100 pixels */
        height: auto; /* Maintenir les proportions de l'image */
    }
    </style>
</head>

      <div class="logo-container" style="margin-left: auto; margin-top:-200px; margin-right:0px;">
        <a href="Region.php">
            <img src="../../Assets/frontoffice/img/logo/ok.png" alt="Logo" class="app-brand-logo demo">
        </a>
    </div>

<body style="text-align: right;margin-left: 60%;">
<div class="text" style="color: white;">Vous revoilà <?php echo $_SESSION['e']; ?>  !</div>

    <button><a href="Region.php">Retour au acceuil</a></button>
    <button><a href="deconnexion.php">Déconnexion</a></button>
    <button><a href="updateUtilisateur2.php">Modifier les données du compte</a></button>
    <button><a href="deactiver.php">Désactiver compte</a></button>
    <button><a href="listReclamations.php">Historique Des Reclamations</a></button>
    <button><a href="listReponse.php">Reclamations Traitées</a></button>

    <hr>
</body>


</html>
