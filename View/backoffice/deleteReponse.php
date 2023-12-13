<?php
include 'C:/xampp/htdocs/ValidationFinale/Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["id"]);
header('Location:solve.php');