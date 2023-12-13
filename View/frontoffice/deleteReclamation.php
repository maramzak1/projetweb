<?php
include '../../Controller/reclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->deleteReclamation($_GET["id"]);
header('Location:listReclamations.php');