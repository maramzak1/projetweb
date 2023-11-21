
<?php

include '../controller/UtilisateurC.php';
$utilisateurC = new UtilisateurC();
$listeUtilisateurs = $utilisateurC->listUtilisateurs();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
  </head>
  <body>
    <h1>Liste des Utilisateurs</h1>
    <ul>
      <?php foreach ($listeUtilisateurs as $utilisateur) : ?>
        <li><?= $utilisateur['nom'] . ' ' . $utilisateur['prenom']; ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>