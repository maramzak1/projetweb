<?php
include "C:/xampp/htdocs/ProjetWeb2A/Model/reponse.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $idReponse = $_POST["idReponse"];
    $evaluation = $_POST["evaluation"];

    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=projet', 'root');

    // Mettre à jour le champ d'évaluation dans la table de réponse
    $updateQuery = $pdo->prepare('UPDATE reponse SET evaluation = :evaluation WHERE idReponse = :idReponse');
    $updateQuery->bindParam(':evaluation', $evaluation, PDO::PARAM_INT);
    $updateQuery->bindParam(':idReponse', $idReponse, PDO::PARAM_INT);

    // Exécuter la requête
    $updateQuery->execute();

    // Rediriger l'utilisateur vers la même page
    header("Location: listReponse.php");
    exit;
}
?>
