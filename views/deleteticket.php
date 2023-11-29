<?php
include '../controller/ticketC.php';
$clientC = new ticketC();
$clientC->deleteticket($_GET["id"]);
header('Location:afficheticket.php');
?>
