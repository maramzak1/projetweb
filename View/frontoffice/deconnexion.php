<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Déconnexion</title>
    <meta charset="utf-8">
    <title>Melodi</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> <!-- Assurez-vous que le lien vers votre fichier CSS est correct -->
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
            color: #ffffff; /* Couleur du texte */
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
        height: 100px; /* Maintenir les proportions de l'image */
    }

        p {
            color: #8B4513; /* Couleur du texte en marron */
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body style="color: white; font-size: 18px;">
    <div class="logo-container" style="margin-left: auto; margin-top: -300px; margin-right: 10px;">
        <a href="Region.php">
            <img src="../../Assets/frontoffice/img/logo/ok.png" alt="Logo" class="app-brand-logo demo">
        </a>
    </div>
    <p style="color: white; font-size: 18px;">Vous êtes déconnecté:( </p>
    <button onclick="window.location.href='./auth-login-basic.php'">Se connecter</button>
    <p style="color: white; font-size: 18px;">Retourner au site :) </p>
    <button onclick="window.location.href='./Region.php'">Retour au accueil</button>
</body>

