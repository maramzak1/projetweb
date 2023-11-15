<?php 
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/réclamationC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/réclamation.php';

$error = "";
// créer une réclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réclamation </title>
</head>
<body>
  

  <form action="addReclamation.php" method="post">
    <input type="text" name="titre" placeholder="Title">
    <input type="text" name="description" placeholder="Description">
    <input type="submit" value="Add">
  </form>

  <?php


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    
    $reclamationC->addReclamation($titre, $description,"en attente");
    //header("Location:listRéclamations.php");

}
  ?>
</body>
</html>