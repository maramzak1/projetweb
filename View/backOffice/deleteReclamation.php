<?php
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->deleteReclamation($_GET["id"]);
header('Location:index.php');