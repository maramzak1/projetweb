<?php
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/réclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->deleteReclamation($_GET["idReclamation"]);
header('Location:listRéclamations.php');