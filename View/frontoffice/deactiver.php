<?php
include "../../Controller/UtilisateurC.php";
include "../../Model/Utilisateur.php";

$utilisateurC = new utilisateurC();

if (isset($_GET["idUtilisateur"])) {
    // Désactiver l'utilisateur
    $utilisateurC->DesactiverUtilisateur($_GET["idUtilisateur"]);

    // Rediriger vers la page appropriée (par exemple, la page de connexion)
    session_start();
    session_destroy();

    // Assurez-vous d'arrêter l'exécution du script après la redirection
    // Rediriger vers la page de connexion
    header('Location: profiluser.php');
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
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
            background-image: url('../../assets/frontoffice/img/background/login.jpg');
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
            background-color: #8B4513;
            color: #ffffff;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #542828;
        }

        p {
            color: #8B4513; /* Couleur du texte en marron */
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <p>Votre compte est deactiver :( </p>
    <p>Veuillez retourner au site. </p>
    <button onclick="window.location.href='./index.php'">Retour au accueil</button>
</body>

</html>