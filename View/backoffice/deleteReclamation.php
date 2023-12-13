<?php
include 'C:/xampp/htdocs/ValidationFinale/Controller/reclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->deleteReclamation($_GET["id"]);
header('Location:index.php');