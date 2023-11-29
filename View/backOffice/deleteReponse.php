<?php
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["id"]);
header('Location:solve.php');